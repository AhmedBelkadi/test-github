<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classRooms = ClassRoom::all();
        return view("professeur.classrooms.index" , compact("classRooms") );
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
        ClassRoom::create([
            "description" => $request->input("description"),
            "image" => $request->file("image")->store("classRooms","public")
        ]);
        toastr()->success('ClassRoom created successfully!');
        return to_route("classrooms.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        dd($classRoom->id);
        $d = ClassRoom::find($classRoom->id);
        dd($classRoom);
        return view("professeur.classrooms.show" , compact("classRoom") );

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        $classRoom->image = $request->file("image")->store("classRooms","public");
        $classRoom->description = $request->input("description");
        $classRoom->save();
        toastr()->success('ClassRoom updated successfully!');
        return to_route("classrooms.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classRoom)
    {
        $classRoom->delete();
        toastr()->success('ClassRoom deleted successfully!');
        return to_route("classrooms.index");
    }
}
