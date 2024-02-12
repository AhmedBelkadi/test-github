<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    public function justification()
    {
        return $this->belongsTo(Justification::class);
    }

}
