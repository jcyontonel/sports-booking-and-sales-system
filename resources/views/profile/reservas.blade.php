@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <h3><img src="{{ asset('images\icon\dbc5.png') }}" alt=""> Mis Reservas</h3>
    </div>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>Cod.</th>
                <th>Cancha</th>
                <th>Fecha de Reserva</th>
                <th>Tiempo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->nombre }}</td>
                <td>{{ $reserva->fecha }}</td>
                <td>{{ $reserva->tiempo }}</td>
                <td>
                    @switch($reserva->estado)
                        @case('1')
                            <a href="#" class="db-success">En espera</a>
                            @break
                        @case('2')
                            <a href="#" class="db-cancel">Cancelado</a>
                            @break
                        @case('3')
                            <a href="#" class="db-end">Terminado</a>
                            @break
                        @case('4')
                            <a href="#" class="db-not-success">Walk over</a>
                            @break
                        @case('5')
                            <a href="#" class="db-playing">En juego</a>
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

@endsection