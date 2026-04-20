@extends('layouts.appCancha')


@section('content')
<div class="inn-banner">
    <div class="container">
        <div class="row">
            <h4>Carrito de Compras</h4>
            <p>Listas de productos agregados al carrito </p>
                    <ul>
                    <li><a href="{{ url('/') }}">Inicio</a>
                        </li>
                        <li><a href="#">Carrito</a>
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
                    <h2><i style="font-size: 35px;" class="material-icons">shopping_cart</i>Carrito de Compras </h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
                <!--TYPOGRAPHY SECTION-->
                <div class="col-md-12">
                    <div class="head-typo typo-com">
                        @if (count($productos)>0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio (S/.)</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <td><img style="max-height: 60px" src="{{ asset($producto->options->foto) }}" alt=""></td>
                                        <td>{{ $producto->name }}</td>
                                        <td>
                                            <form action="{{ url('/carrito/agregar') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="number" name="cantidad" value="{{ $producto->qty }}" style="width: 70px; height:40px; text-align: center; font-size: 16px;">
                                                <input type="hidden" name="idproducto" value="{{ $producto->id }}">
                                                <button onclick="submit()" class="btn-floating waves-effect waves-light green">
                                                    <i class="material-icons" style="font-size: 25px;">update</i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $producto->price }}</td>
                                        <td>{{ $producto->subtotal }}</td>
                                        <td>
                                            <form action="{{ url('/carrito/eliminar') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="idproducto" value="{{ $producto->id }}">
                                                <button onclick="submit()" class="btn-floating waves-effect waves-light red">
                                                    <i class="material-icons" style="font-size: 25px;">delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total:</th>
                                    <th>S/. {{ $total }}</th>
                                    <th></th>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col s7">
                                    <br><br><br>
                                    <img src="http://localhost/elbache/public/images\card.png" alt="">
                                </div>
                                <div class="col s5" style="text-align:right">
                                    <br><br>
                                    <a onclick="pagar()" class="waves-effect waves-light btn-large">
                                        <i class="material-icons left">monetization_on</i> Pagar
                                    </a>
                                </div>
                            </div>
                        @else
                            <p>El carrito de compras esta vacío.</p>
                        @endif
                        
                    </div>
                </div>
                <!--END TYPOGRAPHY SECTION-->
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
<script src="https://checkout.culqi.com/v2"></script>
<script src="{{ asset('js/producto.js') }}"></script>
<script>
Culqi.publicKey = 'pk_test_D0HRdkfbFayxZSsf';
Culqi.settings({
    title: 'El Bache',
    currency: 'PEN',
    description: 'Compra de productos',
    amount: {{ $total*100 }}
});

</script>
@endsection