<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $c = ClassRoom::find($request->input("class_room_id"));

        Post::create([
            "content" => $request->input("content"),
            "class_room_id" => $request->input("class_room_id")
        ]);
        toastr()->success('Post created successfully!');
        return to_route("classrooms.show",$c);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
//        return view('professeur.posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
//        $post->class_room_id = $request->input("class_room_id");
        $post->content = $request->input("content");
        $post->save();
        toastr()->success('Post updated successfully!');
        return to_route("classrooms.show",$post->classRoom);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        toastr()->success('Post deleted successfully!');
        return to_route("classrooms.show",$post->classRoom);
    }
}
