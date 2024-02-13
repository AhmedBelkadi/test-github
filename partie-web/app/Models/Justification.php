<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    use HasFactory;

    public function absences()
    {
        return $this->hasMany(Absence::class , "id_justification" );
    }
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class , "id_etudiant" );
    }

}
