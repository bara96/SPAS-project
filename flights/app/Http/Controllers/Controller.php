<?php

namespace App\Http\Controllers;

use App\Imports\FlightsImport;
use App\Models\Flight;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $flights = Flight::paginate(20);

        return view('index', ['flights' => $flights]);
    }

    public function import()
    {
        try {
            Excel::import(new FlightsImport(), "flights.csv", 'public', \Maatwebsite\Excel\Excel::CSV);
            return redirect()->route('index', ['success' => 1]);
        }
        catch (\Exception $exception) {
            return redirect()->route('index', ['error' => 1]);
        }
    }
}
