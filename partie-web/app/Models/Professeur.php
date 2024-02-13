<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    public function elements()
    {
        return $this->belongsToMany(Element::class , 'element_professeur', 'id_professur', 'id_element' );
    }

    public function department()
    {
        return $this->hasOne(Departement::class, 'professur_id');
    }

    public function filiere()
    {
        return $this->hasOne(Filiere::class, 'filiere_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
