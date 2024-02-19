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
        $filieres = Filiere::paginate(5);
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
//        Filiere::create([
//            "id_professeur" => $request->input("id_professeur"),
//            "id_departement" => $request->input("id_departement"),
//            "nbr_semestre" => $request->input("nbr_semestre"),
//            "type" => $request->input("type"),
//            "name" => $request->input("name"),
//        ]);
    public function store(AjouterFiliereRequest $request)
    {
        $filiere = Filiere::create([
            "id_professeur" => $request->input("id_professeur"),
            "id_departement" => $request->input("id_departement"),
            "nbr_semestre" => $request->input("type") ==="dut" ? 4 : 2,
            "type" => $request->input("type"),
            "name" => $request->input("name"),
        ]);

        // Create semestres
        for ($i = 1; $i <= $filiere->nbr_semestre; $i++) {
            Semestre::create([
                'id_filiere' => $filiere->id,
                'name' => "Semestre " . ($i + (($filiere->type === "dut") ? 0 : 4)),
            ]);
        }

        // Create schedules for each semestre
        foreach ($filiere->semestres as $semestre) {
                $schedule = new EmploiDuTemps();
                $schedule->id_semestre = $semestre->id;
                $schedule->id_filiere = $filiere->id;
                $schedule->save();
        }

        return to_route("filieres.index")->with("success","Filiere created successfully!");
    }
        // Save the filiere
//        $filiere->save();

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

    /**
     * Update the specified resource in storage.
     */
    public function update(ModifierFiliereRequest $request, Filiere $filiere)
    {
//        dd("hh");
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'type' => 'required|string|max:255|in:dut,lp',
//            'nbr_semestre' => 'required|integer|min:2',
//            'id_professeur' => 'required|exists:professeurs,id',
//            'id_departement' => 'required|exists:departements,id',
//        ]);
//        dd($request->validated());
        $filiere->name = $request->input("name");
        $filiere->type = $request->input("type");
        $filiere->nbr_semestre = $request->input("nbr_semestre");
        $filiere->id_departement = $request->input("id_departement");
        $filiere->id_professeur = $request->input("id_professeur");
        $filiere->save();
        return to_route("filieres.index")->with("success","Filiere updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return to_route("filieres.index")->with("success","Filiere deleted successfully!");
    }
}
