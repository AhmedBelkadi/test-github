<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmploisRequest;
use App\Models\EmploiDuTemps;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Salle;
use App\Models\Semestre;
use Illuminate\Http\Request;

class EmploiDuTempsController extends Controller
{
    public function index()
    {
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        $emploises = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->paginate(1);
        $schedule = [];
        foreach ($emploises as $emploi) {
            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];
            foreach ($days as $day) {
                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
                foreach ($periodes as $periode) {
                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
                    foreach ($emploi->seances as $seance) {
                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
                        }
                    }
                }
            }
        }
        return view("admin.emplois.index", compact("periodes", "days", "schedule", "emploises","salles","filieres","semestres"));
    }
    public function chercher(EmploisRequest $request)
    {
        $emploises = EmploiDuTemps::where("id_semestre",$request->input("id_semestre"))
                                ->where("id_filiere",$request->input("id_filiere"))
                                ->paginate(5);
        $emploi = EmploiDuTemps::where("id_semestre",$request->input("id_semestre"))
                                ->where("id_filiere",$request->input("id_filiere"))
                                ->first();
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();
        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
        $schedule = [];
        foreach ($emploises as $emploi) {
            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];
            foreach ($days as $day) {
                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
                foreach ($periodes as $periode) {
                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
                    foreach ($emploi->seances as $seance) {
                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
                        }
                    }
                }
            }
        }
        return view("admin.emplois.index" ,compact("semestres","filieres","salles","periodes","days","emploises","schedule","emploi") );

    }

}
