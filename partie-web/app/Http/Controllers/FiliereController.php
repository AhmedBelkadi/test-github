<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliereRequest;
use App\Models\Departement;
use App\Models\Filiere;
use App\Models\Professeur;
use App\Models\Qcm;
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
    public function store(FiliereRequest $request)
    {
        Filiere::create([
            "id_professeur" => $request->input("id_professeur"),
            "id_departement" => $request->input("id_departement"),
            "nbr_semestre" => $request->input("nbr_semestre"),
            "type" => $request->input("type"),
            "name" => $request->input("name"),
        ]);
        return to_route("filieres.index")->with("success","Filiere created successfully!");    }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        //
    }
}
