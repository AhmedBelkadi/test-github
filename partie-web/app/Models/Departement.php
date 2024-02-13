<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    public function filieres()
    {
        return $this->hasMany(Filiere::class , "id_departement");
    }

    public function chef()
    {
        return $this->belongsTo(Professeur::class , "id_professeur");
    }



}
