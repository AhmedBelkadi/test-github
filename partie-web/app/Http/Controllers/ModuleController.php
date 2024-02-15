<?php

namespace App\Http\Controllers;
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
        Module::create([
            "id_semestre" => $request->input("id_semestre"),
            "id_filiere" => $request->input("id_filiere"),
            "nbr_heure" => $request->input("nbr_heure"),
            "name" => $request->input("name"),
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
    public function update(Request $request, Module $module)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|unique:modules,name,' . $module->id,
            'nbr_heure' => 'required|numeric|min:0',
            'id_filiere' => 'required|exists:filieres,id',
            'id_semestre' => 'required|exists:semestres,id',
        ]);

        // Update the module with the validated data
        $module->update($validated);


        return redirect()->route('modules.index')->with('success', 'Module updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        {
            $module->delete();

            return redirect()->route('modules.index')->with('success', 'Moduledeleted successfully!');
        }
    }
}
