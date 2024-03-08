<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [ "id_departement" , "id_professeur" , "nbr_semestre" , "type" , "name","promotion"];

    public function departement()
    {
        return $this->belongsTo(Departement::class , "id_departement" );
    }

    public function modules()
    {
        return $this->hasMany(Module::class , "id_filiere" );
    }

    public function semestres()
    {
        return $this->hasMany(Semestre::class  , "id_filiere");
    }

    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class , "id_filiere");
    }
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class , "id_filiere");
    }

    public function chef ()
    {
        return $this->belongsTo(Professeur::class, 'id_professeur');
    }

}
