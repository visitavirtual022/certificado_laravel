<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::paginate (5);
        return view ("profesores.listado",["profesores"=>$profesores]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("profesores.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfesorRequest $request)
    {
        $valores = $request->input();
        $profesor = new Profesor($valores);

        $profesor->save();
        session()->flash("status", "Se ha creado el profesor $profesor->nombre");
        $profesores = Profesor::paginate(5);
        return view ("profesores.listado",["profesores"=>$profesores]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $profesor=Profesor::find($id);
        return view("profesores.editar", ["profesor" => $profesor]);
    }


    /**
     * Update the specified resource in storage.
     */

   public function update(UpdateProfesorRequest $request, int $id)
    {


        $profesor=Profesor::find($id);
        // recojo todos los inputs del formulario
        // $request es la solicitud que trae con ella un formulario con datos
        $valores = $request->input();  // leo los datos del formulario
        $profesor->update($valores);  // actualizo el alumno que estoy editando y lo actualizo con los nuevos datos del formulario
        /* return response()->redirectTo(route("alumnos.index", ["page" => $page])); */
        return redirect(route("profesores.index", ["profesor"=>$profesor])); // lo mismo:flecha_en_dirección_ascendente:
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $profesor =Profesor::find($id);
        $profesor->delete();
        $profesores = Profesor::paginate (5);
        session()->flash("status", "Se ha borrado El profesor  $profesor->nombre");
        return view ("profesores.listado",["profesores"=>$profesores]);
        //
    }
}
