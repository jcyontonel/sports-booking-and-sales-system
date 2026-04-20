<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cancha;
use App\Producto;

class CanchaController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();
        return view('cancha.index')->with('canchas', $canchas);
    }

    public function show($id)
    {
        $cancha = Cancha::find($id);
        $productos = Producto::whereIn('id', [1, 2])->get();
        return view('cancha.show')
                        ->with('cancha', $cancha)
                        ->with('productos', $productos);
    }
}
