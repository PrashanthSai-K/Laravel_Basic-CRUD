<?php

namespace App\Exports;

use App\Models\Cloud;
use Maatwebsite\Excel\Concerns\FromCollection;

class CloudExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cloud::all();
    }
}
