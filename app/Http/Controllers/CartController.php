<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Cart;
class CartController extends Controller
{
    public function index()
    {
        return view('cart.index')->with('productos', Cart::content())
                                    ->with('total', Cart::subtotal());
    }
    public function agregarProducto(Request $request)
    {
        $producto = Producto::find($request->idproducto);
        $cantidad = intval($request->cantidad);
        $productCart = Cart::content()->where('id', $producto->id)->first();
        if(empty($productCart)){
            Cart::add(
                ['id' => $producto->id, 
                'name' => $producto->nombre, 
                'qty' => $cantidad, 
                'price' => $producto->precio,
                'options' => ['foto' => $producto->foto]
                ]
            );
            if($request->ajax()){
                return "Producto Agregado correctamente";
            }
            else{
                return redirect('/carrito');
            }
        }
        else{
            Cart::update($productCart->rowId, $cantidad);
            if($request->ajax()){
                return "Producto Modificado correctamente";
            }
            else{
                return redirect('/carrito');
            }
        }
    }

    public function eliminarProducto(Request $request)
    {
        $producto = Producto::find($request->idproducto);
        $productCart = Cart::content()->where('id', $producto->id)->first();
        Cart::remove($productCart->rowId);
        return redirect('/carrito');
    }
    public function countProducto()
    {
        return Cart::content()->count();
    }
}
