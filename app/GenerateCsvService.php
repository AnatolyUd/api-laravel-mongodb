<?php
/**
 * Generate csv file.
 */

namespace App;

use App\Models\Person;
use League\Csv\Writer;

class GenerateCsvService
{

    /**
     * Generate csv file
     *
     * @return int
     */
    public function generateCsv()
    {
        $lines = config('services.csv.lines');
        $fileName = config('services.csv.file_name');

        $writer = Writer::createFromPath(storage_path() . DIRECTORY_SEPARATOR . $fileName, 'w+');
        $writer->setDelimiter(';');

        $personFactory = Person::factory();

        // insert header line to csv file
        $writer->insertOne(Person::PROPERTY_NAMES);

        for ($line = 1; $line <= $lines; $line++) {
            $values = array_values($personFactory->properties());
            $writer->insertOne($values);
        }

        return $lines;
    }
}