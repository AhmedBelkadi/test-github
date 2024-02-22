<?php

namespace App\Http\Controllers;
use App\Http\Requests\AjouterEtudiantRequest;
use App\Http\Requests\SearchEtudiantRequest;
use App\Http\Requests\EtudiantRequest;
use App\Models\Element;
use App\Models\EmploiDuTemps;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Seance;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::paginate(10);
        $filieres = Filiere::all();


        return view("admin.etudiants.index" ,compact("etudiants","filieres")  );

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
    public function store(AjouterEtudiantRequest $request)
    {
        // $password = substr($request->input('name'), 0, 1) . '.' . substr($request->input('cne'), -4);
        $password = substr($request->input('cne_a'), -4). '@' . substr($request->input('name_a'), 0);



        $user = User::create([
            'name' => $request->input('name_a'),
            'tele' => $request->input('tele_a'),
            'adresse' => $request->input('adresse_a'),
            'cin' => $request->input('cin_a'),
            'email' => $request->input('email_a'),
            'role' => 'etudiant',
            'password' =>bcrypt($password),
        ]);

        $etudiant = Etudiant::create([
            'user_id' => $user->id,
            "id_filiere" => $request->input("id_filiere_a"),
            'cne' => $request->input('cne_a'),
            'apogee' => $request->input('apogee_a'),

        ]);


    // Send an email to the student with their email and password
    Mail::to($user->email)->send(new SendEmail($request->input('email_a'), $password));




        return to_route('etudiants.index');}


        public function search(SearchEtudiantRequest $request)
        {

            $results=Etudiant::query();
            if($request->filled("cin_cne")){

                $cin_cne = $request->input('cin_cne');

                 $results->where(function ($query) use ($cin_cne) {
                    $query->where('apogee', "$cin_cne")
                    ->orWhere('cne',  "$cin_cne");
                })->get();
                $etudiants = $results->get();
                $filieres = Filiere::all();

                return view('admin.etudiants.index', compact('etudiants', 'filieres'));

            }


            $etudiants = Etudiant::paginate(10);

            $filieres = Filiere::all();

            return view('admin.etudiants.index', compact('etudiants', 'filieres'));

        }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $user_id = $etudiant->user->user_id;

        return view('admin.etudiants.index', compact('etudiant','user_id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $validated = $request->validate([
            'name' => 'required',
            'tele' => 'required',
            'adresse' => 'required',
            'cin' => 'required',
            'email' => 'required|email',
            'cne' => 'required',
            'apogee' => 'required',
        ]);

        $user = $etudiant->user;
        // dd($user,$request);

        $user->name = $request->input("name");
        $user->cin = $request->input("cin");
        $etudiant->apogee = $request->input("apogee");
        $etudiant->cne = $request->input("cne");
        $etudiant->id_filiere = $request->input("id_filiere");
        $user->email = $request->input("email");
        $user->tele = $request->input("tele");
        $user->adresse = $request->input("adresse");


        $user->save();
        $etudiant->save();

        return to_route('etudiants.index');
        // dd("kkkk");
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        {
            $etudiant->delete();

            return redirect()->route('etudiants.index')->with('success', 'Etudiant deleted successfully!');
        }
    }


    public function chercherEtdsParFiliere( Request $request )
    {

        $dateValue = $request->input('date'); // Assuming 'date' is the name of your input field

// Extract the day from the date value
        $day = date('l', strtotime($dateValue));
//        dd($day);

// $day will contain the full name of the day (e.g., Monday, Tuesday, etc.)


//        dd($e->filiere->name,$e->semestre->name);
        $periodes = Periode::all();
        $filieres = Filiere::all();
        $elements = Element::all();
        $s = Semestre::where("id_filiere", $request->input("id_filiere"))
            ->where("name", $request->input("name_semestre"))
            ->first();
        $e=EmploiDuTemps::where("id_filiere",$request->input("id_filiere"))->where("id_semestre",$s->id)->get()->first();
        $seance=Seance::where("id_periode",$request->input("id_periode"))
                        ->where("id_element",$request->input("id_element"))
                        ->where("id_emploi_du_temps",$e->id)
                        ->where("day",$day)
                        ->get()->first();
        if ( $seance ){
            $etudiants = Etudiant::where("id_filiere",$request->input("id_filiere"))->paginate(9);
            session()->flash('success', 'Seance found in the emplois');
            return view("professeur.index",compact("etudiants","periodes","filieres","elements"));
        }
            session()->flash('failed', 'Seance not found in the emplois');
        return view("professeur.index",compact("periodes","filieres","elements"));
    }
    public function codeQrParSeance( Request $request )
    {

        $dateValue = $request->input('date');
        $day = date('l', strtotime($dateValue));
        $periodes = Periode::all();
        $filieres = Filiere::all();
        $elements = Element::all();
        $s = Semestre::where("id_filiere", $request->input("id_filiere"))
            ->where("name", $request->input("name_semestre"))
            ->first();
        $e=EmploiDuTemps::where("id_filiere",$request->input("id_filiere"))->where("id_semestre",$s->id)->get()->first();
        $seance=Seance::where("id_periode",$request->input("id_periode"))
                        ->where("id_element",$request->input("id_element"))
                        ->where("id_emploi_du_temps",$e->id)
                        ->where("day",$day)
                        ->get()->first();
        if ( $seance ){
            $etudiants = Etudiant::where("id_filiere",$request->input("id_filiere"))->paginate(9);
            session()->flash('success', 'Seance found in the emplois');
            return view("professeur.index",compact("etudiants","periodes","filieres","elements"));
        }
        session()->flash('failed', 'Seance not found in the emplois');
        return view("professeur.index",compact("periodes","filieres","elements"));
    }
}
