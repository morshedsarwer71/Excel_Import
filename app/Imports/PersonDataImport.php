<?php

namespace App\Imports;

use DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PersonDataImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $value => $key) {
            if ($value > 0) {
                DB::table('people')->insert(['name' => $key[0], 'address' => $key[1]]);
            }
        }
    }
}
