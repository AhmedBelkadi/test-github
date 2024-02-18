<?php

namespace App\Http\Controllers;
use App\Http\Requests\AjouterEtudiantRequest;
use App\Http\Requests\SearchEtudiantRequest;
use App\Http\Requests\EtudiantRequest;
use App\Models\Etudiant;
use App\Models\Filiere;
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
        $user = User::create([
            'name' => $request->input('name'),
            'tele' => $request->input('tele'),
            'adresse' => $request->input('adresse'),
            'cin' => $request->input('cin'),
            'email' => $request->input('email'),
            'role' => 'Etudiant',
            'password' =>'123',
        ]);

        $etudiant = Etudiant::create([
            'user_id' => $user->id,
            "id_filiere" => $request->input("id_filiere"),
            'cne' => $request->input('cne'),
            'apogee' => $request->input('apogee'),

        ]);


    // Send an email to the student with their email and password
    Mail::to($user->email)->send(new SendEmail($user->email, $user->password));




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
}
