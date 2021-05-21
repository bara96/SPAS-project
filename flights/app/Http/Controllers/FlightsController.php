<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FlightsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getFlights(Request $request)
    {
        $v = Validator::make($request->all(), [
            Flight::ID => 'exists:flights|string',
            Flight::YEAR => "string",
            Flight::DAY_OF_WEEK => "string",
            Flight::FLIGHT_DATE => "string",
            Flight::OP_CARRIER_FL_NUM => "string",
            Flight::OP_CARRIER_AIRLINE_ID => "string",
            Flight::ORIGIN_AIRPORT_ID => "string",
            Flight::ORIGIN => "string",
            Flight::ORIGIN_CITY_NAME => "string",
            Flight::ORIGIN_STATE_NM => "string",
            Flight::DEST_AIRPORT_ID => "string",
            Flight::DEST => "string",
            Flight::DEST_CITY_NAME => "string",
            Flight::DEST_STATE_NM => "string",
            Flight::DEP_TIME => "integer",
            Flight::DEP_DELAY => "integer",
            Flight::ARR_TIME => "string",
            Flight::ARR_DELAY => "string",
            Flight::CANCELLED => "string",
            Flight::AIR_TIME => "string",
            'page' => 'integer',
        ]);
        if ($v->fails()) {
            return response()->json($v->messages());
        }

        $flights = DB::table(Flight::TABLE);

        if(isset($v->validated()[Flight::ID]))
            $flights = $flights->orWhere(Flight::ID, "=", $v->validated()[Flight::ID]);

        if(isset($v->validated()[Flight::YEAR]))
            $flights = $flights->orWhere(Flight::YEAR, "=", $v->validated()[Flight::YEAR]);

        if(isset($v->validated()[Flight::DAY_OF_WEEK]))
            $flights = $flights->orWhere(Flight::DAY_OF_WEEK, "=", $v->validated()[Flight::DAY_OF_WEEK]);

        if(isset($v->validated()[Flight::FLIGHT_DATE]))
            $flights = $flights->orWhere(Flight::FLIGHT_DATE, "=", $v->validated()[Flight::FLIGHT_DATE]);

        if(isset($v->validated()[Flight::OP_CARRIER_FL_NUM]))
            $flights = $flights->orWhere(Flight::OP_CARRIER_FL_NUM, "=", $v->validated()[Flight::OP_CARRIER_FL_NUM]);

        if(isset($v->validated()[Flight::OP_CARRIER_FL_NUM]))
            $flights = $flights->orWhere(Flight::OP_CARRIER_FL_NUM, "=", $v->validated()[Flight::OP_CARRIER_FL_NUM]);

        if(isset($v->validated()[Flight::OP_CARRIER_AIRLINE_ID]))
            $flights = $flights->orWhere(Flight::OP_CARRIER_AIRLINE_ID, "=", $v->validated()[Flight::OP_CARRIER_AIRLINE_ID]);

        if(isset($v->validated()[Flight::ORIGIN_AIRPORT_ID]))
            $flights = $flights->orWhere(Flight::ORIGIN_AIRPORT_ID, "=", $v->validated()[Flight::ORIGIN_AIRPORT_ID]);

        if(isset($v->validated()[Flight::ORIGIN]))
            $flights = $flights->orWhere(Flight::ORIGIN, "=", $v->validated()[Flight::ORIGIN]);

        if(isset($v->validated()[Flight::ORIGIN_CITY_NAME]))
            $flights = $flights->orWhere(Flight::ORIGIN_CITY_NAME, "=", $v->validated()[Flight::ORIGIN_CITY_NAME]);

        if(isset($v->validated()[Flight::ORIGIN_STATE_NM]))
            $flights = $flights->orWhere(Flight::ORIGIN_STATE_NM, "=", $v->validated()[Flight::ORIGIN_STATE_NM]);

        if(isset($v->validated()[Flight::DEST_AIRPORT_ID]))
            $flights = $flights->orWhere(Flight::DEST_AIRPORT_ID, "=", $v->validated()[Flight::DEST_AIRPORT_ID]);

        if(isset($v->validated()[Flight::DEST]))
            $flights = $flights->orWhere(Flight::DEST, "=", $v->validated()[Flight::DEST]);

        if(isset($v->validated()[Flight::DEST_CITY_NAME]))
            $flights = $flights->orWhere(Flight::DEST_CITY_NAME, "=", $v->validated()[Flight::DEST_CITY_NAME]);

        if(isset($v->validated()[Flight::DEST_STATE_NM]))
            $flights = $flights->orWhere(Flight::DEST_STATE_NM, "=", $v->validated()[Flight::DEST_STATE_NM]);

        if(isset($v->validated()[Flight::DEP_TIME]))
            $flights = $flights->orWhere(Flight::DEP_TIME, "=", $v->validated()[Flight::DEP_TIME]);

        if(isset($v->validated()[Flight::DEP_DELAY]))
            $flights = $flights->orWhere(Flight::DEP_DELAY, "=", $v->validated()[Flight::DEP_DELAY]);

        if(isset($v->validated()[Flight::ARR_TIME]))
            $flights = $flights->orWhere(Flight::ARR_TIME, "=", $v->validated()[Flight::ARR_TIME]);

        if(isset($v->validated()[Flight::ARR_DELAY]))
            $flights = $flights->orWhere(Flight::ARR_DELAY, "=", $v->validated()[Flight::ARR_DELAY]);

        if(isset($v->validated()[Flight::CANCELLED]))
            $flights = $flights->orWhere(Flight::CANCELLED, "=", $v->validated()[Flight::CANCELLED]);

        if(isset($v->validated()[Flight::AIR_TIME]))
            $flights = $flights->orWhere(Flight::AIR_TIME, "=", $v->validated()[Flight::AIR_TIME]);


        return response()->json($flights->paginate(100), 200);
    }

    public function endpoint1(Request $request)
    {
        $v = Validator::make($request->all(), [
            Flight::FLIGHT_DATE => 'required|date_format:Y-m-d',
            Flight::ID => 'required|exists:flights|string',
        ]);
        if ($v->fails()) {
            return response()->json($v->messages());
        }

        $flights = DB::table(Flight::TABLE)
            ->where(Flight::ID, "=", $v->validated()[Flight::ID])
            ->where(Flight::FLIGHT_DATE, "=", $v->validated()[Flight::FLIGHT_DATE])
            ->get([Flight::ID, Flight::FLIGHT_DATE, Flight::DEP_DELAY, Flight::ARR_DELAY]);

        return response()->json($flights, 200);
    }

    public function endpoint2(Request $request)
    {
        $v = Validator::make($request->all(), [
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            'delay' => 'required|integer',
        ]);
        if ($v->fails()) {
            return response()->json($v->messages());
        }

        $ID = '"'.Flight::ID.'"';
        $FLIGHT_DATE = '"'.Flight::FLIGHT_DATE.'"';
        $ORIGIN_CITY_NAME = '"'.Flight::ORIGIN_CITY_NAME.'"';
        $DEST_CITY_NAME = '"'.Flight::DEST_CITY_NAME.'"';
        $ARR_DELAY = '"'.Flight::ARR_DELAY.'"';
        $DEP_DELAY = '"'.Flight::DEP_DELAY.'"';

        $flights = DB::table(Flight::TABLE)
            ->selectRaw("$ID,$FLIGHT_DATE,$ORIGIN_CITY_NAME,$DEST_CITY_NAME,$ARR_DELAY,$DEP_DELAY, (COALESCE($ARR_DELAY,0) + COALESCE($DEP_DELAY,0)) as tot_delay")
            ->whereBetween(Flight::FLIGHT_DATE, [ $v->validated()['start_date'], $v->validated()['end_date']])
            ->whereRaw("(COALESCE($ARR_DELAY,0) + COALESCE($DEP_DELAY,0)) >= ?", [$v->validated()['delay']])
            ->where(Flight::CANCELLED, "<>", "0")
            ->get();

        return response()->json($flights, 200);
    }

    public function endpoint3(Request $request)
    {
        $v = Validator::make($request->all(), [
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            'n' => 'required|integer|min:0',
        ]);
        if ($v->fails()) {
            return response()->json($v->messages());
        }

        $DEP_DELAY = '"'.Flight::DEP_DELAY.'"';
        $ORIGIN_AIRPORT_ID = '"'.Flight::ORIGIN_AIRPORT_ID.'"';

        $flights = DB::table(Flight::TABLE)
            ->selectRaw("$ORIGIN_AIRPORT_ID, ROUND((COUNT(case when $DEP_DELAY>0 then 1 end)::decimal / COUNT($ORIGIN_AIRPORT_ID)::decimal), 2) as percentage, count(case when $DEP_DELAY>0 then 1 end) as tot_delayed_departures, count($ORIGIN_AIRPORT_ID) as tot_departures")
            ->whereBetween(Flight::FLIGHT_DATE, [ $v->validated()['start_date'], $v->validated()['end_date']])
            ->where(Flight::CANCELLED, "<>", "0")
            ->orderBy("percentage", 'desc')
            ->groupBy([Flight::ORIGIN_AIRPORT_ID])
            ->limit($v->validated()['n'])
            ->get();

        return response()->json($flights, 200);
    }
}
