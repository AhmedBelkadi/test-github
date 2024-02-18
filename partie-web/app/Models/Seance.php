<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = ["id_emploi_du_temps","id_element","id_periode","id_salle","type","day"];
    public function periode()
    {
        return $this->belongsTo(Periode::class, "id_periode");
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, "id_salle");
    }
    public function element()
    {
        return $this->belongsTo(Element::class, "id_element");
    }
    public function emploiDuTemps()
    {
        return $this->belongsTo(EmploiDuTemps::class, "id_emploi_du_temps");
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, "id_seance");
    }

}
