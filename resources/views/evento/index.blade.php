@extends('layouts.appCancha')


@section('content')
<div class="inn-body-section inn-booking">
    <div class="container">
        <div class="row">
            <!--TYPOGRAPHY SECTION-->
            <div class="col-md-6">
                <div class="book-title">
                    <h2 style="font-size:4em;">Reserva para tu evento</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="book-form inn-com-form">
                    <form action="" class="col s12 ng-pristine ng-valid">
                        <div class="row">
                            <div class="col s12">
                                <h3 style="margin:5px;">Selecciona la o las canchas a reservar</h3>
                                <p>Recuerde que al reservar solo una cancha la otra estará disponible para el alquiler de deporte.</p>
                            </div>
                            <div class="col s12">
                                <br>
                                <div class="row">
                                    <div class="col s6">
                                        <h4 style="margin: 5px;">Seleccione fecha</h4>
                                        <input id="dtpfecha" type="text">
                                    </div>
                                    <div class="col s6">
                                        <h4 style="margin: 5px;">Seleccione canchas</h4>
                                        <br>
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
                                        <p style="color:#ff0000; margin-left: 10px;">Solo se habilitan las canchas disponibles.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s7"></div>
                                    <div class="col s2" style="text-align:center;">
                                        <label style="font-size: 1.6rem;line-height: 30px">Total</label>
                                    </div>
                                    <div class="col s3" id="total-pagar" style="text-align:right;font-size: 2.4rem;font-weight:bold;">S/.0.00</div>
                                </div>
                                <div class="row">
                                    <div class="col s7">
                                        <br><br><br>
                                        <img src="http://localhost/elbache/public/images\card.png" alt="">
                                    </div>
                                    <div class="col s5" style="text-align:right">
                                        <br><br>
                                        <a onclick="reservar()" class="waves-effect waves-light btn-large">
                                            <i class="material-icons left">monetization_on</i> Reservar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--END TYPOGRAPHY SECTION-->
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{ asset('css\jquery.datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="https://checkout.culqi.com/v2"></script>
    <script src="{{ asset('js\jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ asset('js\evento.js') }}"></script>
@endsection