<?php

namespace App\Imports;

use App\Models\File;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class FileImport implements ToModel, WithChunkReading, ShouldQueue,WithStartRow
{
   
    public function model(array $row)
    {
        return new File([
            'city'     => $row[0],
            'city_ascii'   => $row[1],
            'state_id'     => $row[2],
            'state_name'   => $row[3],
            'county_fips'  => $row[4],
            'county_name'  => $row[5],
            'lat'          => $row[6],
            'lng'          => $row[7],
            'population'   => $row[8],
            'density'      => $row[9],
            'source'       => $row[10],
            'military'     => $row[11],
            'incorporated' => $row[12],
            'timezone'     => $row[13],
            'ranking'      => $row[14],
            'zips'         => $row[15],
            'idd'         => $row[16],


        ]);
    }
      public function startRow(): int 
    {
         return 1;
    }
    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
