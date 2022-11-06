<?php

namespace App\Http\Controllers;

use App\Models\Ley;
use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLey()
    {
        return response(
            Ley::join('conductores', 'conductores.id', '=', 'ley.id_conductor')
                ->get(['conductores.*','ley.*', 'ley.id as LeyId'])
        );
    }

    public function index()
    {
        return view('ley/index', [
            'ley' => Ley::all(),
            'conductores' => Conductor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
            'cliente' => 'required',
            'producto' => 'required',
            'cargue' => 'required',
            'descargue' => 'required',
            'ciudad_entrada' => 'required',
            'ciudad_salida' => 'required',
            'peso_entrada' => 'required',
            'peso_salida' => 'required',
            'observaciones' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        Ley::create([
            'id_conductor' => $request->id_conductor,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_salida' => $request->fecha_salida,
            'cliente' => $request->cliente,
            'producto' => $request->producto,
            'cargue' => $request->cargue,
            'descargue' => $request->descargue,
            'ciudad_entrada' => $request->ciudad_entrada,
            'ciudad_salida' => $request->ciudad_salida,
            'peso_entrada' => $request->peso_entrada,
            'peso_salida' => $request->peso_salida,
            'observaciones' => $request->observaciones,
            'fecha_registro' => date("d-m-y"),
            'tiempo_registro' => date("H:i:s")
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
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ley = Ley::findOrfail($request->id);
        $ley->delete();
    }
}
