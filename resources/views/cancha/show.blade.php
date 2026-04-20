@extends('../layouts.appCancha')

@section('content')
<!--TOP SECTION-->
<div class="inn-body-section inn-detail">
    <style>
        .inn-detail {
            background: url( <?php echo asset($cancha->img_portada) ?> ) no-repeat;
            background-attachment: fixed;
            background-size: 40%;
        }
        @media screen and (max-width: 992px) {
            .inn-detail {
                background-size: 0%;
                background: none;
            }
        }
    </style>
   
    <div class="container">
        <div class="row">
            <div class="inn-bod">
                <div class="inn-detail-p1 inn-com">
                    <div class="row">
                        <div class="col s8">
                            <h2>Reservar {{ $cancha->nombre }}</h2>
                            <div class="r2-ratt"> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <img src="{{asset('images\h-trip.png')}}" alt=""> 
                                <span>Excelente  4.5 / 5</span> 
                            </div>
                            <p><b>Largo:</b> {{ $cancha->largo }}m <span style="margin-left:15px;"> </span> <b>Ancho:</b> {{ $cancha->ancho }}m</p>
                        </div>
                        <div class="col s4">
                            <h1>S/. {{ $cancha->costo }}</h1>
                        </div>
                    </div>
                    <p>{{$cancha->descripcion}}</p>
                </div>
                <div class="inn-detail-p1 inn-com inn-com-list-point">
                    <h2>Selecciona la fecha y hora</h2>
                    <div class="row">
                        <div class="col s5">
                            <p>Busca entre las horas disponibles</p>
                            <input type="text" id="dtpfecha">
                        </div>
                        <div class="col s7">
                            <div class="row" id="listhorasdisponibles">
                                
                            </div>
                        </div>
                        <div class="col s12">
                            <h5 style="color:#ff1c1c">Atención: Tenga en cuenta que debe llegar a la hora exacta de su reserva. No se atendán reclamos ni devoluciones si llega a perder su reserva por llegar fuera de hora.</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <table id="tableHorasSeleccionadas" class="table">
                               
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <span style="display: inline;"><h5 style="margin: 5px;">Agregue productos adicionales:</h5></span> 
                        </div>
                        <div class="col s8">
                            
                            <nav style="height: 35px;">
                                <div class="nav-wrapper">

                                <form>
                                    <div class="input-field" style="background-color: #fff;border: 0;box-shadow: none;color: #444;">
                                        <input id="search" type="search" list="browsers" name="browser" placeholder="Buscar productos..." required>
                                        <datalist id="browsers">
                                        </datalist>
                                        <i class="material-icons" style="top: -12px;color: #444;">search</i>
                                    </div>
                                </form>

                                </div>
                            </nav>
                        </div>
                    </div>
                    <br>
                    <form  id="productosSeleccionados" action="#" class="ng-pristine ng-valid">
                        <ul id="listaReservas">
                        </ul>
                        <ul id="listaProductos">
                            @foreach($productos as $producto)
                            <li style="width: 100%;">
                                <div class="row">
                                    <div class="col s7">
                                        <input type="checkbox" onclick="onclickchk(this)" id="product-{{$producto->id}}" precio="{{ $producto->precio }}">
                                        <label for="product-{{$producto->id}}" style="font-size: 1.4rem;line-height: 30px;">{{ $producto->nombre }} <small>(S/. {{ $producto->precio }})</small></label>
                                        <img src="{{asset($producto->foto)}}" width="35px" alt="">
                                    </div>
                                    <div class="col s2">
                                        <input type="number" onchange="changeCantidad(this)" class="form-control"  id="product-cantidad-{{$producto->id}}" value="1" id="" min="1" max="{{ $producto->stock }}">
                                    </div>
                                    <div class="col s2" id="product-precio-{{$producto->id}}" style="text-align:right;font-size: 1.5rem;font-weight:bold;">S/. {{ $producto->precio }}</div>
                                    <div class="col s1" style="text-align:right">
                                        <a style="cursor: pointer;" onclick="quitarProducto(this, {{$producto->id}})"><i class="material-icons">highlight_off</i></a>
                                    </div> 
                                </div>
                            </li>
                            @endforeach
                        </ul>
                       
                        <div class="row">
                            <div class="col s7"></div>
                            <div class="col s2"  style="text-align:center;">
                                <label style="font-size: 1.6rem;line-height: 30px">Total</label>
                            </div>
                            <div class="col s3" id="total-pagar" style="text-align:right;font-size: 2.4rem;font-weight:bold;">S/. 0.00</div>
                        </div>
                        <div class="row">
                            <div class="col s9">
                                <br><br><br>
                                <img src="{{ asset('images\card.png')}}" alt="">
                            </div>
                            <div class="col s3" style="text-align:right">
                                <br><br>
                                <a onclick="reservar()" class="waves-effect waves-light btn-large"><i class="material-icons left">monetization_on</i>Reservar</a>
                            </div>
                        </div>
                    </form>
                </div>
           
                <div class="inn-detail-p1 inn-com room-soc-share">
                    <div class="detail-title">
                        <h2>Comparte esta cancha</h2>
                        <p>a procedure intended to establish the quality, performance, or reliability of something, especially before it is taken into widespread use.</p>
                    </div>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a> </li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+</a> </li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</a>
                        </li>
                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whats App</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--TOP SECTION-->
@endsection

@section('css')
    <link href="{{ asset('css\jquery.datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="https://checkout.culqi.com/v2"></script>
    <script src="{{ asset('js\jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ asset('js\reserva.js') }}"></script>
    <script>
        //Declara variables
        var cancha = {!! json_encode($cancha->toArray()) !!};
        var listProductos = {!! json_encode($productos->toArray()) !!};
        
       
    </script>
    
@endsection