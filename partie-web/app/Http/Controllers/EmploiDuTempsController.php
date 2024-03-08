<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmploisRequest;
use App\Models\Element;
use App\Models\EmploiDuTemps;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Salle;
use App\Models\Semestre;
use Illuminate\Http\Request;

class EmploiDuTempsController extends Controller
{

    public function index(Request $request)
    {
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();
        $elements = Element::all();
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

        // Check if search parameters are present in the request
        if ($request->filled('id_filiere') && $request->filled('name_semestre')) {
            $s = Semestre::where("id_filiere", $request->input("id_filiere"))
                ->where("name", $request->input("name_semestre"))
                ->first();

            $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])
                ->where("id_semestre", $s->id)
                ->where("id_filiere", $request->input("id_filiere"))
                ->first();

            // Populate the schedule for the selected emploi
            $schedule = [];
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
        else {
            // If no search parameters are present, display the latest emploi
            $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])
                ->orderBy("created_at", "desc")
                ->first();
            if( !isset($emploi->filiere) ){
                return view("admin.emplois.index", compact("periodes", "salles", "filieres", "semestres"));

            }
            // Populate the schedule for the latest emploi
            $schedule = [];
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

        return view("admin.emplois.index", compact("periodes", "days", "schedule", "emploi", "salles", "filieres", "semestres", "elements"));
    }

    public function chercher(EmploisRequest $request)
    {
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();
        $elements = Element::all();
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

        $s = Semestre::where("id_filiere", $request->input("id_filiere"))
            ->where("name", $request->input("name_semestre"))
            ->first();

        $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])
            ->where("id_semestre", $s->id)
            ->where("id_filiere", $request->input("id_filiere"))
            ->first();

        $schedule = [];
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

        return redirect()->route('emplois.index', [
            'id_filiere' => $request->input('id_filiere'),
            'name_semestre' => $request->input('name_semestre'),
        ])->with(compact("periodes", "days", "schedule", "emploi", "salles", "filieres", "semestres", "elements"));
    }


//    public function index()
//    {
//
//        $semestres = Semestre::all();
//        $filieres = Filiere::all();
//        $salles = Salle::all();
//        $periodes = Periode::all();
//        $elements = Element::all();
//        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
////        $emploises = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->paginate(1);
//        $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->orderBy("created_at","desc")->get()->first();
////        $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->where("id_semestre",23)
////            ->where("id_filiere",21)
////            ->get()->first();;
//        $schedule = [];
//
//
////        foreach ($emploises as $emploi) {
//            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];
//            foreach ($days as $day) {
//                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
//                foreach ($periodes as $periode) {
//                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
//                    foreach ($emploi->seances as $seance) {
//                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
//                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
//                        }
//                    }
//                }
//            }
////        }
////        dd($schedule);
//        return view("admin.emplois.index", compact("periodes", "days", "schedule", "emploi","salles","filieres","semestres","elements"));
//
//
//
//
//
////        foreach ($emploises as $emploi) {
////            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];
////            foreach ($days as $day) {
////                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
////                foreach ($periodes as $periode) {
////                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
////                    foreach ($emploi->seances as $seance) {
////                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
////                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
////                        }
////                    }
////                }
////            }
////        }
////        return view("admin.emplois.index", compact("periodes", "days", "schedule", "emploises","salles","filieres","semestres","elements"));
//    }
//        $emploises = EmploiDuTemps::where("id_semestre",$request->input("id_semestre"))
//                                ->where("id_filiere",$request->input("id_filiere"))
//                                ->paginate(5);
//    public function chercher(EmploisRequest $request)
//    {
//        $semestres = Semestre::all();
//        $filieres = Filiere::all();
//        $salles = Salle::all();
//        $periodes = Periode::all();
//        $elements = Element::all();
//        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
////        $emploises = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->paginate(1);
//                    $s = Semestre::where("id_filiere",$request->input("id_filiere"))
//                ->where("name",$request->input("name_semestre"))->get()->first();
//        $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->where("id_semestre",$s->id)
//            ->where("id_filiere",$request->input("id_filiere"))
//            ->get()->first();;
////        dd($emploises);
//        $schedule = [];
////        foreach ($emploises as $emploi) {
//            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];
//            foreach ($days as $day) {
//                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
//                foreach ($periodes as $periode) {
//                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
//                    foreach ($emploi->seances as $seance) {
//                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
//                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
//                        }
//                    }
//                }
//            }
////        }
////        return view("admin.emplois.index", compact("periodes", "days", "schedule", "emploi","salles","filieres","semestres","elements"));
//
//
//        return redirect()->route('emplois.index', [
//            'id_filiere' => $request->input('id_filiere'),
//            'name_semestre' => $request->input('name_semestre'),
//        ])->with(compact("periodes", "days", "schedule", "emploi", "salles", "filieres", "semestres", "elements"));
//
//    }
//        if ($request->filled('id_filiere')) {
//
//            $s = Semestre::where("id_filiere",$request->input("id_filiere"))
//                ->where("name",$request->input("name_semestre"))->get()->first();
//            $emplois = EmploiDuTemps::where("id_semestre",$s->id)
//                ->where("id_filiere",$request->input("id_filiere"))
//                ->get()->first();
//        }
//
//
//        $semestres = Semestre::all();
//        $filieres = Filiere::all();
//        $salles = Salle::all();
//        $periodes = Periode::all();
//        $elements = Element::all();
//        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
//        $schedule = [];
//        $emploises = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])->paginate(1);
//
//        foreach ($emploises as $emploi) {
//            $schedule[$emploi->filiere->name][$emploi->semestre->name] = [];
//            foreach ($days as $day) {
//                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
//                foreach ($periodes as $periode) {
//                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
//                    foreach ($emploi->seances as $seance) {
//                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
//                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
//                        }
//                    }
//                }
//            }
//        }
//        return view("admin.emplois.index" ,compact("semestres","filieres","salles","elements","periodes","days","schedule", $request->filled('id_filiere') ? "emplois" : "emploises" ) );

    public function show( EmploiDuTemps $emploiDuTemps )
    {

    }

}
