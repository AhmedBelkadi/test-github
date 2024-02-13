<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public function seance()
    {
        return $this->belongsTo(Seance::class , "id_seance");
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class , "id_etudiant" );
    }
    public function justifications()
    {
        return $this->belongsToMany(Justification::class , "absence_justification" ,  'id_absence', 'id_justification' );
    }



}
