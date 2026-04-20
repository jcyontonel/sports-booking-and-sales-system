@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <h3><img src="{{ asset('images\icon\dbc3.png') }}" alt=""> Mis Compras</h3>
    </div>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th></th>
                <th>Cod.</th>
                <th>Producto</th>
                <th>Fecha Compra</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td><img width="50px" src="{{ asset($compra->foto) }}" alt=""></td>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->producto }}</td>
                <td>{{ $compra->created_at }}</td>
                <td>{{ $compra->cantidad }}</td>
                <td>{{ $compra->precio }}</td>
                <td>{{ $compra->cantidad * $compra->precio }}</td>
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
</style>
@endsection

@section('js')

@endsection