<?php

namespace App\Http\Controllers;


use App\Models\EmploiDuTemps;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SeanceController extends Controller
{

    public function destroy(Seance $seance)
    {
        $seance->delete();
        return Redirect::route('emplois.index', [
            'id_filiere' => $seance->emploiDuTemps->filiere->id,
            'name_semestre' => $seance->emploiDuTemps->semestre->name,
        ])->with('success', 'Seance deleted successfully!');
    }

    public function update(Request $request, Seance $seance)
    {
        $request->validate([
            'type' => 'required|string',
            'id_salle' => 'required|exists:salles,id',
            'id_element' => 'required|exists:elements,id',
        ]);

        $seance->update([
            'type' => $request->type,
            'id_salle' => $request->id_salle,
            'id_element' => $request->id_element,
        ]);

        return Redirect::route('emplois.index', [
            'id_filiere' => $seance->emploiDuTemps->filiere->id,
            'name_semestre' => $seance->emploiDuTemps->semestre->name,
        ])->with('success', 'Seance updated successfully.');
    }

    public function store(Request $request)
    {
        Seance::create([
            "id_emploi_du_temps" => $request->input("id_emploi_du_temps"),
            "id_element" => $request->input("id_element"),
            "id_periode" => $request->input("id_periode"),
            "type" => $request->input("type"),
            "day" => $request->input("day"),
            "id_salle" => $request->input("id_salle"),
        ]);

        // Assuming you have the emploi accessible from the request
        $emploi = EmploiDuTemps::find($request->input("id_emploi_du_temps"));

        return Redirect::route('emplois.index', [
            'id_filiere' => $emploi->filiere->id,
            'name_semestre' => $emploi->semestre->name,
        ])->with("success", "Seance created successfully!");
    }



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
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        Seance::create([
//            "id_emploi_du_temps" => $request->input("id_emploi_du_temps"),
//            "id_element" => $request->input("id_element"),
//            "id_periode" => $request->input("id_periode"),
//            "type" => $request->input("type"),
//            "day" => $request->input("day"),
//            "id_salle" => $request->input("id_salle"),
//        ]);
////        dd($s);
//        return to_route("emplois.index")->with("success","Seance created successfully!");
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Seance $seance)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Seance $seance)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, Seance $seance)
//    {
//        $request->validate([
//            'type' => 'required|string',
//            'id_salle' => 'required|exists:salles,id',
//            'id_element' => 'required|exists:elements,id',
//        ]);
//        $seance->update([
//            'type' => $request->type,
//            'id_salle' => $request->id_salle,
//            'id_element' => $request->id_element,
//        ]);
//
//        return to_route("emplois.index")->with('success', 'Seance updated successfully.');
//
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Seance $seance)
//    {
//        $seance->delete();
//        return to_route("emplois.index")->with('success', 'seance deleted successfully!');
//    }
}
