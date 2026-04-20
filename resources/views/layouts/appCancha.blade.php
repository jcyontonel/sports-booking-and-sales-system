<!DOCTYPE html>
<html lang="es">

<head>
	<title>@yield('title') | El Bache</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="{{ asset('images\fav.ico')}}" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="{{ asset('css\font-awesome.min.css') }}">
	<!-- ALL CSS FILES -->
	<link href="{{ asset('css\materialize.css') }}" rel="stylesheet">
	<link href="{{ asset('css\style.css') }}" rel="stylesheet">
	<link href="{{ asset('css\bootstrap.css') }}" rel="stylesheet" type="text/css">
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="{{ asset('css\responsive.css') }}" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	@yield('css')
	<style>
		#drop-page{
			width: 18% !important;
			left: 80% !important;
			top: 80px;
		}
	</style>
    
</head>

<body data-ng-app="" url="{{ url('/') }}">
	
	<!--MOBILE MENU-->
	<section>
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="main.html"><img src="{{ asset('images\logo.png') }}" alt="">
					</a>
				</div>
				<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
				</div>
				<div class="mm-menu">
				</div>
			</div>
		</div>
	</section>
	<!--HEADER SECTION-->
	<section>
		<!--TOP SECTION-->
		<div class="menu-section">
			<div class="container">
				<div class="row">
					<div class="top-bar">
						<ul>
                            @if(Auth::check())
                                <li>
                                    <a class='dropdown-button' href='#' data-activates='dropdown1'>
                                        <i class="material-icons">account_circle</i>
                                         {{ Auth::user()->nombre}}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </li>
                            @else
                                <li><a href="#!" data-toggle="modal" data-target="#modal1">Ingresar</a></li>
                                <li>
                                    <a href="#!" data-toggle="modal" data-target="#modal2">Registrarme</a>
                                </li>
                            @endif
                            
							<li><a href="about-us.html">¿Quienes somos?</a>
							</li>
							<li><a href="contact-us.html">Contactanos</a>
							</li>
						</ul>
					</div>
					@if(Auth::check())
						<div class="all-drop-down">
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content drop-con-man'>
								<!--<li>
									<a href="dashboard.html"><img src="images\icon\15.png" alt=""> My Account</a>
								</li>
								<li>
									<a href="db-profile.html"><img src="images\icon\2.png" alt=""> My Profile</a>
								</li>-->
								<li>
									<a href="{{ url('/perfil/reservas') }}"><img src="{{asset('images\icon\16.png') }}" alt=""> Mis Reservas</a>
								</li>
								<li>
									<a href="{{ url('/perfil/compras') }}"><img src="{{asset('images\icon\17.png') }}" alt=""> Mis Compras</a>
								</li>
								<li>
									<a href="{{ url('/perfil/eventos') }}"><img src="{{asset('images\icon\14.png') }}" alt=""> Mis Eventos</a>
								</li>
								@if(Auth::user()->hasRole("empleado"))
									<li>
										<a href="{{ url('/perfil/nueva/venta') }}"><img src="{{asset('images\icon\3.png') }}" alt=""> Nueva Venta</a>
									</li>
									<li>
										<a href="{{ url('/perfil/nueva/reserva') }}"><img src="{{asset('images\icon\4.png') }}" alt=""> Nueva Reserva</a>
									</li>
									<li>
										<a href="{{ url('/perfil/juego') }}"><img src="{{asset('images\icon\1.png') }}" alt=""> Juego</a>
									</li>
								@endif
								<li>
									<a href="#"
										onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										<img src="{{ asset('images\icon\13.png')}}" alt="">
										Salir
									</a>
								</li>
							</ul>
						</div>
					@endif
				</div>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				<div class="row">
					<div class="logo">
						<a href="{{ url('/') }}"><img src="{{ asset('images\logo.png') }}" alt="">
						</a>
					</div>
					<div class="menu-bar">
						<ul>
							<li><a href="{{url('/')}}">Inicio</a>
							</li>
							<li><a href="{{url('/canchas')}}">Canchas</a>
							</li>
							<li><a href="{{ url('productos') }}">Productos</a>
							</li>
							<li><a href="{{ url('eventos') }}">Eventos</a>
							</li>
							<li>
								<a href="{{ url('carrito') }}" style="color: #fff;padding: 3px 10px; margin: 0px 10px;" class="dropdown-button badge red" data-activates="drop-room">
									<i class="small material-icons">local_grocery_store</i>
									<span style="color: #fff;" id="countCarrito"> () </span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <!--TOP SECTION-->
        
        @yield('content')
        <!--
            <div class="">
                <div>
                    
                    <div class="hom-footer-section">
                        <div class="container">
                            <div class="row">
                                <div class="foot-com foot-1">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="foot-com foot-2">
                                    <h5>Teléfono: (01) 235 1548</h5> </div>
                                <div class="foot-com foot-3">
                                    
                                <div class="foot-com foot-4">
                                    <a href="#"><img src="{{ asset('images\card.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        -->			
	</section>
	<!--END HEADER SECTION-->
	<footer class="site-footer clearfix">
		<div class="sidebar-container">
			<div class="sidebar-inner">
				<div class="widget-area clearfix">
					<div class="widget widget_azh_widget">
						<div>
							<div class="container">
								<div class="row">
									<div class="col-sm-12 col-md-3 foot-logo"> <img src="{{ asset('images\logo1.png')}}" alt="logo">
										<p class="hasimg">Ls mejores canchas sintéticas para disfrutar de una pichanga con los amigos</p>
										<p class="hasimg">Has tu reserva ahora.</p>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Support &amp; Help</h4>
										<ul class="two-columns">
											<li><a href="dashboard.html">Dashboard</a>
											</li>
											<li><a href="db-activity.html">DB Activity</a>
											</li>
											<li><a href="booking.html">Booking</a>
											</li>
											<li><a href="contact-us.html">Contact Us</a>
											</li>
											<li><a href="about-us.html">About Us</a>
											</li>
											<li><a href="aminities.html">Aminities</a>
											</li>
											<li><a href="blog.html">Blog</a>
											</li>
											<li><a href="menu1.html">Food Menu</a>
											</li>
										</ul>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Ciudades cubiertas</h4>
										<ul class="two-columns">
											<li><a href="#!">Barranca</a>
											</li
										</ul>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Dirección</h4>
										<p>Calle Enrique Palacios N°238</p>
										<p> <span class="foot-phone">Teléfono: </span> <span class="foot-phone">235 1548</span> </p>
									</div>
								</div>
							</div>
						</div>
						<div class="foot-sec2">
							<div class="container">
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<h4>Opciones de Pago</h4>
										<p class="hasimg"> <img src="{{ asset('images\payment.png')}}" alt="payment"> </p>
									</div>
									<div class="col-sm-12 col-md-4">
										<h4>Suscríbete</h4>
										<form>
											<ul class="foot-subsc">
												<li>
													<input type="text" placeholder="Ingresa tu correo"> </li>
												<li>
													<input type="submit" value="Enviar"> </li>
											</ul>
										</form>
									</div>
									<div class="col-sm-12 col-md-5 foot-social">
										<h4>Siguenos</h4>
										<p>Puedes encontrarnos en diferentes redes sociales</p>
										<ul>
											<li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .widget-area -->
			</div>
			<!-- .sidebar-inner -->
		</div>
		<!-- #quaternary -->
	</footer>
	<section class="copy" style="margin-bottom: 0px;">
		<div class="container">
			<p>copyrights © 2018 El Bache &nbsp;&nbsp;All rights reserved. </p>
		</div>
    </section>
	<section>
		<!-- LOGIN SECTION -->
		<div id="modal1" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Bienvenido</h1>
					<p>¿No tienes una cuenta? Crea tu cuenta. Toma menos de unos minutos</p>
					<h4>Inicia sesión con una red social</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="{{asset('images\cancel.png')}}" alt="">
					</a>
					<h4>Inicio de Sesión</h4>
					<p>¿No tienes una cuenta? Crea tu cuenta. Toma menos de unos minutos</p>
					<form class="s12" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
						<div>
							<div class="input-field s12">
								<input  id="email" type="email" type="text" name="email" value="{{ old('email') }}" data-ng-model="name" class="validate" required autofocus>
								<label>Correo electrónico</label>
							</div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
						<div>
							<div class="input-field s12">
                                <input type="password" id="password" class="validate" name="password" required>
								<label>Contraseña</label>
							</div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
						<div>
							<div class="s12 log-ch-bx">
								<p>
									<input type="checkbox" id="test5"  name="remember" {{ old('remember') ? 'checked' : '' }}>
									<label for="test5">Recordar sesión</label>
								</p>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Ingresar" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">¿Olvidaste tu contraseña?</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Registrate</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- REGISTER SECTION -->
		<div id="modal2" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left" style="padding: 21% 5%;">
					<h1>Bienvenido</h1>
					<p>¿No tienes una cuenta? Crea tu cuenta. Toma menos de unos minutos</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="{{asset('images\cancel.png')}}" alt="">
					</a>
					<h4>Registrate</h4>
					<p>¿No tienes una cuenta? Crea tu cuenta. Toma menos de unos minutos</p>
					<form class="s12" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name1" class="validate"  name="nombre" value="{{ old('nombre') }}" required>
								<label>Nombre</label>
							</div>
                        </div>
                        <div>
							<div class="input-field s12">
								<input type="text" data-ng-model="lastname" class="validate" name="apellidos" value="{{ old('apellidos') }}" required>
								<label>Apellidos</label>
							</div>
                        </div>
                        <div>
							<div class="input-field s12">
								<input type="text" data-ng-model="dni" class="validate" name="dni" value="{{ old('dni') }}" required>
								<label>DNI</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
                                <input type="email" class="validate" id="email" name="email" value="{{ old('email') }}" required>
								<label>Correo electrónico</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
                                <input type="password" class="validate" id="password" name="password" required>
								<label>Contraseña</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
                                <input type="password" class="validate" id="password-confirm" name="password_confirmation" required>
								<label>Confirmación de contraseña</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Registrarse" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">¿Ya estás registrado? Ingresa</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORGOT SECTION -->
		<div id="modal3" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Bienvenido</h1>
					<p>¿No tienes una cuenta? Crea tu cuenta. Toma menos de unos minutos</p>
					<h4>Registrate con un red social</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="{{ asset('images\cancel.png') }}" alt="">
					</a>
					<h4>¿Olvidaste la contraseña?</h4>
					<p>¿No tienes una cuenta? Crea tu cuenta. Toma menos de unos minutos</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name3" class="validate">
								<label>Correo electrónico</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Enviar" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">¿Ya estas registrado? Inicia Sesión</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Registrate</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--ALL SCRIPT FILES-->
	<script src="{{ asset('js\jquery.min.js') }}"></script>
	<script src="{{ asset('js\jquery-ui.js') }}"></script>
	<script src="{{ asset('js\angular.min.js') }}"></script>
	<script src="{{ asset('js\bootstrap.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js\materialize.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js\jquery.mixitup.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js\custom.js') }}"></script>
	<script>
		$user = {!! json_encode(Auth::user()) !!}
	</script>
    @yield('js')
</body>

</html>