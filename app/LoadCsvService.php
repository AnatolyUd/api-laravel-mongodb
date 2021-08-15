<?php
/**
 * Load csv file to database.
 */

namespace App;

use App\Models\Person;
use League\Csv\Reader;

class LoadCsvService
{

    /**
     * Load csv file
     *
     * @return int
     */
    public function loadCsv()
    {
        $fileName = config('services.csv.file_name');

        $reader = Reader::createFromPath(storage_path() . DIRECTORY_SEPARATOR . $fileName, 'r');
        $reader->setDelimiter(';');
        $reader->setHeaderOffset(0);

        $count = 0;
        foreach ($reader as $record) {
            $person = new Person;
            $person->properties = $this->prepareValues($record);
            $person->save();
            $count++;
        }

        return $count;
    }

    /**
     * Prepare values for model
     *
     * @param $values array
     *
     * @return array
     */
    private function prepareValues(array $values)
    {
        $prepared = [];

        foreach ($values as $key => $value) {
            $prepared[] = [$key => $value];
        }

        return $prepared;
    }
}