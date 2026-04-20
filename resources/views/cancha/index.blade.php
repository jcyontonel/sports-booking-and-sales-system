@extends('layouts.appCancha')


@section('content')
<!--TOP BANNER-->
<div class="inn-banner">
    <div class="container">
        <div class="row">
            <h4>Todas nuestras canchas</h4>
            <p style="color: #fff;">Elige una de nuestras para la pichanga con tus amigos, haslo ahora.<p>
            <ul style="color: #fff;">
                <li><a href="{{ asset('/') }}">Inico</a> </li>
                <li><a href="{{ asset('/canchas') }}">Canchas</a> </li>
            </ul>
        </div>
    </div>
</div>
<!--TOP SECTION-->
<div class="inn-body-section pad-bot-70">
    <div class="container">
        <div class="row">
            <div class="page-head">
                <h2>Nuestras Canchas</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <p>Las mejores canchas en un solo lugar, reserva tu cancha ahora.</p>
            </div>
            @foreach($canchas as $cancha)
                <!--ROOM SECTION-->
                <div class="room room-1">
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com r-com-1 r1-1"><img src="{{ asset($cancha->img_lista) }}" alt=""> </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com r-com-1">
                        <h3>{{ $cancha->nombre }}</h3>
                        <!--
                        <h4>Puntuación</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <img src="images\h-trip.png" alt=""> <span>Excelente  4.5 / 5</span> </div>
                        -->
                        <ul>
                            <li>Largo : {{ $cancha->largo }}m</li>
                            <li>Ancho : {{ $cancha->largo }}m</li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="r2-available r2-available-1">Hoy disponible</div>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com r-com-1">
                        <h4>Precio</h4>
                        <p>Precio por hora</p>
                        <p><span class="room-price-1">S/. {{ $cancha->costo }}</span></p>
                        <p>No hay devoluciones</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com r-com-1 r5-1">
                        <a href="{{ url('/canchas/show/'.$cancha->id)}}" class="inn-room-book">Reservar</a> </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--TOP SECTION-->
@endsection

@section('css')

@endsection

@section('js')

@endsection