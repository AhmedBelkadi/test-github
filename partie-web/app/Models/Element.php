<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->belongsTo(Module::class , "id_module" );
    }

    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class , 'element_professeur', 'id_element', 'id_professur' );
    }

    public function seances()
    {
        return $this->hasMany(Seance::class , "id_element" );
    }
}
