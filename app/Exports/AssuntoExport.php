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
<<<<<<< HEAD

    public function headings(): array
    {
        // Definir os cabeçalhos do Excel aqui
        return [
            'ID',
            'Assunto/Gênero'
        ];
    }
=======
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
}
