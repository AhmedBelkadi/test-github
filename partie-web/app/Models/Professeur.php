<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    public function elements()
    {
        return $this->belongsToMany(Element::class , 'element_professeur', 'id_professeur', 'id_element' );
    }

    public function departement()
    {
        return $this->hasOne(Departement::class, 'id_professeur');
    }

    public function filiere()
    {
        return $this->hasOne(Filiere::class, 'filiere_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
