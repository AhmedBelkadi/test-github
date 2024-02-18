<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodeRequest;
use App\Models\EmploiDuTemps;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Salle;
use App\Models\Semestre;
use Illuminate\Http\Request;

class PeriodeController extends Controller
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
    public function store(PeriodeRequest $request)
    {
        Periode::create([
            "libelle" => $request->input("libelle"),
            "nbr_heure" => 90,
        ]);
        return to_route("emplois.index",['openModal2' => true])->with("success","Periode created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        $p = $periode;
        $periodes = Periode::all();
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $emploises = EmploiDuTemps::paginate(1);
        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
        $urlParams = new \Illuminate\Http\Request();
        $openModal2 = $urlParams->query('openModal2');
        return view("admin.emplois.index" ,compact("semestres","filieres","salles","p","openModal2","periodes","days","emploises") );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeriodeRequest $request, Periode $periode)
    {
        $periode->libelle = $request->input("libelle");
        $periode->save();
        return to_route("emplois.index",['openModal2' => true])->with("success","Periode alle updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();
        return to_route("emplois.index",['openModal2' => true])->with("success","Periode deleted successfully!");
//        return back()->with("success", "Salle deleted successfully!");
    }
}
