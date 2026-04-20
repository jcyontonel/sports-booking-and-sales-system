<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evento;
use App\CanchaReserva;

class Reserva extends Model
{
    protected $table = 'reserva';

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }
    
    public static function horasNoDisponiblesxDia($fecha, $idcancha)
    {
        $reservas = [];
        list($dia, $mes, $anio) = explode('.', $fecha, 3);
        $evento = Evento::join('cancha_evento', 'evento.id', '=', 'cancha_evento.idevento')
                            ->whereDate("fecha", $anio."-".$mes."-".$dia)
                            ->where('estado', '=', 1)
                            ->where('idcancha', $idcancha)
                            ->first();
        if($evento){
            $reserva = new Reserva();
            $reserva->fecha = $anio."-".$mes."-".$dia." 9:00:00";
            $reserva->tiempo = "15:00:00";
            array_push($reservas, $reserva);
            return $reservas;
        }
        $reservas = CanchaReserva::select('fecha', 'tiempo')
                            ->whereDate("fecha", $anio."-".$mes."-".$dia)
                            ->where('estado', '=', 1)
                            ->where('idcancha', $idcancha)
                            ->get();
        return $reservas;
        
    }
}
