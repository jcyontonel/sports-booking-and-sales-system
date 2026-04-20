@extends('../layouts.appCancha')

@section('content')
<!--TOP SECTION-->
<div class="inn-banner">
    <div class="container">
        <div class="row">
            <h4>Contáctanos</h4>
            <p>Contáctate con nosotros para cualquier consulta</p>
            <p> </p>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a>
                </li>
                <li><a href="{{ url('/contactanos') }}">Contáctanos</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="inn-body-section">
    <div class="container">
        <div class="row">
            <div class="page-head">
                <h2>Contáctanos</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <p>Puedes contactarte con nosotros a través de los siguientes medios</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 new-con">
                <img style="width: 150px" src="{{ asset('images/logo1.png') }}" alt="">
                <br><br>
                <p>Las mejores canchas en un solo lugar</p>
                <p>Los mejores servicios a nivel provincial, atención A1 y la mejor música</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="images\icon\20.png" alt="">
                <h4>Dirección</h4>
                <p>Calle Enrique Palacios N°236 - Barranca
                    <br>Referencia : Frente al colegio Científico Stephen Hawking</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="images\icon\22.png" alt="">
                <h4>Contacto:</h4>
                <p> <a href="tel://0099999999" class="contact-icon">Teléfono: 01 234874 965478</a>
                    <br> <a href="tel://0099999999" class="contact-icon">Celular: 01 654874 965478</a>
                    <br> <a href="mailto:info@elbache.com" class="contact-icon">Email: info@elbache.com</a> </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="images\icon\21.png" alt="">
                <h4>Web</h4>
                <p> <a href="{{ url('/') }}">Website: www.elbache.com</a>
                    <br> <a href="#">Facebook: www.facebook/elbache</a>
                    <br> <a href="#">Blog: www.blog.elbache.com</a> </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.9326657156441!2d-77.76002232810004!3d-10.755228895076879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910737ec4939c2c7%3A0x28ed33ea781ff504!2sCampo+Deportivo+El+Bache!5e0!3m2!1ses!2spe!4v1524976128058" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
@endsection

@section('css')
  
@endsection

@section('js')
  
@endsection