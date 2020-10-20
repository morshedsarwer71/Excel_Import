<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelHeadRowCount implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // $count = 0;
        $dataArray = array();
        $dataHeadRowArray = array();
        $dataTypeArray = array();
        foreach ($collection as $val => $key) {
            if ($val == 0) {
                $dataHeadRowArray = $key;
            } else if ($val == 1) {
                $dataTypeArray = $key;
            }
            //dd($dataArray);
        }
        $dataArray['type'] = $dataTypeArray;
        $dataArray['data'] = $dataHeadRowArray;
        Cache::put('row', $dataArray);
        //dd($dataArray);
        //return $dataArray;
    }
}
