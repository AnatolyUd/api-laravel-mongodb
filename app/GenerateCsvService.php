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

        $header = $this->getHeader($personFactory->definition());
        $writer->insertOne($header);

        for ($line = 1; $line <= $lines; $line++) {
            $values = $this->getValues($personFactory->definition());
            $writer->insertOne($values);
        }

        return $lines;
    }

    /**
     * Get header from $definition
     *
     * @param $definition array
     *
     * @return array
     */
    private function getHeader(array $definition)
    {
        $values = [];

        foreach ($definition['properties'] as $key => $value) {
            $pair = array_keys($value);
            $values[] = $pair[0];
        }

        return $values;
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