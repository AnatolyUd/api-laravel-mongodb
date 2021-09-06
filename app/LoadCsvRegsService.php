<?php
/**
 * Load csv file to database.
 */

namespace App;

use App\Models\Reg;
use League\Csv\Reader;

class LoadCsvRegsService
{

    /**
     * Load csv file
     *
     * @return int
     */
    public function loadCsv()
    {
        $fileName = config('services.csv.file_name_regs');

        $reader = Reader::createFromPath(storage_path() . DIRECTORY_SEPARATOR . $fileName, 'r');
        $reader->setDelimiter(',');
        $reader->setHeaderOffset(0);

        $count = 0;
        foreach ($reader as $record) {
            Reg::create($record);

            $count++;
        }

        return $count;
    }
}
