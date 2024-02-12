<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    public function departement()
    {
        return $this->belongsTo(Departement::class , "id_departement" );
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function semestres()
    {
        return $this->hasMany(Semestre::class);
    }

    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
    public function etudiants()
    {
        return $this->hasMany(User::class);
    }

}
