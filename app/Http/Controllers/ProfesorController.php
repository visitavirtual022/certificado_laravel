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
        //
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
    public function store(StoreProfesorRequest $request)
    {
        $valores = $request->input();
        $profesor = new Profesor($valores);
        $profesor->save();
        $profesores = Profesor::all();
        session()->flash("status", "Se ha creado $profesor->id");
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
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfesorRequest $request, Profesor $profesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesor $profesor)
    {
        dd($profesor);
        $profesor->delete();
        $profesores = Profesor::all();
        session()->flash("status", "Se ha creado $profesor->id");
        return view ("profesores.listado",["profesores"=>$profesores]);
        //
    }
}
