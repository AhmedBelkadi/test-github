<?php

namespace App\Exports;

use App\Http\Resources\ProfesseurResource;
use App\Models\Professeur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfesseurExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProfesseurResource::collection(Professeur::all());
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
            'cin'
        ];
    }
}
