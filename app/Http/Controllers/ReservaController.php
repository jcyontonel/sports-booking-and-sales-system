<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reserva;
use App\Cancha;
use App\CanchaReserva;
use App\Cliente;
use App\Pago;
use App\Venta;
use App\Producto;
use App\ReservaPago;
use App\ProductoVenta;
use App\VentaPago;
use App\Evento;

class ReservaController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();        
        return view('profile.reserva')->with('canchas', $canchas);
    }
    public function reservasxfecha(Request $request, $fecha)
    {
        $reservas = Reserva::horasNoDisponiblesxDia($fecha, $request->idcancha);
        return response()->json(['reservas' => $reservas]);
    }

    public function reservaCliente(Request $request){
        return response()->json( $this->procesarReseva(1, Auth::id(), $request));
    }
    public function reservaEmpleado(Request $request)
    {
        return response()->json($this->procesarReseva(2, null, $request));
    }
    private function procesarReseva($tipoPago = 1, $idcliente, $request){
        $montoPagar = 0;
        $cliente = null;
        $empleado = null;
        // verificamos el tipo de pago y cargamos los respectivos usuarios
        if($tipoPago == 1){
            $cliente = $this->getOrCreateCliente();
        }else if($tipoPago == 2){
            $cliente = Cliente::find($idcliente);
            $empleado = Auth::user();
        }
         // Generamos la reseva
        list($reserva, $montoReserva) = $this->generarReserva($request->idcancha, 
                                    $cliente? $cliente->id:null,
                                    $empleado==null? null:$empleado->id, 
                                    $request->reservas);
         
        $montoPagar += $montoReserva;
        // Generamos la venta
        list($venta, $montoVenta) = $this->generarVenta($cliente? $cliente->id:null, 
                                $empleado==null? null:$empleado->id, 
                                $request->productos);
        $montoPagar += $montoVenta;
        // Generamos el pago
        $pago = $this->generarPagos($tipoPago, $montoPagar, $empleado==null? null:$empleado->id, $request->token);
        // generamos los detalles
        if($reserva)
            $this->generarDetalleReservaPago($pago->id, $reserva->id);
        if($venta)
            $this->generarDetalleVentaPago($pago->id, $venta->id);

        return ['reserva' => $reserva, 'venta' => $venta];
    }
    private function generarPagos($tipoPago, $montoPagar, $idempleado, $token){
        $pago = new Pago();
        $pago->idempleado = $idempleado;
        $pago->idtipopago = $tipoPago; // Pago con tarjeta
        $pago->monto = $montoPagar;
        $pago->token = json_encode($token);
        $pago->save();
        return $pago;
    }
    private function generarDetalleReservaPago($idpago, $idreserva){
        // Detalle de Pago - Reserva
        $reservaPago = new ReservaPago();
        $reservaPago->idreserva = $idreserva;
        $reservaPago->idpago = $idpago;
        $reservaPago->save();
    }
    private function generarDetalleVentaPago($idpago, $idventa){
        $ventaPago = new VentaPago();
        $ventaPago->idventa = $idventa;
        $ventaPago->idpago = $idpago;
        $ventaPago->save();
    }
    private function getOrCreateCliente(){
        $cliente = Cliente::find(Auth::id());
        if( !$cliente ){
            $cliente = new Cliente();
            $cliente->iduser = Auth::id();
            $cliente->save();
        }
        return $cliente;
    }
    private function generarVenta($idcliente, $idempleado, $productos){
        if(count($productos) == 0)
            return array(null, 0);
        $venta = new Venta();
        $venta->idcliente = $idcliente;
        $venta->idempleado = $idempleado;
        $venta->estado= 1;
        $venta->save();
        $montoTotal = 0;
        // Guardamos los detalles de la venta
        for ($j=0; $j < count($productos) ; $j++) {
            $prod = Producto::find($productos[$j]['id']);
            if($prod){
                $productoVenta = new ProductoVenta();
                $productoVenta->idproducto = $prod->id;
                $productoVenta->idventa = $venta->id;
                $productoVenta->precio = $prod->precio;
                $productoVenta->cantidad = $productos[$j]['cantidad'];
                $productoVenta->save();
                $montoTotal += ($productoVenta->precio * $productoVenta->cantidad);
            }
        }
        return array($venta, $montoTotal);
    }
    private function generarReserva($idcancha, $idcliente, $idempleado, $reservas){
        $reserva = new Reserva();
        $reserva->idcliente = $idcliente;
        $reserva->idempleado = $idempleado;
        $reserva->save();
        $cancha = Cancha::find($idcancha);
        $montoTotal = 0;
        // Guardamos los Detalles de Reserva       
        for ($i = 0; $i < count($reservas); $i++) {
            $horas = $reservas[$i]["horas"];
            list($dia, $mes, $anio) = explode(".", $reservas[$i]["fecha"]);
            $detalleReservas= [];
            for ($j = 0; $j < count($horas); $j++) {
                $hora = $horas[$j];   
                $canchaReserva = new CanchaReserva();
                $canchaReserva->fecha = $anio.'-'.$mes.'-'.$dia.' '.$horas[$j]["desde"];
                $canchaReserva->tiempo = $hora["tiempo"];
                $canchaReserva->estado = 1;
                $canchaReserva->idcancha = $cancha->id;
                $canchaReserva->idreserva = $reserva->id;
                list($h, $m) = explode(":", $hora["tiempo"], 2);
                $costo = $cancha->costo * ($h * 2 + ($m=='30'?1:0));
                $canchaReserva->costo = $costo;
                $canchaReserva->save();
                $montoTotal += $costo;
            }
        }
        return array($reserva, $montoTotal);
    }

    public function juegoFecha()
    {
        $fecha = date("Y-m-d");
        $reservas = Reserva::join('cancha_reserva', 'reserva.id', '=', 'cancha_reserva.idreserva')
                            ->join('cancha', 'cancha_reserva.idcancha', '=', 'cancha.id')
                            ->leftjoin('cliente', 'reserva.idcliente', '=', 'cliente.id')
                            ->leftjoin('users', 'cliente.iduser', '=', 'users.id')
                            ->select('cancha_reserva.id', 'cancha.nombre', 'cancha_reserva.fecha',
                                        'cancha_reserva.tiempo', 'cancha_reserva.estado',
                                        \DB::raw("CONCAT(users.nombre,' ', users.apellidos) AS jugador"))
                            ->whereDate('cancha_reserva.fecha', '=', $fecha)
                            ->get();
        return view('profile.juego')->with('reservas', $reservas);
    }

    public function cambiarEstado(Request $request)
    {
        $canchaReserva = CanchaReserva::find($request->idcanchareserva);
        $canchaReserva->estado = $request->estado;
        $canchaReserva->save();
        return 1;
    }
}
