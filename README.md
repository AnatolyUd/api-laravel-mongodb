## Тестовое задание

Сгенерировать csv файл на 1 миллион записей со столбцами first_name, last_name, age, gender, mobile number, email, city, login, car model, salary. При генерации файла можно использовать случайные числа.
Написать API (PHP, Laravel) с двумя роутами: по первому загрузить в приложение сгенерированный файл и сохранить данные в MongoDB, по второму отвечать на запросы по полученным данным.
Запросы на второй роут должны включать возможность фильтров по всем полям (name, surname, age, sex, mobile number, email, city, login, password), сортировок по всем полям, пагинации по результатам запроса (limit, offset).
Включить csv файл и код его генерации в тестовое задание.

---
## API

### Загрузить данные из csv файла в коллекцию persons

#### Request:
POST /api/v1/persons

#### Response:
```javascript
{
  'count': number
}
```
Response status code: 200

number - число загруженных документов

### Фильтрация, сортировка, пагинация

GET /api/v1/persons[?query_string]

Response status code: 200

##### Имена полей для фильтрации и сортировки (field_name)

login, email, first_name, last_name, age, gender, mobile_number, city, car_model, salary

##### Сортировка

sort_by=field_name
sort_order=['asc' | 'desc']


##### Пагинация

offset=number

limit=number

##### Пример

http://api.local/api/v1/persons?age=1998&sort_by=salary&sort_order=asc&limit=1&offset=1

```javascript
[{"_id":"6119ab5951b69208d47e3f96","properties":[{"login":"Junius_Barrows"},{"email":"kprosacco@herzog.biz"},{"first_name":"Junius"},{"last_name":"Barrows"},{"age":"1998"},{"gender":"male"},{"mobile_number":"+1-458-320-3129"},{"city":"Ettieshire"},{"car_model":"Vesta Ratke IV"},{"salary":"5307"}]}]
```

