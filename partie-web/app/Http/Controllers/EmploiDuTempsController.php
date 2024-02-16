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
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $semestres = Semestre::all();
//        $filieres = Filiere::all();
//        $salles = Salle::all();
//        $periodes = Periode::all();
//        $emploises = EmploiDuTemps::paginate(1);
//        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
//
//        return view("admin.emplois.index" ,compact("semestres","filieres","salles","periodes","days","emploises") );
////        return view("admin.emplois.index" ,compact("salles") );
//    }

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
//            dd($schedule[$emploi->filiere->name][$emploi->semestre->name]);

            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];

            foreach ($days as $day) {
//                dd($schedule[$emploi->filiere->name][$emploi->semestre->name][$day] );
                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];

                foreach ($periodes as $periode) {
                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];

                    // Fill in the sessions for the day and period
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



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function chercher(EmploisRequest $request)
    {
        $emploises = EmploiDuTemps::where("id_semestre",$request->input("id_semestre"))
                                ->where("id_filiere",$request->input("id_filiere"))
                                ->paginate(5);

        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();
        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
        $schedule = [];
        foreach ($emploises as $emploi) {
//            dd($schedule[$emploi->filiere->name][$emploi->semestre->name]);

            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];

            foreach ($days as $day) {
//                dd($schedule[$emploi->filiere->name][$emploi->semestre->name][$day] );
                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];

                foreach ($periodes as $periode) {
                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];

                    // Fill in the sessions for the day and period
                    foreach ($emploi->seances as $seance) {
                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
                        }
                    }
                }
            }
        }

        return view("admin.emplois.index" ,compact("semestres","filieres","salles","periodes","days","emploises","schedule") );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmploiDuTemps $emploiDuTemps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmploiDuTemps $emploiDuTemps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmploiDuTemps $emploiDuTemps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmploiDuTemps $emploiDuTemps)
    {
        //
    }
}
