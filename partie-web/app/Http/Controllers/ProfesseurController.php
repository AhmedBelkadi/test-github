<?php

namespace App\Http\Controllers;
use App\Exports\ProfesseurExport;
use App\Http\Requests\ProfesseurRequest;
use App\Http\Requests\AjouterProfesseurRequest;
use App\Http\Requests\SearchProfesseurRequest;


use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfesseurEmail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professeurs = Professeur::paginate(15);

        return view("admin.professeurs.index" ,compact("professeurs")  );
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
    public function store(AjouterProfesseurRequest $request)
    {

        $password = substr($request->input('cin_a'), -4). '@' . substr($request->input('name_a'), 0);

        $user = User::create([
            'name' => $request->input('name_a'),
            'tele' => $request->input('tele_a'),
            'adresse' => $request->input('adresse_a'),
            'cin' => $request->input('cin_a'),
            'email' => $request->input('email_a'),
            'role' => 'professeur',
            'password' => bcrypt('123'),
        ]);

        $professeurs = Professeur::create([
            'user_id' => $user->id,
        ]);

//        Mail::to($user->email)->send(new ProfesseurEmail($request->input('email_a'), $password));

        toastr()->success('Professeur created successfully!');

        return to_route('professeurs.index');



    }




    public function search(SearchProfesseurRequest $request)
    {
        $results=Professeur::query();

        if($request->filled("cin")){

        $cin = $request->input('cin');


        $results->whereHas('user',function ($query) use ($cin) {
            $query->where('cin', "$cin");

            })->get();

            $professeurs = $results->get();

            return view('admin.professeurs.index', compact('professeurs'));
        }

            $professeurs = Professeur::paginate(10);


        return view('admin.professeurs.index', compact('professeurs'));
    }








    /**
     * Display the specified resource.
     */
    public function show(Professeur $professeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professeur $professeur)
    {
        // Get the user_id from the User model
        $user_id = $professeur->user->user_id;

        return view('admin.etudiants.index', compact('etudiant', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professeur $professeur)
    {
        $validated = $request->validate([
            'name' => 'required',
            'tele' => 'required',
            'adresse' => 'required',
            'cin' => 'required',
            'email' => 'required|email',
        ]);

        $user = $professeur->user;
        $user->fill($validated);
        $user->save();
        toastr()->success('Professeur updated successfully!');

        return redirect()->route('professeurs.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professeur $professeur)
    {
        {
            $professeur->delete();

        toastr()->success('Professeur deleted successfully!');

            return redirect()->route('professeurs.index');
        }
    }

    public function exporter()
    {
        toastr()->success('Professeurs expoted successfully!');

        return Excel::download(new ProfesseurExport(), 'professeurs.xlsx');

    }

}
