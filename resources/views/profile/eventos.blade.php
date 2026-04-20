@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <h3><img src="{{ asset('images\icon\dbc6.png') }}" alt=""> Mis Eventos</h3>
    </div>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>Cod.</th>
                <th>Canchas</th>
                <th>Fecha de Reserva</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $eventoanterior = false; ?>
            @foreach ($eventos as $evento)
                <?php 
                    $estadohtml = '';
                    switch($evento->estado){
                        case('1'):
                            $estadohtml = '<a href="#" class="db-success">En espera</a>';
                            break;
                        case('2'):
                            $estadohtml = '<a href="#" class="db-end">Finalizado</a>';
                            break;
                        case('3'):
                            $estadohtml = '<a href="#" class="db-cancel">Cancelado</a>';
                            break;
                    }
                    $evento->estadohtml = $estadohtml;
                ?>
                @if (!$eventoanterior)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>
                @elseif ($evento->id == $eventoanterior->id)
                    {{ $eventoanterior->cancha }}, 
                @else
                    {{ $evento->cancha }}
                    </td>
                    <td>{{ $eventoanterior->fecha }}</td>
                    <td><?php echo $eventoanterior->estadohtml ?></td>
                    </tr>
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>
                @endif
                <?php $eventoanterior = $evento; ?>
            @endforeach
                    {{ $eventoanterior->cancha }}</td>
                <td>{{ $eventoanterior->fecha }}</td>
                <td><?php echo $eventoanterior->estadohtml ?></td>
                </tr>
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
</style>
@endsection

@section('js')

@endsection