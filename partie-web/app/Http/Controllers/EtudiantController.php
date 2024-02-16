<?php

namespace App\Http\Controllers;
use App\Http\Requests\AjouterEtudiantRequest;
use App\Http\Requests\EtudiantRequest;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\User;


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
            'password' => bcrypt('123'),
        ]);

        $etudiant = Etudiant::create([
            'user_id' => $user->id,
            "id_filiere" => $request->input("id_filiere"),
            'cne' => $request->input('cne'),
            'apogee' => $request->input('apogee'),

        ]);

        return to_route('etudiants.index');}


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
//    dd("hhh");
    $validated = $request->validate([
        // User fields
        'name' => 'required',
        'tele' => 'required',
        'adresse' => 'required',
        'cin' => 'required',
        'email' => 'required|email',
        // Etudiant fields
        'cne' => 'required',
        'apogee' => 'required',
    ]);

    $user = $etudiant->user;
    $user->name = $request->input("name");
    $user->tele = $request->input("tele");
    $user->adresse = $request->input("adresse");
    $user->cin = $request->input("cin");
    $user->email = $request->input("email");
    dd($user);
//    $user->pa = $request->name;
//    $user->fill($validated);
//    dd($user);
    $user->save();

    $etudiant->cne = $request->input("cne");
    $etudiant->apogee = $request->input("apogee");
    // Now update the etudiant model
    $etudiant->save();

    return to_route('etudiants.index');
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
