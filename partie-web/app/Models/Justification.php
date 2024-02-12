<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    use HasFactory;

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function etudiant()
    {
        return $this->belongsTo(User::class);
    }

}
