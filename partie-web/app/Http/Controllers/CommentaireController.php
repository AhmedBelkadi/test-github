<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
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
    public function store(Request $request)
    {
        Commentaire::create([
            "commentaire" => $request->input("commentaire"),
            "post_id" => $request->input("post_id")
        ]);
        toastr()->success('Commentaire created successfully!');
        return to_route("commentaires.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $commentaire->commentaire = $request->input("commentaire");
        $commentaire->post_id = $request->input("post_id");
        $commentaire->save();
        toastr()->success('Commentaire updated successfully!');
        return to_route("commentaires.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        toastr()->success('Commentaire deleted successfully!');
        return to_route("commentaires.index");
    }
}
