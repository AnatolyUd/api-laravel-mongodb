<?php

namespace App\Console\Commands;

use App\CsvService;
use Illuminate\Console\Command;

class GenerateCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate_csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate csv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CsvService $service)
    {
        return $service->generateCsv();
    }
}
