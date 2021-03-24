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
            $table->string(Flight::YEAR)->nullable();
            $table->string(Flight::DAY_OF_WEEK)->nullable();
            $table->string(Flight::FLIGHT_DATE)->nullable();
            $table->string(Flight::OP_CARRIER_FL_NUM)->nullable();
            $table->string(Flight::OP_CARRIER_AIRLINE_ID)->nullable();
            $table->string(Flight::ORIGIN_AIRPORT_ID)->nullable();
            $table->string(Flight::ORIGIN)->nullable();
            $table->string(Flight::ORIGIN_CITY_NAME)->nullable();
            $table->string(Flight::ORIGIN_STATE_NM)->nullable();
            $table->string(Flight::DEST_AIRPORT_ID)->nullable();
            $table->string(Flight::DEST)->nullable();
            $table->string(Flight::DEST_CITY_NAME)->nullable();
            $table->string(Flight::DEST_STATE_NM)->nullable();
            $table->string(Flight::DEP_TIME)->nullable();
            $table->integer(Flight::DEP_DELAY)->nullable();
            $table->string(Flight::ARR_TIME)->nullable();
            $table->integer(Flight::ARR_DELAY)->nullable();
            $table->string(Flight::CANCELLED)->nullable();
            $table->string(Flight::AIR_TIME)->nullable();
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
