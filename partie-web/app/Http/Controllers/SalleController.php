<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalleRequest;
use App\Models\EmploiDuTemps;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Salle;
use App\Models\Semestre;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(SalleRequest $request)
    {
        Salle::create([
            "name" => $request->input("name"),
        ]);
        return to_route("emplois.index",['openModal' => true])->with("success","salle created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salle $salle)
    {
        $periodes = Periode::all();
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $emploises = EmploiDuTemps::paginate(1);
        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
        $urlParams = new \Illuminate\Http\Request();
        $openModal = $urlParams->query('openModal');
        return view("admin.emplois.index" ,compact("semestres","filieres","salles","salle","openModal","periodes","days","emploises") );
//        return view("admin.emplois.index" ,compact("salles","salle") );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalleRequest $request, Salle $salle)
    {
        $salle->name = $request->input("name");
        $salle->save();
        return to_route("emplois.index",['openModal' => true])->with("success","salle updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salle $salle)
    {
        $salle->delete();
        return to_route("emplois.index",['openModal' => true])->with("success","salle deleted successfully!");
//        return back()->with("success", "Salle deleted successfully!");
    }

}

