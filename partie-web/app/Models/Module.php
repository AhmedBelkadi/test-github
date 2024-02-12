<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    public function filiere()
    {
        return $this->belongsTo(Filiere::class , "id_filiere" );
    }

    public function elements()
    {
        return $this->hasMany(Element::class , "id_element" );
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class , "id_semestre" );
    }

}
