<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Cache;
use DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToCollection
//class ExcelImport implements ToModel
{

    public function collection(Collection $collection)
    {
        //dd();
        $tableName = Cache::get('tableName');
        $colum = Cache::get('data');
        //dd(count($colum));
        //dd($tableName);
        $count = 'morshed';
        $data = array();
        //$test = [];
        foreach ($collection as $value => $key) {
            //dd($value[1]);
            if ($value > 0) {
                // array_chunk()
                $rowArray = [];
                // $valid = [];
                for ($i = 0; $i < count($colum); $i++) {

                    $rowArray[$colum[$i]] = $key[$i];
                    // $valid[$colum[$i]] = 'required';
                    // $err = Validator::make($key->toArray(), [
                    //     $valid
                    // ])->validate();
                }
                //dd($collection);

                DB::table($tableName)->insert($rowArray);
                unset($rowArray);
                // unset($valid);
            }
        }

        //dd($colum);
    }
}
