<?php

namespace App\Console\Commands;

use App\Imports\FlightsImport;
use App\Models\Flight;
use Illuminate\Console\Command;

class ImportFlights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:flights';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CSV Flights importer';

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
    public function handle()
    {
        try{
            Flight::truncate(); //reset table
            $this->output->title('Starting import');
            (new FlightsImport)->withOutput($this->output)->import('flights.csv', 'public', \Maatwebsite\Excel\Excel::CSV);
            $this->output->success('Import successful');
            return 1;
        }
        catch (\Exception $exception) {
            $this->output->error('Import failed');
            $this->output->error($exception->getMessage());
            return 0;
        }
    }
}
