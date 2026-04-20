<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Venta;
use App\ProductoVenta;
use App\Pago;
use App\VentaPago;

class VentaController extends Controller
{
    public function index()
    {
        return view('profile.venta');
    }
    public function venderCliente(Request $request)
    {
        $result = $this->vender("cliente", 
                                Cart::content(), 
                                Cart::subtotal(),
                                $request->token);
        if($result['value'])
            Cart::destroy();
        return $result;
    }
    public function venderEmpleado(Request $request)
    {
        $productos = [];
        $total = 0;
        foreach ($request->productos as $p) {
            $producto = new Producto();
            $producto->id = $p["id"];
            $producto->qty = $p["qty"];
            $producto->price = $p["price"];
            array_push($productos, $producto);
            $total += (floatval($producto->qty) * floatval($producto->price)) ;
        };
        return $this->vender("empleado", $productos, $total, null);
    }

    private static function vender($usuario, $productos, $total, $token){
        $venta = new Venta();
        $pago = new Pago();
        $user = Auth::user();
        if(!$user){
            return [ 'value' => false, 
                        'message' => "Necesita registrarse para poder comprar." ];
        }
        if($usuario == "cliente"){
            $venta->idcliente = $user->id;
            $pago->idtipopago = 1;
        }
        else if($usuario == "empleado"){
            $venta->idempleado = $user->id;
            $pago->idempleado = $user->id;
            $pago->idtipopago = 2;
        }
        $venta->estado = 1;
        $venta->save();
        foreach ($productos as $producto) {
            $productoVenta = new ProductoVenta();
            $productoVenta->idproducto = $producto->id;
            $productoVenta->idventa = $venta->id;
            $productoVenta->precio = $producto->price;
            $productoVenta->cantidad = $producto->qty;
            $productoVenta->save();
        }
        $pago->monto = $total;
        $pago->token = json_encode($token);
        $pago->save();
        $ventaPago = new VentaPago();
        $ventaPago->idventa = $venta->id;
        $ventaPago->idpago = $pago->id;
        $ventaPago->save();
        return [ 'value' => true, 
                    'message' => "Venta realizada de forma correcta" ];
        
    }

    public function buscarProducto($nombre = '')
    {
        if(trim($nombre) == '')
            return;
        $productos = Producto::select('id', 'nombre', 'precio', 'stock', 'foto')
                                    ->where('nombre', 'like', '%'.$nombre.'%')
                                    ->where('stock', '<>', 0)
                                    ->take(15)
                                    ->get();
        return response()
                    ->json(['productos' => $productos]);
    }
}
