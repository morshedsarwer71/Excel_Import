<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Imports\ExcelHeadRowCount;
use App\Imports\ExcelImport;
use App\Imports\ExcelSheetsImport;
use App\Imports\ExcelSheetsImportConditional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{

    public function import()
    {
        // inser all sheets
        // $path = 'triple.xlsx';

        // Excel::import(new ExcelImport(), $path);


        // Excel::import(new ExcelSheetsImport, $path);


        /// for import specific s'eets and insert data to multiple schema
        //$import = new ExcelSheetsImportConditional();
        //$import->onlySheets(0, 1, 2);
        //Excel::import($import, $path);


        ///multiple schema data import from workbook
        // Excel::import(new ExcelSheetsImport, $path);

        // dd('successfully imported on multiple table');
        return view('employee.emp');
    }

    public function Excel(Request $request)
    {
        $ex = $request->file('excel_file')->getClientOriginalName();
        Cache::forget('row');
        Cache::forget('data');
        Cache::forget('tableName');
        $path = $ex;
        //dd($path);
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $paths = basename($path, '.' . $ext);
        // dd($paths);
        //got table name
        //$fileName = basename($path, $ext);
        Excel::import(new ExcelHeadRowCount, $path);

        Schema::create($paths, function (Blueprint $table) {

            $data = Cache::get('row');
            $table->id();

            $type = $data['type'];
            $rowHeading = $data['data'];
            $count = 0;
            foreach ($rowHeading as $r) {
                $dataType = gettype($type[$count]);
                $table->$dataType($r)->nullable();
                $count++;
            }
        });

        // dd(gettype($paths));
        //$cacheValue = Cache::get('row');
        $data = Cache::get('row');
        $rowHeading = $data['data'];
        Cache::put('tableName', $paths);
        Cache::put('data', $rowHeading);
        Excel::import(new ExcelImport(), $path);
        // Cache::forget('row');
        // Cache::forget('data');
        // Cache::forget('tableName');
        $importedData = DB::table($paths)->get();
        return $importedData;
    }
}
