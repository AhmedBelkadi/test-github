<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodeRequest;
use App\Models\Element;
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
        toastr()->success('Periode created successfully!');
        return to_route("emplois.index",['openModal2' => true]);
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
        $semestres = Semestre::all();
        $filieres = Filiere::all();
        $salles = Salle::all();
        $periodes = Periode::all();
        $elements = Element::all();
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

        // Check if search parameters are present in the request

            // If no search parameters are present, display the latest emploi
            $emploi = EmploiDuTemps::with(['filiere', 'semestre', 'seances'])
                ->orderBy("created_at", "desc")
                ->first();

            // Populate the schedule for the latest emploi
            $schedule = [];
            foreach ($days as $day) {
                $schedule[$emploi->filiere->name][$emploi->semestre->name][$day] = [];
                foreach ($periodes as $periode) {
                    $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] = [];
                    foreach ($emploi->seances as $seance) {
                        if ($seance->day == $day && $seance->id_periode == $periode->id) {
                            $schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id][] = $seance;
                        }
                    }
                }
            }
        $urlParams = new \Illuminate\Http\Request();
        $openModal2 = $urlParams->query('openModal2');


        return view("admin.emplois.index", compact("periodes", "days", "openModal2","schedule", "emploi", "salles", "filieres", "semestres", "elements","p"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeriodeRequest $request, Periode $periode)
    {
        $periode->libelle = $request->input("libelle");
        $periode->save();
        toastr()->success('Periode updated successfully!');
        return to_route("emplois.index",['openModal2' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();
        toastr()->success('Periode deleted successfully!');
        return to_route("emplois.index",['openModal2' => true]);
    }
}
