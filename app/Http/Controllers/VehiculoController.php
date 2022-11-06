<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\tipo_vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVehiculo()
    {
        return response(
            Vehiculo::join('conductores', 'conductores.id', '=', 'vehiculos.id_conductor')
                ->join('tipo_vehiculo', 'tipo_vehiculo.id', '=', 'vehiculos.id_tipo')
                ->get([
                    'vehiculos.placa as vplaca', 'vehiculos.fecha_registro as vfecha_registro','vehiculos.id as vid',
                    'vehiculos.tiempo_registro as vtiempo_registro', 'vehiculos.*', 'conductores.*', 'tipo_vehiculo.*'
                ])
        );
    }
    public function index()
    {
        return view('vehiculos/index', [
            'vehiculos' => Vehiculo::all(),
            'conductores' => Conductor::all(),
            'tipos' => tipo_vehiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_conductor' => 'required',
            'peso' => 'required',
            'placa' => 'required',
            'estado' => 'required',
            'id_tipo' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        Vehiculo::create([
            'id_conductor' => $request->id_conductor,
            'peso' => $request->peso,
            'cedula' => $request->cedula,
            'placa' => $request->placa,
            'estado' => $request->estado,
            'fecha_registro' => date("d-m-y"),
            'tiempo_registro' => date("H:i:s"),
            'id_tipo' => $request->id_tipo,
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
            'id_conductor' => 'required',
            'peso' => 'required',
            'placa' => 'required',
            'estado' => 'required',
            'id_tipo' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $vehiculo = Vehiculo::find($request->id_vehiculo);
        $vehiculo->id_conductor = $request->id_conductor;
        $vehiculo->peso = $request->peso;
        $vehiculo->placa = $request->placa;
        $vehiculo->estado = $request->estado;
        $vehiculo->id_tipo = $request->id_tipo;
        $vehiculo->save();
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
        $vehiculo = Vehiculo::findOrfail($request->id);
        $vehiculo->delete();
    }
}
