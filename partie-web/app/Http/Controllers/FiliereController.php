<?php

namespace App\Http\Controllers;

use App\Http\Requests\AjouterFiliereRequest;
use App\Http\Requests\ModifierFiliereRequest;
use App\Models\Departement;
use App\Models\EmploiDuTemps;
use App\Models\Filiere;
use App\Models\Professeur;
use App\Models\Qcm;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::paginate(6);
        $professeurs = Professeur::all();
        $departements = Departement::all();

        return view("admin.filieres.index",compact("filieres","professeurs","departements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(AjouterFiliereRequest $request)
    {
        $numberOfPromotions = ($request->input("type") === "dut") ? 2 : 1;
        for ($i = 1; $i <= $numberOfPromotions; $i++) {
            $promotion = ($request->input("type") === "dut" && $i === 1) ? "premier annee" : "deuxieme annee";
            if ($request->input("type") !== "dut") {
                $promotion = "premier annee";
            }
            $filiere = Filiere::create([
                "id_professeur" => $request->input("id_professeur"),
                "id_departement" => $request->input("id_departement"),
                "nbr_semestre" => 2,
                "type" => $request->input("type"),
                "name" => $request->input("name")." $promotion",
                "promotion" => $promotion,
            ]);
            $startSemestreDate = "2023-10-05";
            $startSemestreDate2 = "2024-02-05";
            $endSemestreDate = "2024-01-05";
            $endSemestreDate2 = "2024-06-05";
            for ($j = 1; $j <= $filiere->nbr_semestre; $j++) {
                $s = new Semestre();
                $s->id_filiere=$filiere->id;
                $s->start_date=($j % 2 == 0) ? $startSemestreDate2 : $startSemestreDate;
                $s->end_date=($j % 2 == 0) ? $endSemestreDate2 : $endSemestreDate;
                if (($filiere->type === "dut" && $filiere->promotion === "premier annee")){
                    $s->name="Semestre " . ($j + 0)  ;
                }elseif (  ($filiere->type === "dut" && $filiere->promotion === "deuxieme annee") ){
                    $s->name="Semestre " . ($j + 2)  ;
                }elseif (  ($filiere->type === "lp" && $filiere->promotion === "premier annee") ){
                    $s->name="Semestre " . ($j + 4)  ;
                }
                $s->save();

            }
            foreach ($filiere->semestres as $semestre) {
                    $schedule = new EmploiDuTemps();
                    $schedule->id_semestre = $semestre->id;
                    $schedule->id_filiere = $filiere->id;
                    $schedule->save();
            }
        }
        toastr()->success('Filiere created successfully!');
        return to_route("filieres.index");
    }


    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        $filieres = Filiere::paginate(5);
        $professeurs = Professeur::all();
        $departements = Departement::all();
        return view("admin.filieres.index",compact("filiere","professeurs","departements","filieres"));
    }

    public function update(ModifierFiliereRequest $request, Filiere $filiere)
    {
        $filiere->name = $request->input("name");
        $filiere->id_departement = $request->input("id_departement");
        $filiere->id_professeur = $request->input("id_professeur");
        $filiere->save();
        toastr()->success('Filiere updated successfully!');
        return to_route("filieres.index");
    }


    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        toastr()->success('Filiere deleted successfully!');
        return to_route("filieres.index");
    }
}
