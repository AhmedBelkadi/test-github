<?php

namespace App\Http\Controllers;

use App\Http\Resources\JustificationResource;
use App\Models\Justification;
use Illuminate\Http\Request;

class JustificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data"=>"index"]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $j = Justification::create([
            "libele" => $request->file("path")->store("justifications","public"),
            "date" => date("d-m-Y-H-i-s"),
            "etat" => "en revue"
        ]);

        $j->absences()->attach($request->input("id_absence"));

//        return response()->json(["data"=> $j]);
        return new JustificationResource( $j );
    }

    /**
     * Display the specified resource.
     */
    public function show(Justification $justification)
    {
        return response()->json(["data"=>"show"]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Justification $justification)
    {
        return response()->json(["data"=>"update"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Justification $justification)
    {
        return response()->json(["data"=>"destroy"]);

    }
}
