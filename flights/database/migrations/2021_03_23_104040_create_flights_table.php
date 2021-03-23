<?php

use App\Models\Flight;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Flight::TABLE, function (Blueprint $table) {
            $table->increments(Flight::ID);
            $table->string(Flight::YEAR);
            $table->string(Flight::DAY_OF_WEEK);
            $table->string(Flight::FLIGHT_DATE);
            $table->string(Flight::OP_CARRIER_FL_NUM);
            $table->string(Flight::OP_CARRIER_AIRLINE_ID);
            $table->string(Flight::ORIGIN_AIRPORT_ID);
            $table->string(Flight::ORIGIN);
            $table->string(Flight::ORIGIN_CITY_NAME);
            $table->string(Flight::ORIGIN_STATE_NM);
            $table->string(Flight::DEST_AIRPORT_ID);
            $table->string(Flight::DEST);
            $table->string(Flight::DEST_CITY_NAME);
            $table->string(Flight::DEST_STATE_NM);
            $table->string(Flight::DEP_TIME);
            $table->string(Flight::DEP_DELAY);
            $table->string(Flight::ARR_TIME);
            $table->string(Flight::ARR_DELAY);
            $table->string(Flight::CANCELLED);
            $table->string(Flight::AIR_TIME);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Flight::TABLE);
    }
}
