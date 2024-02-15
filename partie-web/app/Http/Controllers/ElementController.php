<?php

namespace App\Http\Controllers;
use App\Http\Requests\ElementRequest;
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

        $module = Module::find($request->input("id_module"));

        // Create a new `Element` model and associate it with the `Module`.
        $element = new Element([
            "name" => $request->input("name"),
        ]);

        $module->elements()->save($element);

        // Associate the `Element` with the `Professeur`.
        $professeur = Professeur::find($request->input("id_professeur"));
        $element->professeurs()->save($professeur);

        return to_route('elements.index')->with("success","Element created successfully!");
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



        ]);

        $element->update($validated);

        return redirect()->route('elements.index')->with('success', 'Element updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Element $element)
    {
        {
            $element->delete();

            return redirect()->route('elements.index')->with('success', 'Element deleted successfully!');
        }
    }
}
