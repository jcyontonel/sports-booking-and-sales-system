@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <h3><img src="{{ asset('images\icon\dbc9.png') }}" alt=""> Control de Juegos</h3>
    </div>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>#Cod.</th>
                <th>Jugador</th>
                <th>Cancha</th>
                <th>Fecha</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <?php 
                    $fecha = strtotime((new DateTime($reserva->fecha))->format('Y-m-d H:i'));
                    list($hora, $minutos) = explode(':', $reserva->tiempo, 2);
                ?>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->jugador }}</td>
                <td>{{ $reserva->nombre }}</td>
                <td>{{ date('d-m-Y', $fecha) }}</td>
                <td>{{ date('H:i', $fecha) }}</td>
                <td>{{ date('H:i', $fecha + (60*60*$hora)+(60*$minutos)) }}</td>
                <td>
                    @switch($reserva->estado)
                        @case('1')
                            <a class="db-success">En espera</a>
                            @break
                        @case('2')
                            <a class="db-cancel">Cancelado</a>
                            @break
                        @case('3')
                            <a class="db-end">Terminado</a>
                            @break
                        @case('4')
                            <a class="db-not-success">Walk over</a>
                            @break
                        @case('5')
                            <a class="db-playing">En juego</a>
                            @break
                        @default
                    @endswitch
                </td>
                <td width="300px">
                    <?php
                        $iniciar = '<button onclick="updateEstado('.$reserva->id.', 5)" class="btn db-playing">Iniciar Juego</button>';
                        $terminar = '<button onclick="updateEstado('.$reserva->id.',3)" class="btn db-end">Terminar</button>';
                        $walk = '<button onclick="updateEstado('.$reserva->id.',4)" class="btn db-not-success">Walk over</button>';
                        $cancelar = '<button onclick="updateEstado('.$reserva->id.',2)" class="btn db-cancel">Cancelar</button>';
                    ?>
                    @switch($reserva->estado)
                        @case('1')
                                {!! $iniciar !!} {!! $walk !!} {!! $cancelar !!}
                            @break
                        @case('5')
                                {!! $terminar !!}
                            @break
                        @default
                            
                    @endswitch
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('css')
    <style>
        .db-cancel {
            background: #b00004;
            color: #fff;
            padding: 2px 4px;
            border-radius: 2px;
            font-size: 12px;
        }
        .db-end {
            background: #008af0;
            color: #fff;
            padding: 2px 4px;
            border-radius: 2px;
            font-size: 12px;
        }
        .db-playing {
            background: #ffb720;
            color: #fff;
            padding: 2px 4px;
            border-radius: 2px;
            font-size: 12px;
        }
    </style>
@endsection

@section('js')
    <script>
        function updateEstado($idcanchareserva, $estado) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $urlbase+"/perfil/reserva/update/estado",
                type: 'POST',
                data:{
                    estado: $estado,
                    idcanchareserva: $idcanchareserva
                },
                success: function(data) {
                    if(data==1)
                        location.reload();
                    else{
                        alert("No se pudo realizar la acción, intentelo nuevamente.");
                    }
                }
            });
        }
    </script>
@endsection