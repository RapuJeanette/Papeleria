<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact('categorias'));
    }
    public function crear()
    {
        return view('categorias.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Categorias::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categoria.index')->with('success', 'Categoria creado correctamente.');
    }

    public function editar($id)
    {
        $categoria = Categorias::find($id);
        return view('categorias.editar', compact('categoria'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $categorias = Categorias::find($id);
        $categorias->name = $request->name;
        $categorias->save();

        return redirect()->route('categoria.index')->with('success', 'Categoria Editado correctamente.');
    }

    public function eliminar($name)
    {
        $categorias = Categorias::find($name);
        $categorias->id=0;
        $categorias->delete();
        return redirect()->route('categoria.index')->with('eliminado', 'Categoria Elimnado correctamente.');
    }
}
