<?php

namespace App\Http\Controllers;

use App\Http\Requests\RechercherAbsenceRequest;
use App\Http\Requests\SearchAbsencesByStudentRequest;
use App\Http\Resources\AbsenceResource;
use App\Models\Absence;
use App\Models\Element;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Professeur;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function markAbsences(Request $request)
    {
        // Validate the request
//        $request->validate([
//            'absent_students' => 'required|array',
//            'absent_students.*' => 'exists:etudiants,id',
//        ]);

        // Get the list of student IDs marked as absent
        $absentStudentIds = $request->input('absent_students');
//dd($absentStudentIds,$request->input("id_seance"));
        // Create absences for the selected students
        foreach ($absentStudentIds as $studentId) {
            Absence::create([
                'id_etudiant' => $studentId,
                'id_seance' => $request->input("id_seance"),
                'date' => now()->toDateString(),
//                'etat' => 'non justifier', // Assuming the default state is 'non justifier'
                // Add other necessary fields here
            ]);
        }

        // Redirect back or wherever appropriate
        return to_route("indexProf");
    }


    public function index()
    {
        $absences = Absence::paginate(10);
//        $absences =  Auth::user()->role === "admin" ? Absence::paginate(10) : null ;
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

    public function getAbsencesByStudent( $student_id )
    {
//        dd($student_id);
//        $absences = Absence::where('id_etudiant', $student_id)->get();


        // You may want to eager load related data if necessary
         Example: $absences = Absence::where('id_etudiant', $student_id)->get();

        // Return the absences as JSON response
//        return response()->json(['absences' => $absences]);
        return AbsenceResource::collection($absences);

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
        $elements = Professeur::all()->find( Auth::user()->professeur->id )->elements;
        return view("professeur.index" , compact("periodes","filieres","elements")  );
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
        // Validate the request data if
        $request->validate([
            'etat' => 'required|in:justifier,non justifier', // Define appropriate validation rules
        ]);

        // Update the absence based on the "etat" value from the form
        $absence->etat = $request->input("etat");
        $absence->save();
        toastr()->success('Absence updated successfully.');

        // Redirect back or wherever appropriate after the update
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
    }

    public function ajouterAbsence(Request $request)
    {
        $absence =  Absence::create([
            "id_etudiant" => $request->input("id_etudiant"),
            "id_seance" => $request->input("id_seance"),
            "date" => $request->input("date"),
        ]);
        return new AbsenceResource($absence);
    }


}
