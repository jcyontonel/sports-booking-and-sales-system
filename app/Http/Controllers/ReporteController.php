<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Reserva;
use App\Venta;
use Validator;

class ReporteController extends Controller
{
    public function index()
    {
        return view('profile.reporte');
    }

    public function buscar(Request $request)
    {
        $rules = array(
                    'tipo' => 'required|min:1|max:3',
					'opcion' => 'required',
					'desde' => 'date|nullable',
					'hasta' => 'date|after:desde|nullable');

        $messages = array(
                    'required' => 'El campo :attribute es obligatorio.',
                    'date' => 'Seleccione una fecha :date.',
                    'unique' => 'El :attribute del tema ya existe',
                    'min' => 'El campo :attribute no puede tener menos de :min caracteres.',
                    'max' => 'El campo :attribute no puede tener más de :max caracteres.');

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) 
		{
			return response()->json(['success' => false, 'errors' => $validation->errors()]);
        }
        $result = [];
        switch ($request->tipo) {
            case '1':
                $result = $this->buscarEventos($request->opcion, $request->desde, $request->hasta);
                break;
            case '2':
                $result = $this->buscarReservas($request->opcion, $request->desde, $request->hasta);
                break;
            case '3':
                $result = $this->buscarVentas($request->opcion, $request->desde, $request->hasta);
                break;
        }
        return $result;
    }
    private static function buscarEventos($idcancha, $desde, $hasta)
    {
        return Evento::join('cancha_evento', 'evento.id', '=', 'cancha_evento.idevento')
                        ->join('cancha', 'cancha_evento.idcancha', 'cancha.id')
                        ->join('cliente', 'evento.idcliente', '=', 'cliente.id')
                        ->join('users', 'cliente.iduser', '=', 'users.id')
                        ->select('evento.id as idevento', 'cancha.nombre as cancha', 'evento.fecha', 
                                'evento.estado',
                                \DB::RAW("CONCAT(users.nombre,' ', users.apellidos) AS cliente"))
                        ->where(function($query) use($idcancha){
                            if($idcancha != "0")
                                $query->where('cancha_evento.idcancha', $idcancha);
                        })
                        ->where(function($query) use($desde){
                            if($desde != null)
                                $query->whereDate('evento.fecha',  '>=', $desde);
                        })
                        ->where(function($query) use($hasta){
                            if($hasta != null)
                                $query->whereDate('evento.fecha',  '<=', $hasta);
                        })
                        ->get();
    }
    private static function buscarReservas($idcancha, $desde, $hasta)
    {
        return Reserva::join('cancha_reserva', 'reserva.id', '=', 'cancha_reserva.idreserva')
                        ->join('cancha', 'cancha_reserva.idcancha', 'cancha.id')
                        ->join('cliente', 'reserva.idcliente', '=', 'cliente.id')
                        ->join('users', 'cliente.iduser', '=', 'users.id')
                        ->select('cancha_reserva.id as idreserva', 'cancha.nombre as cancha', 'cancha_reserva.fecha', 'cancha_reserva.estado',
                                'cancha_reserva.tiempo', \DB::RAW("CONCAT(users.nombre,' ', users.apellidos) AS cliente"))
                        ->where(function($query) use($idcancha){
                            if($idcancha != "0")
                                $query->where('cancha_reserva.idcancha', $idcancha);
                        })
                        ->where(function($query) use($desde){
                            if($desde != null)
                                $query->wwhereDatehere('cancha_reserva.fecha',  '>=', $desde);
                        })
                        ->where(function($query) use($hasta){
                            if($hasta != null)
                                $query->whereDate('cancha_reserva.fecha',  '<=', $hasta);
                        })
                        ->get();
    }
    private static function buscarVentas($tipoproducto, $desde, $hasta)
    {
        return Venta::join('producto_venta', 'venta.id', '=', 'producto_venta.idventa')
                        ->join('producto', 'producto_venta.idproducto', 'producto.id')
                        ->join('tipo_producto', 'producto.idtipoproducto', '=', 'producto.id')
                        ->join('cliente', 'venta.idcliente', '=', 'cliente.id')
                        ->join('users', 'cliente.iduser', '=', 'users.id')
                        ->select('venta.id as idventa', 'producto.nombre as producto',
                                'tipo_producto.nombre as tipoproducto', 'venta.created_at as fecha',
                                \DB::RAW("CONCAT(users.nombre,' ', users.apellidos) AS cliente"))
                        ->where(function($query) use($tipoproducto){
                            if($tipoproducto != "0")
                                $query->where('tipo_producto.id', $tipoproducto);
                        })
                        ->where(function($query) use($desde){
                            if($desde != null)
                                $query->whereDate('venta.created_at',  '>=', $desde);
                        })
                        ->where(function($query) use($hasta){
                            if($hasta != null)
                                $query->whereDate('venta.created_at',  '<=', $hasta);
                        })
                        ->get();
    }
}
