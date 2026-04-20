@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table" style="min-height: 400px;">
    
    <div class="row">
        <div class="db-title">
            <h3><img src="{{ asset('images\icon\dbc8.png') }}" alt=""> Nueva Reserva</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s5">
            <h3>Selecciona el tipo de reserva</h3>
            <div class="row">
                <div class="col s5">
                    <div class="radiobtn">
                        <input id="rbtnalquiler" value="alquiler" name="tiporeserva" type="radio" checked>
                        <label for="rbtnalquiler" class="radio-label rbnreserva">Alquiler</label>
                    </div>
                </div>
                <div class="col s5">
                    <div class="radiobtn">
                        <input id="rbtnevento" value="evento" name="tiporeserva" type="radio" >
                        <label  for="rbtnevento" class="radio-label rbnreserva">Evento</label>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col s1"></div>
        <div class="col s6">
                <h3>Selecciona la cancha</h3>
                <div id="canchaSelect" style="display: none;" class="input-field">
                    <select id="selCanchas">
                        @foreach ($canchas as $cancha)
                            <option value="{{ $cancha->id }}" costo="{{ $cancha->costo }}">{{ $cancha->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div  id="canchaCheck" style="display: none;">
                    <ul>
                        @foreach ($canchas as $cancha)
                        <li>
                            <div class="row">
                                <div class="col s7">
                                    <input type="checkbox" disabled="disabled" onclick="calcularTotal()" id="cancha-{{ $cancha->id }}" precio="{{ $cancha->costoevento }}">
                                    <label for="cancha-{{ $cancha->id }}" style="font-size: 1.4rem; padding: 0px 0px 0px 25px">{{$cancha->nombre}}</label>
                                </div>
                                <div class="col s5" style="text-align:right;font-size: 1.5rem;font-weight:bold;">S/. {{$cancha->costoevento}}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            
        </div>
    </div>
    
    <div class="row">
        
        <div class="col s5">
            <h3>Selecciona la fecha</h3>
            <input type="text" id="dtpfecha">
        </div>
        <div class="col s1"></div>
        <div class="col s5" id="listahoras">
            <h3>Selecciona las horas</h3>
            <div class="row" id="listhorasdisponibles"></div>
        </div>
    </div>
    <div class="row">
        <div class="col s7"></div>
        <div class="col s2"  style="text-align:center;">
            <label style="font-size: 1.6rem;line-height: 30px">Total</label>
        </div>
        <div class="col s3" id="total-pagar" style="text-align:right;font-size: 2.4rem;font-weight:bold;">S/. 0.00</div>
    </div>
    
    <div class="row">
        <div class="col s7">
            <br><br><br>
            <img src="http://localhost/elbache/public/images\card.png" alt="">
        </div>
        <div class="col s5" style="text-align:right">
            <br><br>
            <a onclick="reservarEmpleado()" class="waves-effect waves-light btn-large">
                <i class="material-icons left">monetization_on</i> Reservar
            </a>
        </div>
    </div>
</div>
    
@endsection

@section('css')
<link href="{{ asset('css\jquery.datetimepicker.min.css') }}" rel="stylesheet">
<style>
    .xdsoft_datetimepicker .xdsoft_calendar td>div {
    height: 32px;
    padding-right: 5px;
}
</style>
@endsection

@section('js')
<script src="https://checkout.culqi.com/v2"></script>
<script src="{{ asset('js\jquery.datetimepicker.full.js') }}"></script>

<script src="{{ asset('js/reservaEmp.js')}}"></script>
<script>
    var canchas = {!! json_encode($canchas->toArray()) !!};
    
</script>
@endsection