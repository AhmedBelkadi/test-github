<?php

namespace App\Exports;

use App\Http\Resources\AbsenceResource;
use App\Http\Resources\AbsenceResourceExportAdmin;
use App\Http\Resources\AbsenceResourceExportProfesseur;
use App\Http\Resources\EtudiantResource2;
use App\Models\Absence;
use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsenceExportProfesseur implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AbsenceResourceExportProfesseur::collection(Absence::all());
    }


    public function headings(): array
    {
        return [
            'cne',
            'etudiant',
            'element',
            'date',
            'periode',
            'seance_type',
            'etat',
        ];
    }
}
