<?php

namespace App\Imports;

use App\Models\Shift;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ShiftsImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Shift([
            'date' => $row['date'],
            'worker' => $row['worker'],
            'company' => $row['company'],
            'hours' => $row['hours'],
            'rate_per_hour' => (double) str_replace('£', '', $row['rate_per_hour']),
            'taxable' => $row['taxable']=='Yes'?1:0,
            'status' => $row['status'],
            'shift_type' => $row['shift_type'],
            'paid_at' => $row['paid_at'],
        ]);

    }
}
