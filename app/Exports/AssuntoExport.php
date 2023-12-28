<?php

namespace App\Exports;

use App\Models\Assunto;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssuntoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Assunto::all();
    }
}
