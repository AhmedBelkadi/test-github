<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassRoomResource;
use App\Models\ClassRoom;
use App\Models\Element;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Semestre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassRoomControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $classRooms = ClassRoom::all();
//        return ClassRoomResource::collection($classRooms);
//    }

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
//    public function store(Request $request)
//    {
//        ClassRoom::create([
//            "description" => $request->input("description"),
//            "image" => $request->file("image")->store("classRooms","public")
//        ]);
//        toastr()->success('ClassRoom created successfully!');
//        return to_route("classrooms.index");
//    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classroom)
    {
        $posts = $classroom->posts()->paginate(2);
//        $commentaires = $posts->commentaires;
        return view("professeur.classrooms.show" , compact("classroom","posts" ));
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


    public function getClassroomsForCurrentSemester($student_id)
    {

        // Get the student's filiere
        $etudiant = Etudiant::find($student_id);
        $filiereId = $etudiant->filiere->id;
        // Determine the current semester (you need to implement this logic)
        $currentDate = Carbon::now()->format('Y-m-d');
        $currentSemesterId = Semestre::where('id_filiere', $etudiant->filiere->id)
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first()->id;



        // Query modules and elements for the current semester and filiere
        $elements = Element::whereHas('module', function ($query) use ($filiereId, $currentSemesterId) {
            $query->where('id_filiere', $filiereId)
                ->where('id_semestre', $currentSemesterId);
        })->get();

        // Retrieve classrooms associated with elements
        $classrooms = $elements->map(function ($element) {
            return $element->classRoom;
        });

//        dd($classrooms->count());
        // Return the classrooms
        return  ClassRoomResource::collection($classrooms) ;
    }
}
