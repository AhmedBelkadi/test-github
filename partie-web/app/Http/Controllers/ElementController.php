<?php

namespace App\Http\Controllers;
use App\Http\Requests\ElementRequest;
use App\Models\ClassRoom;
use App\Models\Element;
use App\Models\Module;
use App\Models\Professeur;

use Illuminate\Http\Request;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elements = Element::paginate();
        $modules = Module::all();
        $professeurs = Professeur::all();

        return view("admin.elements.index" ,compact("elements","modules","professeurs")  );
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
    public function store(ElementRequest $request)
    {
        $c = ClassRoom::create([
            "description" => "",
            "image" => "https://www.gstatic.com/classroom/themes/img_reachout.jpg"
        ]);

         $element = Element::create([
            "id_module" => $request->input("id_module_a"),
            "name" => $request->input("name_a"),
            "class_room_id" => $c->id,
        ]);
        $element->professeurs()->attach($request->input("id_professeur_a"));
        toastr()->success('Element created successfully!');
        return to_route('elements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Element $element)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Element $element)

    {
        return view('admin.elements.index', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Element $element)
    {

        $validated = $request->validate([
            'name' => 'required|unique:elements,name,'.$element->id,
            'id_module' => 'required|exists:modules,id',
            // 'id_professeur[]' => 'required|exists:professeurs,id',

        ]);

        $element->update($validated);
        $element->professeurs()->sync($request->input("id_professeur"));

        toastr()->success('Element updated successfully!');
        return to_route('elements.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Element $element)
    {
        {
            $element->delete();
            toastr()->success('Element deleted successfully!');
            return redirect()->route('elements.index');
        }
    }
}
