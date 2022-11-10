<?php

namespace App\Imports;

use App\Models\Flight;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Str;

class ExcelImport implements ToModel,WithHeadingRow,WithUpserts,WithBatchInserts,WithUpsertColumns
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Flight([
           'id'             => Str::uuid(),
           'package_id'     => $row['bag_tag_id'],
           'org'            => $row['origin'], 
           'dst'            => $row['destination'], 
           'trip'           => $row['trip'],  
           'weight'         => $row['gross_wt'],  
           'owner'          => $row['owner'],  
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'package_id';
    }

    public function upsertColumns()
    {
        return ['package_id'];
    }
}
