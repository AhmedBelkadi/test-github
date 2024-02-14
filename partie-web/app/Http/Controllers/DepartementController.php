<?php

namespace App\Http\Controllers;
use App\Http\Requests\DepartementRequest;
use App\Models\Departement;
use App\Models\Professeur;
use App\Models\Filiere;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::paginate(4);
        $professeurs = Professeur::all();
        return view("admin.departements.index" ,compact("departements","professeurs")  );
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
    public function store(DepartementRequest $request)
    {
        $validated = $request->validated();

        // Create a new departement
        $departement = new Departement();
        $departement->name = $validated['name'];
        $departement->id_professeur = $validated['id_professeur'];
        $departement->save();

        return redirect()->route('departements.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        //
    }
}
