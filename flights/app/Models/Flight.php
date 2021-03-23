<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    const TABLE = 'flights';

    const ID = "transaction_id";
    const YEAR = "year";
    const DAY_OF_WEEK = "day_of_week";
    const FLIGHT_DATE = "flight_date";
    const OP_CARRIER_FL_NUM = "op_carrier_fl_num";
    const OP_CARRIER_AIRLINE_ID = "op_carrier_airline_id";
    const ORIGIN_AIRPORT_ID = "origin_airport_id";
    const ORIGIN = "origin";
    const ORIGIN_CITY_NAME = "origin_city_name";
    const ORIGIN_STATE_NM = "origin_state_nm";
    const DEST_AIRPORT_ID = "dest_airport_id";
    const DEST = "dest";
    const DEST_CITY_NAME = "dest_city_name";
    const DEST_STATE_NM = "dest_state_nm";
    const DEP_TIME = "dep_time";
    const DEP_DELAY = "dep_delay";
    const ARR_TIME = "arr_time";
    const ARR_DELAY = "arr_delay";
    const CANCELLED = "cancelled";
    const AIR_TIME = "air_time";

    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::YEAR,
        self::DAY_OF_WEEK,
        self::FLIGHT_DATE,
        self::OP_CARRIER_FL_NUM,
        self::OP_CARRIER_AIRLINE_ID,
        self::ORIGIN_AIRPORT_ID,
        self::ORIGIN,
        self::ORIGIN_CITY_NAME,
        self::ORIGIN_STATE_NM,
        self::DEST_AIRPORT_ID,
        self::DEST,
        self::DEST_CITY_NAME,
        self::DEST_STATE_NM,
        self::DEP_TIME,
        self::DEP_DELAY,
        self::ARR_TIME,
        self::ARR_DELAY,
        self::CANCELLED,
        self::AIR_TIME,
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
