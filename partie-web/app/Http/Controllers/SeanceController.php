<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeanceRequest;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
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
    public function store(SeanceRequest $request)
    {

        Seance::create([
            "id_emploi_du_temps" => $request->input("id_emploi_du_temps"),
            "id_element" => $request->input("id_element"),
            "id_periode" => $request->input("id_periode"),
            "type" => $request->input("type"),
            "day" => $request->input("day"),
            "id_salle" => $request->input("id_salle"),
        ]);
        return to_route("emplois.index")->with("success","Seance created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seance $seance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seance $seance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seance $seance)
    {
        //
    }
}
