<?php

namespace App\Http\Controllers;

use App\Http\Requests\RechercherAbsenceRequest;
use App\Http\Requests\SearchAbsencesByStudentRequest;
use App\Models\Absence;
use App\Models\Element;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Semestre;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences = Absence::paginate(10);
        $filieres = Filiere::all();
        $elements = Element::all();
        $periodes = Periode::all();
        $semestres = Semestre::all();

        return view("admin.absences.index" ,compact("absences","filieres","periodes","elements","semestres")  );
    }


    public function chercher(RechercherAbsenceRequest $request)
    {
        $results = Absence::query();

        if ($request->filled('id_filiere')) {
            $results->whereHas('seance.emploiDuTemps.filiere', function ($query) use ($request) {
                $query->where('id', $request->id_filiere);
            });
        }

        if ($request->filled('name_semestre')) {
            $results->whereHas('seance.emploiDuTemps.semestre', function ($query) use ($request) {
                $sw = Semestre::where("id_filiere", $request->input("id_filiere"))
                    ->where("name", $request->input("name_semestre"))
                    ->first();
                $query->where('id', $sw->id);
            });
        }

        if ($request->filled('id_element')) {
            $results->whereHas('seance.element', function ($query) use ($request) {
                $query->where('id', $request->id_element);
            });
        }

        if ($request->filled('date')) {
            $results->where('date', $request->date);
        }

        if ($request->filled('id_periode')) {
            $results->whereHas('seance.periode', function ($query) use ($request) {
                $query->where('id', $request->id_periode);
            });
        }

        $absences = $results->get();
        $filieres = Filiere::all();
        $elements = Element::all();
        $periodes = Periode::all();
        $semestres = Semestre::all();

        return view("admin.absences.index" ,compact("absences","filieres","periodes","elements","semestres")  );



    }

    public function searchByStudent(SearchAbsencesByStudentRequest $request)
    {
        $results = Absence::query();

        if ($request->filled('query')) {
            $query = $request->input("query");

            $results->whereHas('etudiant', function ($query) use ($request) {
                $query->where('cne', $request->input("query"))
                    ->orWhere('apogee', $request->input("query"));
            });

        $absences = $results->get();
            $filieres = Filiere::all();
            $elements = Element::all();
            $periodes = Periode::all();
            $semestres = Semestre::all();

            return view("admin.absences.index" ,compact("absences","filieres","periodes","elements","semestres")  );
        }

        $absences = Absence::paginate(10);
        $filieres = Filiere::all();
        $elements = Element::all();
        $periodes = Periode::all();
        $semestres = Semestre::all();

        return view("admin.absences.index" ,compact("absences","filieres","periodes","elements","semestres")  );


    }

    public function test()
    {
        $periodes = Periode::all();
        $filieres = Filiere::all();
        $elements = Element::all();
        return view("professeur.index" , compact("periodes","filieres","elements")  );
    }
    public function test2()
    {
        return view("login");
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
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
    }
}
