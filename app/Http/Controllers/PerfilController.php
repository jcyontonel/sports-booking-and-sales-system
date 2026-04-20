<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reserva;
use App\Venta;
use App\CanchaEvento;
class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function reservas()
    {
        $reservas = Reserva::join('cancha_reserva', 'reserva.id', '=', 'cancha_reserva.idreserva')
                            ->join('cancha', 'cancha_reserva.idcancha', '=', 'cancha.id')
                            ->select('cancha_reserva.id', 'cancha.nombre', 'cancha_reserva.fecha', 
                                        'cancha_reserva.tiempo', 'cancha_reserva.estado')
                            ->where('reserva.idcliente', Auth::user()->id)               
                            ->get();
        return view('profile.reservas')->with('reservas', $reservas);
    }

    public function compras(){
        $compras = Venta::join('producto_venta', 'venta.id', '=', 'producto_venta.idventa')
                            ->join('producto', 'producto_venta.idproducto', '=', 'producto.id')
                            ->select('producto_venta.id', 'producto.foto', 'producto.nombre as producto',
                                    'producto_venta.cantidad', 'producto_venta.precio', 'producto_venta.created_at')
                            ->where('venta.idcliente', Auth::user()->id)
                            ->get();
        return view('profile.compras')->with('compras', $compras);
    }
    
    public function eventos()
    {
        $eventos = CanchaEvento::join('evento', 'cancha_evento.idevento', '=', 'evento.id')
                                ->join('cancha', 'cancha_evento.idcancha', '=', 'cancha.id')
                                ->select('evento.id', 'cancha.nombre as cancha',
                                    'evento.fecha', 'evento.estado')
                                ->where('evento.idcliente', Auth::user()->id)
                                ->get();

        return view('profile.eventos')->with('eventos', $eventos);
    }
}
