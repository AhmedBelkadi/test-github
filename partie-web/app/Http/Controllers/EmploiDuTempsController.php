<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();

        return view("admin.emplois.index" ,compact("semestres","filieres","salles","periodes") );
//        return view("admin.emplois.index" ,compact("salles") );
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
