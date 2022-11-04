<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        return response(User::all());
    }

    public function index()
    {
        return view('usuarios/index', [
            'users' => User::all()
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
            'email' => 'required',
            'tipo_usuario' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'password' => Hash::make($request->password),
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
            'email' => 'required',
            'tipo_usuario' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $user = User::find($request->id_user);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->email = $request->email;
        $user->save();
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
        $user = User::findOrfail($request->id);
        $user->delete();
    }
}
