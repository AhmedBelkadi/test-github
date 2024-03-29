<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    protected $fillable = [ "id_module" ,"name","id_professeur","class_room_id"];

    public function module()
    {
        return $this->belongsTo(Module::class , "id_module" );
    }

    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class , 'element_professeur', 'id_element', 'id_professeur' );
    }

    public function seances()
    {
        return $this->hasMany(Seance::class , "id_element" );
    }

//    public function classRoom()
//    {
//        return $this->hasOne(ClassRoom::class);
//    }


    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
}
