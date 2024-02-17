<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
    protected $fillable = [  "id_filiere"  , "cne","apogee","user_id"];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class , "id_filiere" );
    }

    public function absences()
    {
        return $this->hasMany(Absence::class , "id_etudiant" );
    }

}
