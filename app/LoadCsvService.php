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
            Person::create($record);

            $count++;
        }

        return $count;
    }
}