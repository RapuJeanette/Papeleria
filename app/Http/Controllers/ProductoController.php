<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductoController extends Controller
{

  public function index()
  {
    $categorias=Categorias::all();
    $productos = Productos::paginate();
    return view('productos.index', compact('productos','categorias'))->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
  }

  public function crear()
  {
    $productos = new Productos();
    $categorias=Categorias::all();
    return view('productos.crear', compact('productos','categorias'));
  }

  public function guardar(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'precio' => 'required|numeric',
      'id_categoria' => 'required',
      'imagen_url' => 'required|image'
    ]);

    $nombreImagen = time() . '_' . $request->imagen_url->getClientOriginalName();
    $ruta = $request->imagen_url->storeAs('public/imagenes/productos', $nombreImagen);
    $url = Storage::url($ruta);

    Productos::create([
      'name' => $request->name,
      'description' => $request->description,
      'precio' => $request->precio,
      'id_categoria' => $request->id_categoria,
      'imagen_url' => $url
    ]);
    return redirect()->route('producto.index')->with('success', 'Producto creado correctamente.');
  }

  public function editar($id)
  {
    $producto = Productos::find($id);
    $categorias= Categorias::all();
    return view('productos.editar', compact('producto','categorias'));
  }

  public function actualizar(Request $request, $id)
  {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'precio' => 'required|numeric',
        'id_categoria' => 'required',
    ]);

    $producto= Productos::find($id);

    if($request ->imagen_url==''){
      $producto->name = $request->name;
      $producto->description = $request->description;
       $producto->precio = $request->precio;
       $producto->id_categoria = $request->id_categoria;
      $producto->save();
    } else {
      $url=str_replace('storage','public',$producto->imagen_url);
      Storage::delete($url);

      $nombreImagen = time() . '_' . $request->imagen_url->getClientOriginalName();
      $ruta = $request->imagen_url->storeAs('public/imagenes/productos', $nombreImagen);
      $url = Storage::url($ruta);

      $producto->name = $request->name;
      $producto->description = $request->description;
      $producto->precio = $request->precio;
      $producto->id_categoria = $request->id_categoria;
      $producto->imagen_url=$url;
      $producto->save();

    }
    $producto=Productos::find($id);
    return redirect()->route('producto.index')->with('success', 'Producto Editado correctamente.');
  }

  public function eliminar(Productos $producto)
  {
    $url=str_replace('storage','public',$producto->imagen_url);
    Storage::delete($url);
    $producto->delete();
    return redirect()->route('producto.index')->with('eliminado', 'Producto Elimnado correctamente.');
  }

  public function myMethod()
{
    Toastr::success('Este es un mensaje de éxito', 'Título del mensaje');
    return view('myView');
}


}
