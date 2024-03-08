<?php

namespace App\Exports;

use App\Http\Resources\EtudiantResource2;
use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EtudiantExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EtudiantResource2::collection(Etudiant::all());
    }


    public function headings(): array
    {
        return [
            'id',
            'name',
            'gender',
            'image',
            'email',
            'numTele',
            'cin',
            'cne',
            'apogee',
            'filiere',
        ];
    }
}
