<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeScan extends Model
{
    use HasFactory;
    /**
     * Define the relationship between QRCodeScan and Etudiant.
     */

    protected $table = "qr_code_scans";
    protected $fillable = ["scan_timestamp","student_id","session_id"];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'student_id');
    }

    /**
     * Define the relationship between QRCodeScan and Seance.
     */
    public function seance()
    {
        return $this->belongsTo(Seance::class, 'session_id');
    }
}
