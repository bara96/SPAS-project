<?php

namespace App\Imports;

use App\Models\Flight;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class FlightsImport implements ToModel, WithProgressBar, WithBatchInserts, WithChunkReading
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Flight([
            Flight::YEAR => $row[0],
            Flight::DAY_OF_WEEK => $row[1],
            Flight::FLIGHT_DATE => $row[2],
            Flight::OP_CARRIER_FL_NUM => $row[3],
            Flight::OP_CARRIER_AIRLINE_ID => $row[4],
            Flight::ORIGIN_AIRPORT_ID => $row[5],
            Flight::ORIGIN => $row[6],
            Flight::ORIGIN_CITY_NAME => $row[7],
            Flight::ORIGIN_STATE_NM => $row[8],
            Flight::DEST_AIRPORT_ID => $row[9],
            Flight::DEST => $row[10],
            Flight::DEST_CITY_NAME => $row[11],
            Flight::DEST_STATE_NM => $row[12],
            Flight::DEP_TIME => $row[13],
            Flight::DEP_DELAY => $row[14],
            Flight::ARR_TIME => $row[15],
            Flight::ARR_DELAY => $row[16],
            Flight::CANCELLED => $row[17],
            Flight::AIR_TIME => $row[18],
        ]);
    }

    public function batchSize(): int
    {
        return 2000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }
}
