<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Imports\ExcelImport;
use App\Imports\ExcelSheetsImport;
use App\Imports\ExcelSheetsImportConditional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;

class EmployeeController extends Controller
{

    public function import()
    {
        // inser all sheets
        $path = 'triple.xlsx';
        Excel::import(new ExcelImport, $path);


        // Excel::import(new ExcelSheetsImport, $path);


        /// for import specific sheets and insert data to multiple schema
        //$import = new ExcelSheetsImportConditional();
        //$import->onlySheets(0, 1, 2);
        //Excel::import($import, $path);


        ///multiple schema data import from workbook
        // Excel::import(new ExcelSheetsImport, $path);

        dd('successfully imported on multiple table');
    }
}
