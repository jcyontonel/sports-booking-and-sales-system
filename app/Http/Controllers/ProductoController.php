<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Cart;
use App\TipoProducto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::select('id', 'nombre', 'precio', 'stock', 'foto', 'descripcion')
                                    ->whereNotIn('idtipoproducto', [1,2])
                                    ->where('stock', '<>', 0)
                                    ->get();
        return view('producto.index')->with('productos', $productos);
    }

    public function seachByName($nombre = '')
    {
        if(trim($nombre) == '')
            return;
        $productos = Producto::select('id', 'nombre', 'precio', 'stock', 'foto')
                                    ->where('nombre', 'like', '%'.$nombre.'%')
                                    ->whereIn('idtipoproducto', [1,2])
                                    ->where('stock', '<>', 0)
                                    ->take(15)
                                    ->get();
        return response()
                    ->json(['productos' => $productos]);
    }
    public function tipos()
    {
        return TipoProducto::get();
    }
}
