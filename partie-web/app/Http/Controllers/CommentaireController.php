<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentaireResource;
use App\Models\Commentaire;
use App\Models\Post;
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
        $p = Post::find($request->input("post_id"));

        Commentaire::create([
            "commentaire" => $request->input("commentaire"),
            "post_id" => $request->input("post_id"),
            "user_id" => $request->input("user_id")
        ]);
        toastr()->success('Commentaire created successfully!');
        return to_route("classrooms.show",$p->classRoom);
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
        $commentaire->save();
        toastr()->success('Commentaire updated successfully!');
        return to_route("classrooms.show",$commentaire->post->classRoom);
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        toastr()->success('Commentaire deleted successfully!');
//        return to_route("commentaires.index");
        return to_route("classrooms.show",$commentaire->post->classRoom);

    }

    public function modifierCommentaire(Request $request, Commentaire $commentaire)
    {
        $commentaire->commentaire = $request->input("commentaire");
        $commentaire->save();
        return new CommentaireResource($commentaire);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function supprimerCommentaire(Commentaire $commentaire)
    {
        $commentaire->delete();
        return response()->json(["message"=>"Commentaire deleted successfully!"]);
    }


    public function ajouterCommentaire(Request $request)
    {
        $c = Commentaire::create([
            "commentaire" => $request->input("commentaire"),
            "post_id" => $request->input("post_id"),
            "user_id" => $request->input("user_id")
        ]);
        return new CommentaireResource($c);
    }
}
