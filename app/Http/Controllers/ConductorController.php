<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConductor()
    {
        return response(Conductor::all());
    }
    public function index()
    {
        return view('conductores/index', [
            'conductores' => Conductor::all()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "vista de crear";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'placa' => 'required',
            'licencia' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        Conductor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'email' => $request->email,
            'fecha_registro' => date("d-m-y"),
            'tiempo_registro' => date("H:i:s"),
            'placa' => $request->placa,
            'licencia' => $request->licencia
        ]);
        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'placa' => 'required',
            'licencia' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $conductor = Conductor::find($request->id_conductor);
        $conductor->nombre = $request->nombre;
        $conductor->apellido = $request->apellido;
        $conductor->cedula = $request->cedula;
        $conductor->email = $request->email;
        $conductor->placa = $request->placa;
        $conductor->licencia = $request->licencia;
        $conductor->save();
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conductor = Conductor::findOrfail($request->id);
        $conductor->delete();
    }
}
