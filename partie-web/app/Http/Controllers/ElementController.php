<?php

namespace App\Http\Controllers;
use App\Http\Requests\ElementRequest;
use App\Models\Element;
use App\Models\Module;
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

        return view("admin.elements.index" ,compact("elements","modules")  );
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
        $validatedData = $request->validated();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Element $element)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Element $element)
    {

    }
}
