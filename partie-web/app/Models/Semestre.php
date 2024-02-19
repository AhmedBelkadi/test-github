<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $fillable = ["id_filiere","name"];
    public function modules()
    {
        return $this->hasMany(Module::class, "id_semestre");
    }

    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class, "id_semestre");
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class , "id_filiere" );
    }

}
