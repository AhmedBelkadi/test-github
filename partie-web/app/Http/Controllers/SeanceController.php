<?php

namespace App\Http\Controllers;


use App\Http\Requests\AjouterSeanceRequest;
use App\Http\Requests\ModifierSeanceRequest;
use App\Http\Resources\SeanceResource;
use App\Models\EmploiDuTemps;
use App\Models\Etudiant;
use App\Models\Seance;
use App\Models\Semestre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SeanceController extends Controller
{

    public function destroy(Seance $seance)
    {
        $seance->delete();
        toastr()->success('Seance deleted successfully!');
        return Redirect::route('emplois.index', [
            'id_filiere' => $seance->emploiDuTemps->filiere->id,
            'name_semestre' => $seance->emploiDuTemps->semestre->name,
        ]);
    }

    public function update(ModifierSeanceRequest $request, Seance $seance)
    {

        $seance->update([
            'type' => $request->type,
            'id_salle' => $request->id_salle,
            'id_element' => $request->id_element,
        ]);
        toastr()->success('Seance updated successfully!');

        return Redirect::route('emplois.index', [
            'id_filiere' => $seance->emploiDuTemps->filiere->id,
            'name_semestre' => $seance->emploiDuTemps->semestre->name,
        ]);
    }

    public function store(AjouterSeanceRequest $request)
    {
        Seance::create([
            "id_emploi_du_temps" => $request->input("id_emploi_du_temps"),
            "id_element" => $request->input("id_element"),
            "id_periode" => $request->input("id_periode"),
            "type" => $request->input("type"),
            "day" => $request->input("day"),
            "expired" => true,
            "id_salle" => $request->input("id_salle"),
        ]);

        $emploi = EmploiDuTemps::find($request->input("id_emploi_du_temps"));
        toastr()->success('Seance created successfully!');

        return Redirect::route('emplois.index', [
            'id_filiere' => $emploi->filiere->id,
            'name_semestre' => $emploi->semestre->name,
        ]);
    }


    public function getSeancesByDate($idEtudiant){
        $etd = Etudiant::find($idEtudiant);
        $currentDay = Carbon::now()->format("l");
        $currentDate = Carbon::now()->format('Y-m-d');
        $currentSemester = Semestre::where('id_filiere', $etd->filiere->id)
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();
        $emploi = EmploiDuTemps::where("id_filiere",$etd->filiere->id)->where("id_semestre",$currentSemester->id)->first();
        $seances = Seance::where('day', $currentDay)->where("id_emploi_du_temps",$emploi->id)->get();
        return SeanceResource::collection($seances);
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
