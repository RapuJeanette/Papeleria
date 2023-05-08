<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class CartController extends Controller
{
    public function shop()
    {
        $productos = Productos::all();
       //dd($productos);
        return view('shop')->withTitle('Virtual Papers Scz | SHOP')->with(['productos' => $productos]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('Virtual Papers Scz | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto eliminado!');
    }

    public function add(Request$request){

        $request->validate([
            'name' => 'required',
            'precio' => 'required|numeric',
        ]);
        $producto = Productos::find($request->id);
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'attributes' => array(
                'imagen_url' => $producto->imagen_url,
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Producto Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'cantidad' => array(
                    'relative' => false,
                    'value' => $request->cantidad
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carro limpio!');
    }

}
