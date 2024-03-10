<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::paginate (5);
        $page = Request::get('page')??1;
        return view("Alumnos.listado",compact("alumnos", "page"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Alumnos.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $valores = $request->input();

        $alumno = new Alumno($valores);

        $alumno->save();
        $alumnos = Alumno::paginate(5);
        $page = $alumnos->lastPage();
        return view ("Alumnos.listado",["alumnos"=>$alumnos, "page"=>$page]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
             return view("Alumnos.show", compact('alumno'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        $page= Request::get("page");
        return view('Alumnos.editar', ["alumno" => $alumno, "page" => $page]);
    }
   /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $page= Request::get("page");
        // recojo todos los inputs del formulario
        // $request es la solicitud que trae con ella un formulario con datos
        $valores = $request->input();  // leo los datos del formulario
        $alumno->update($valores);  // actualizo el alumno que estoy editando y lo actualizo con los nuevos datos del formulario
        /* return response()->redirectTo(route("alumnos.index", ["page" => $page])); */
        return redirect(route("alumnos.index", ["page" => $page])); // lo mismo:flecha_en_dirección_ascendente:
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno-> delete();
        $alumnos = Alumno::paginate (5);
        return back();
        return view ("Alumnos.listado",["alumnos"=>$alumnos,"page"=>$page]);
    }
}
