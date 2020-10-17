<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImportHeadingRow implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Employee([
            'name'  => $row['name'],
            'email' => $row['email'],
            'mobile_number'    => $row['phone'],
        ]);
    }
}
