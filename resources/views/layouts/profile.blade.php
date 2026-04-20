@extends('layouts.appCancha')

@section('content')
<!--DASHBOARD SECTION-->
<?php
    $user = Auth::user();
?>
<div class="dashboard" style="margin-bottom: 0px;">
    <div class="db-left">
        <div class="db-left-1">
        <h4>{{ $user->nombre }} {{ $user->apellidos  }}</h4>
            <p>{{ $user->email }}</p>
        </div>
        <div class="db-left-2">
            <ul>
                <li>
                    <a href="#"><img src="{{ asset('images\icon\db7.png') }}" alt=""> Profile</a>
                </li>
                <li>
                    <a href="{{ url('perfil/reservas') }}"><img src="{{ asset('images\icon\db2.png') }}" alt=""> Mis Reservas</a>
                </li>
                <li>
                    <a href="{{ url('perfil/compras') }}"><img src="{{ asset('images\icon\db3.png') }}" alt=""> Mis Compras</a>
                </li>
                <li>
                    <a href="{{ url('perfil/eventos') }}"><img src="{{ asset('images\icon\db4.png') }}" alt=""> Mis Eventos</a>
                </li>
                @if(Auth::user()->hasRole("empleado"))
                    <li>
                        <a href="{{ url('perfil/nueva/venta') }}"><img src="{{ asset('images\icon\db6.png') }}" alt=""> Nva. Venta</a>
                    </li>
                    <li>
                        <a href="{{ url('perfil/nueva/reserva') }}"><img src="{{ asset('images\icon\db9.png') }}" alt=""> Nva. Reserva</a>
                    </li>
                    <li>
                        <a href="{{ url('perfil/juego') }}"><img src="{{ asset('images\icon\18.png') }}" alt=""> Control de juago</a>
                    </li>
                    <li>
                        <a href="{{ url('reporte') }}"><img src="{{ asset('images\icon\db10.png') }}" alt=""> Reportes</a>
                    </li>
                @endif
                <li>
                    <a href="#" 
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <img style="margin-top: -40px;" src="{{ asset('images\icon\db8.png') }}" alt=""> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="db-cent" style="width: 80%;">
        <div class="db-cent-1">
            <p>Hola {{ $user->nombre }},</p>
            <h4>Bienvenido a tu perfil</h4> </div>
        <div class="db-cent-3">
            
            @yield('content-profile')

        </div>
    </div>
    
</div>
<!--END DASHBOARD SECTION-->




@endsection
