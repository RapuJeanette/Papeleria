<?php

namespace App\Http\Controllers;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ClientesController extends Controller
{
   public function index(){
    $clientes= Clientes::all();
    return view('clientes.index', compact('clientes'));
   }
   public function crear()
   {
     return view('clientes.crear');
   }

   public function guardar(Request $request)
   {
     $request->validate([
       'ci_cliente' => 'required|numeric',
       'nit_cliente' => 'required|digits_between:1,19',
       'nombre' => 'required',
       'apellido' => 'required',
       'email' => 'required',
       'cel' => 'required|numeric'
     ]);

       Clientes::create([
       'ci_cliente' => $request->ci_cliente,
       'nit_cliente' => $request->nit_cliente,
       'nombre' => $request->nombre,
       'apellido' => $request->apellido,
       'email' => $request->email,
       'cel'=>$request->cel,
     ]);
     return redirect()->route('cliente.index')->with('success', 'Cliente creado correctamente.');
   }

   public function editar($id)
   {
     $cliente = Clientes::find($id);
     return view('clientes.editar', compact('cliente'));
   }

   public function actualizar(Request $request, $id)
   {
     $request->validate([
        'ci_cliente' => 'required|numeric',
        'nit_cliente' => 'required|numeric',
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required',
        'cel' => 'required|numeric'
     ]);

     $clientes= Clientes::find($id);
       $clientes->ci_cliente = $request->ci_cliente;
       $clientes->nit_cliente = $request->nit_cliente;
       $clientes->nombre = $request->nombre;
       $clientes->apelido = $request->apellido;
       $clientes->email = $request->email;
       $clientes->cel=$request->cel;
       $clientes->save();

     return redirect()->route('clientes.index')->with('success', 'Cliente Editado correctamente.');
   }

   public function eliminar(Clientes $cliente)
   {
     $cliente->delete();
     return redirect()->route('cliente.index')->with('eliminado', 'Cliente Elimnado correctamente.');
   }

   public function myMethod()
 {
     Toastr::success('Este es un mensaje de éxito', 'Título del mensaje');
     return view('myView');
 }
}
