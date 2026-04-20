@extends('layouts.appCancha')


@section('content')
<div class="inn-banner">
    <div class="container">
        <div class="row">
            <h4>Nuestros Productos en venta</h4>
            <p>Estos son los productos que tenemos en venta en nuestro local </p>
                    <ul>
                    <li><a href={{ url('/') }}>Inicio</a>
                        </li>
                        <li><a href="#">Productos</a>
                        </li>
                    </ul>
        </div>
    </div>
</div>
<!--TOP SECTION-->
<div class="inn-body-section pad-bot-55">
    <div class="container">
        <div class="row">
            <div class="page-head">
                <h2>Productos en Venta</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
            </div>
            @foreach ($productos as $producto)
            <!--ROOM SECTION-->
            <div class="room">
                <!--ROOM IMAGE-->
                <div class="r1 r-com"><img style="width: 130px" src="{{ $producto->foto }}" alt="">
                </div>
                <div class="r2 r-com">
                    <h4>{{ $producto->nombre }}</h4>
                    <p>{{ substr($producto->descripcion,0,90) }}...</p>
                </div>
                <div class="r2 r-com">
                    <p>Cantidad</p>
                    <p><input type="number" max="{{ $producto->stock }}" min="1" value="1" style="width: 70px; height:40px; text-align: center; font-size: 16px;"
                        id="cantidad-{{ $producto->id }}" precio="{{ $producto->precio }}">
                    </p>
                    <br><br>
                </div>
                <!--ROOM PRICE-->
                <div class="r4 r-com">
                    <p>Precio</p>
                    <p><span class="room-price-1">S/. {{ $producto->precio }}</p>
                </div>
                <!--ROOM BOOKING BUTTON-->
                <div class="r5 r-com">
                    <div class="r2-available">Disponible</div>
                        <a style="font-size: 15px; width: 130px;padding: 7px 10px;cursor: pointer;" class="inn-room-book"
                            onclick="agregarProducto({{ $producto->id }})">
                            <i class="material-icons left">add_shopping_cart</i>
                            Agregar
                        </a> 
                    </div>
            </div>
            <!--END ROOM SECTION-->
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')
<script src="{{ asset('js/producto.js') }}"></script>
@endsection