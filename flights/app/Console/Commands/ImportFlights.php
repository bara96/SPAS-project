<?php

namespace App\Console\Commands;

use App\Imports\FlightsImport;
use App\Models\Flight;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class ImportFlights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:flights {file : the id of the file to import} {--reset : reset db before import}';

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
        if(!empty($this->option('reset')))
            Flight::truncate();

        //import a single file
        $file = $this->argument('file');
        if(!empty($file)) {
            if( $file < 1 || $file > 5) {
                $this->output->error("Invalid parameter");
                return 0;
            }
            try {
                $user = DB::table(Flight::TABLE)->orderBy(Flight::ID, 'desc')->first();
                $this->output->title("Starting import of file flights_$file.csv");
                (new FlightsImport)->withOutput($this->output)->import("csv/flights_$file.csv", 'public', Excel::CSV);
                $this->output->success("Import successful");
                return 1;
            }
            catch (\Exception $exception) {
                if(!empty($user->transaction_id))
                    DB::table(Flight::TABLE)->where(Flight::ID, '>', $user->transaction_id)->delete();
                $this->output->error("Import failed");
                $this->output->error($exception->getMessage());
                return 0;
            }
        }
        else {
            $this->output->error("Invalid parameter");
            return 0;
        }

        /*import all files
        try{
            $this->output->title('Starting import');
            for($i=1; $i<=5; $i++) {
                $user = DB::table(Flight::TABLE)->orderBy(Flight::ID, 'desc')->first();
                $this->output->info("Import phase $i/5");
                (new FlightsImport)->withOutput($this->output)->import("csv/flights_$i.csv", 'public', Excel::CSV);
                $this->output->success("Import phase $i/5");
            }
            $this->output->success("Import successful");
            return 1;
        }
        catch (\Exception $exception) {
            if(!empty($user->transaction_id))
                DB::table(Flight::TABLE)->where(Flight::ID, '>', $user->transaction_id)->delete();
            $this->output->error("Import failed");
            $this->output->error($exception->getMessage());
            return 0;
        }
        */
    }
}
