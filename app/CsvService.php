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
     * Generate csv file.getProperties
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

        for ($line = 1; $line <= $lines; $line++) {
            $values = $this->getValues($personFactory->definition());
            $writer->insertOne($values);
        }

        return $lines;
    }

    /**
     * Get values from $definition
     *
     * @param $definition array
     *
     * @return array
     */
    private function getValues(array $definition)
    {
        $values = [];

        foreach ($definition['properties'] as $key => $value) {
            $pair = array_values($value);
            $values[] = $pair[0];
        }

        return $values;
    }
}