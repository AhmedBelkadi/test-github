<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = ["id_emploi_du_temps","id_element","id_periode","id_salle","type","day","expired"];
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

    public function qrCodeScans()
    {
        return $this->hasMany(QRCodeScan::class, 'session_id');
    }

    public function scannedStudents()
    {
        return $this->hasManyThrough(Etudiant::class, QrCodeScan::class, 'session_id', 'id', 'id', 'student_id');
    }


    /**
     * Get the total number of expected students for this session.
     */
    public function expectedStudents()
    {
        // Your logic to get the total number of expected students for this session
        // For example, if you have a relationship between Session and Course model,
        // you can count the number of students enrolled in the course
        return $this->emploiDuTemps->filiere->etudiants();
    }





}
