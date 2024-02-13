<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    public function semestre()
    {
        return $this->belongsTo(Semestre::class , "id_semestre" );
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class  , "id_filiere");
    }
    public function seances()
    {
        return $this->hasMany(Seance::class  , "id_emploi_du_temps");
    }

}
