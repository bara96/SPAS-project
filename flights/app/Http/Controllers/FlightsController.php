<?php

namespace App\Http\Controllers;

use App\Imports\FlightsImport;
use App\Models\Flight;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class FlightsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getFlights()
    {
        $flights = Flight::all([Flight::TRANSACTION_ID, Flight::FLIGHT_DATE, Flight::ORIGIN, Flight::DEST, Flight::CANCELLED])->limit(100);

        return response()->json($flights, 200);
    }
}
