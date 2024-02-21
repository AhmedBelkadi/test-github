<?php

namespace App\Http\Controllers;
use App\Http\Requests\ModifierModuleRequest;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Models\Semestre;
use App\Models\Filiere;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::paginate(8);
        $filieres = Filiere::all();
        $semestres = Semestre::all();


        return view("admin.modules.index" ,compact("modules","filieres","semestres")  );
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
    public function store(ModuleRequest $request)
    {
        $s = Semestre::where("id_filiere", $request->input("id_filiere_a"))
            ->where("name", $request->input("name_semestre_a"))
            ->first();

        Module::create([
            "id_semestre" => $s->id,
            "id_filiere" => $request->input("id_filiere_a"),
            "nbr_heure" => $request->input("nbr_heure_a"),
            "name" => $request->input("name_a"),
        ]);
        return to_route("modules.index")->with("success","Module created successfully!");    }


    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        return view('admin.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModifierModuleRequest $request, Module $module)
    {



//        $request->validate();

        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Module updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        {
            $module->delete();
            return to_route('modules.index')->with('success', 'Module deleted successfully!');
        }
    }
}
