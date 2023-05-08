<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function crear()
    {
        return view('usuarios.crear');
    }

    public function guardar(Request $request)
    {
        Usuarios::create($request->only('name', 'email', 'password', 'estado')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->route('usuario.index');
    }
}
