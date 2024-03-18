<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = ["nbr_heure","libelle","start_time","end_time"];
    public function seances()
    {
        return $this->hasMany(Seance::class , "id_periode" );
    }

}
