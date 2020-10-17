<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExcelSheetsImportConditional implements WithMultipleSheets
{
    use WithConditionalSheets;
    /**
     * @param Collection $collection
     */
    public function conditionalSheets(): array
    {
        return [
            0 => new ExcelImport(),
            1 => new ExcelImport(),
        ];
    }
}
