@extends('layouts.appCancha')

@section('content')
<!--Check Availability SECTION-->
<div class="inn-body-section inn-booking">
    <div class="container">
        <div class="row">
            <div class="home-bod">
                <div class="home-bod-1">
                    <h4>Es hora de una pichanga</h4>
                    <h2>Reserva tu cancha</h2>
                    <p>Reserva tu cancha a la hora que quieras y de donde quiera que te encuentres.</p>
                </div>
                <a class="waves-effect waves-light btn-large"><i class="material-icons right">add_circle_outline</i>Reservar</a>

            </div>
        </div>
    </div>
</div>
<!--End Check Availability SECTION-->
<!--HOTEL ROOMS SECTION-->
<div class="hom1 hom-com pad-bot-40">
    <div class="container">
        <div class="row">
            <div class="hom1-title">
                <h2>Nuestras Canchas</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <p>Las mejores canchas de Barranca en un solo lugar.</p>
            </div>
        </div>
        <div class="row">
            <div class="to-ho-hotel">
                @foreach($canchas as $cancha)
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Hoy Disponible </div> 
                                <img src="{{ asset($cancha->img_lista)}}" alt=""> 
                            </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>{{ $cancha->nombre }}</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>Medidas: {{ $cancha->ancho }}m x {{ $cancha->largo }}m
                                            <div class="dir-rat-star ho-hot-rat-star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis" style="text-decoration:none;">hora</span><span class="ho-hot-pri">S/. {{ $cancha->costo }}</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--END HOTEL ROOMS-->
<!--TOP SECTION-->
<div class="offer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Standardized Budget Rooms</span> <span class="ol-3"></span> <span class="ol-5">$99/-</span>
                    <ul>
                        <li>
                            <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images\icon\dis1.png" alt="">
                            </a><span>Free WiFi</span>
                        </li>
                        <li>
                            <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images\icon\h2.png" alt=""> </a><span>Breakfast</span>
                        </li>
                        <li>
                            <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images\icon\dis3.png" alt=""> </a><span>Pool</span>
                        </li>
                        <li>
                            <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images\icon\dis4.png" alt=""> </a><span>Television</span>
                        </li>
                        <li>
                            <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images\icon\dis5.png" alt=""> </a><span>GYM</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-r">
                    <div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
                    <div class="or-2"> <span class="or-21">Get</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog hom-com pad-bot-0">
    <div class="container">
        <div class="row">
            <div class="hom1-title">
                <h2>Banquet Spaces</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
            </div>
        </div>
        <div class="row">
            <div>
                <div class="col-md-3 n2-event">
                    <!--event IMAGE-->
                    <div class="n21-event hovereffect"> <img src="images\event\1.jpg" alt="">
                        <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                    </div>
                    <!--event DETAILS-->
                    <div class="n22-event"> <a href="#!"><h4>Wedding Halls</h4></a> <span class="event-date">Capacity: 500,</span> <span class="event-by"> Price: $900</span>
                        <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                        <!--event SHARE-->
                        <div class="event-share">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 n2-event">
                    <!--event IMAGE-->
                    <div class="n21-event hovereffect"> <img src="images\event\2.jpg" alt="">
                        <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                    </div>
                    <!--event DETAILS-->
                    <div class="n22-event"> <a href="#!"><h4>Business Meetings</h4></a> <span class="event-date">Capacity: 500,</span> <span class="event-by"> Price: $700</span>
                        <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                        <!--event SHARE-->
                        <div class="event-share">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 n2-event">
                    <!--event IMAGE-->
                    <div class="n21-event hovereffect"> <img src="images\event\3.jpg" alt="">
                        <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                    </div>
                    <!--event DETAILS-->
                    <div class="n22-event"> <a href="#!"><h4>Social Event</h4></a> <span class="event-date">Capacity: 420,</span> <span class="event-by"> Price: $750</span>
                        <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                        <!--event SHARE-->
                        <div class="event-share">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 n2-event">
                    <!--event IMAGE-->
                    <div class="n21-event hovereffect"> <img src="images\event\4.jpg" alt="">
                        <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                    </div>
                    <!--event DETAILS-->
                    <div class="n22-event"> <a href="#!"><h4>Birthdays and Debut</h4></a> <span class="event-date">Capacity: 240,</span> <span class="event-by"> Price: $500</span>
                        <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                        <!--event SHARE-->
                        <div class="event-share">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog hom-com">
    <div class="container">
        <div class="row">
            <div class="hom1-title">
                <h2>News & Event</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="bot-gal h-gal">
                    <h4>Photo Gallery</h4>
                    <ul>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\8.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\9.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\10.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\11.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\1.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\2.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\3.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\4.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\5.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\6.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\7.jpg" alt="">
                        </li>
                        <li><img class="materialboxed" data-caption="Hotel Captions" src="images\ami\8.jpg" alt="">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bot-gal h-vid">
                    <h4>Video Gallery</h4>
                    <iframe src="https://www.youtube.com/embed/mG4G8crGQ34?autoplay=0&showinfo=0&controls=0" allowfullscreen=""></iframe>
                    <h5>Maecenas sollicitudin lacinia</h5>
                    <p>Maecenas finibus neque a tellus auctor mattis. Aliquam tempor varius ornare. Maecenas dignissim leo leo, nec posuere purus finibus vitae.</p>
                    <p>Quisque vitae neque at tellus malesuada convallis. Phasellus in lectus vitae ex euismod interdum non a lorem. Nulla bibendum. Curabitur mi odio, tempus quis risus cursus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bot-gal h-blog">
                    <h4>News & Event</h4>
                    <ul>
                        <li>
                            <a href="#!"> <img src="images\users\2.png" alt="">
                                <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="images\users\3.png" alt="">
                                <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="images\users\4.png" alt="">
                                <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="images\users\5.png" alt="">
                                <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection