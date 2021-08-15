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
Response status code: 201

number - число загруженных документов
