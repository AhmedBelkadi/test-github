<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

}
