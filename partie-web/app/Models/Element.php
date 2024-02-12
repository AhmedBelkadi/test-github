<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function professeur()
    {
        return $this->belongsTo(User::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
