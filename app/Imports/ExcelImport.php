<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ExcelImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //dd($collection);
        foreach ($collection as $value => $key) {
            if ($value > 0) {
                DB::table('employees')->insert(['name' => $key[0], 'email' => $key[1], 'mobile_number' => $key[2]]);
            }
        }
    }
}
