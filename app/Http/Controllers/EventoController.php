<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cancha;
use App\CanchaReserva;
use App\CanchaEvento;
use App\Pago;
use App\Evento;
use App\Cliente;
use App\Empleado;

class EventoController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();
        return view('evento.index')->with('canchas', $canchas);
    }


    public function eventosxfecha($fecha)
    {
        list($dia, $mes, $anio) = explode('.', $fecha, 3);
        $canchasReserva = CanchaReserva::join('cancha', 'cancha_reserva.idcancha', '=', 'cancha.id')
                                    ->select('cancha.id')
                                    ->whereDate('cancha_reserva.fecha', $anio.'-'.$mes.'-'.$dia);

        $canchas = CanchaEvento::join('cancha', 'cancha_evento.idcancha', '=', 'cancha.id')
                                    ->join('evento', 'cancha_evento.idevento', '=', 'evento.id')
                                    ->select('cancha.id')
                                    ->whereDate('evento.fecha', $anio.'-'.$mes.'-'.$dia)
                                    ->union($canchasReserva)
                                    ->distinct()
                                    ->get();
       // array_push($canchas, CanchaEvento::join('cancha', 'cancha_evento.idcancha', '=', 'cancha.id'))
        return $canchas;
    }

    public function reservarCliente(Request $input)
    {
        return response()->json(['evento'=> $this->reservar($input->fecha, $input->canchas, $input->monto, 1, $input->token)]);
    }

    public function reservarEmpleado(Request $input)
    {
        return response()->json(['evento' => $this->reservar($input->fecha, $input->canchas, $input->monto, 2, null)]);
    }

    public function reservar($fecha, $canchas, $monto, $tipopago, $token){
        $pago = new Pago();
        $pago->idtipopago = $tipopago;
        $pago->monto = $monto;
        $pago->token = json_encode($token);
        $evento = new Evento();
        $evento->estado = 1;
        list($dia, $mes, $anio) = explode('.', $fecha, 3);
        $evento->fecha = $anio.'-'.$mes.'-'.$dia;
        if($pago->idtipopago == 1){
            $evento->idcliente = Cliente::getOrGenerate(Auth::user())->id;
        }
        else{
            $evento->idempleado = Empleado::find(Auth::user()->id)->id;
            $pago->idempleado = Empleado::find(Auth::user()->id)->id;
        }
        $pago->save();
        $evento->idpago = $pago->id;
        $evento->save();
        for ($i=0; $i <count($canchas) ; $i++) { 
            $idcancha = $canchas[$i]["id"];
            $canchaEvento = new CanchaEvento();
            $canchaEvento->idcancha = $idcancha;
            $canchaEvento->idevento = $evento->id;
            $canchaEvento->save();
        }
        return $evento;
    }
}
