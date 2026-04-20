@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table">
    
    <div class="row">
        <div class="col s6">
            <div class="db-title">
                <h3><img src="{{ asset('images\icon\dbc7.png') }}" alt=""> Nueva Venta</h3>
            </div>
        </div>
        <div class="input-field col s4"  style="background-color: #fff;border: 0;box-shadow: none;color: #444;">
            <input class="input-field" id="search" autocomplete="off" type="search" list="browsers" name="browser" placeholder="Buscar productos..." required>
            <datalist id="browsers">
            </datalist>
        </div>
        <div class="col s2">
            <a style="width: 40px;height: 40px;" class="btn-floating btn-large waves-effect waves-light red"><i style="font-size: 25px;
                margin-top: -7px;" class="material-icons">search</i></a>
        </div>
    </div>
    <br>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th></th>
                <th>Cod.</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="listaProductos">
        </tbody>
        <tfoot style="margin-top: 15px;">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total:</th>
                <th id="total-venta">S/. 0</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
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
<script src="{{ asset('/js/venta.js') }}"></script>

@endsection