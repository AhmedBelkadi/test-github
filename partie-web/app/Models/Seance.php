<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

}
