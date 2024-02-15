<?php

namespace App\Http\Controllers;

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
        $users = User::all();

        return view("admin.etudiants.index" ,compact("etudiants","filieres","users")  );
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
           // Validation
    $request->validate([
        'cne' => 'required',
        'apogee' => 'required',
        'id_filiere' => 'required',
        'user_id' => 'required'
    ]);

    // Save etudiant
    $etudiant = new Etudiant([
        'cne' => $request->get('cne'),
        'apogee' => $request->get('apogee'),
        'id_filiere' => $request->get('id_filiere'),
        'user_id' => $request->get('user_id')
    ]);
    $etudiant->save();

    // Redirect back
    return to_route('etudiants.index')->with("succes !");

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
        return view('admin.etudiants.edit', compact('etudiant'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        // Validate the request data
        $validated = $request->validate([
            'id_filiere' => 'required|exists:filieres,id',
        ]);

        // Update the module with the validated data
        $module->update($validated);


        return redirect()->route('modules.index')->with('success', 'Module updated successfully!');
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
