<?php
/**
 * Read/write csv file.
 */

namespace App;

use App\Models\Person;
use League\Csv\Writer;

class CsvService
{

    /**
     * Generate csv file.
     *
     * @return int
     */
    public function generateCsv()
    {
        $lines = config('services.csv.lines');
        $fileName = config('services.csv.file_name');

        $writer = Writer::createFromPath(storage_path().DIRECTORY_SEPARATOR.$fileName, 'w+');
        $writer->setDelimiter(';');

        $personFactory = Person::factory();

        for ($line = 1; $line <= $lines; $line++) {
            $row = array_values($personFactory->definition());
            $writer->insertOne($row);
        }

        return $lines;
    }

}