<?php

namespace App\Imports;

use App\Employee;
use App\Models\Employee as ModelsEmployee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ModelsEmployee([
            'name' => $row[0],
            'email' => $row[1],
            'mobile_number' => $row[2]
        ]);
    }
}
