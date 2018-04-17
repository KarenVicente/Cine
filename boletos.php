<?php 
	require_once "Librerias/class.conexion.php";
	$base= new base();
	$base->conectar();


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Cine Virtual | Seleccionar película</title>
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<style>
	.peli img{
		width: 100%;
		height: auto;
	}
	body{
		font-family: Raleway;
	}
	.c1{
		background: red;
		text-align: center;
		height: 50px;
	}
	#c1{
		padding-top: 10px;
	}
	.c2{
		background: yellow;
		text-align: center;
		height: 50px;
	}
	#c2{
		padding-top: 10px;
	}
	.c3{
		background: blue;
		text-align: center;
		height: 50px;
	}
	#c3{
		padding-top: 10px;
	}
	.c4{
		background: pink;
		text-align: center;
		height: 50px;
	}
	#c4{
		padding-top: 10px;
	}
	.logo img{
		margin-top: -18px;
		height: 50px;
		padding-left: 10px;

	}
	[type="radio"]:not(:checked), [type="radio"]:checked{
		opacity: 1;
		position: relative;
		pointer-events:auto;
	}
	
</style>
<body>
	  <nav class="menu nav-extended">
	    <div class="nav-wrapper   light-blue darken-4">
	      <a href="#!" class="brand-logo logo"><h4 class="nombre"><img src="Imagenes/lo.png" alt=""></h4></a>
	      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="index.html">Galeria</a></li>
	        <li><a href="badges.html">Trabajos</a></li>
	        <li><a href="collapsible.html">Herramientas</a></li>
	        <li><a href="mobile.html">Inicio</a></li>
	        <ul id="dropdown1" class="dropdown-content">
			  <li><a href="#!">one</a></li>
			  <li><a href="#!">two</a></li>
			  <li class="divider"></li>
			  <li><a href="#!">three</a></li>
			</ul>
	      </ul>
	    </div>
	  </nav>
	  <ul class="sidenav" id="mobile-demo">
	    <li><a href="index.html">Galeria</a></li>
        <li><a href="badges.html">Trabajos</a></li>
        <li><a href="collapsible.html">Herramientas</a></li>
        <li><a href="mobile.html">Inicio</a></li>
	  </ul>
	  

	<section>
		<div class="">
			<div class="row">
				<div class="col m12">
					<?php 
							$codigo=$_GET['pelicula'];

							$consulta="SELECT DISTINCT peliculas.Imagen as imagen, peliculas.Precio as precio, peliculas.Nombre as pelicula, peliculas.Cod_Pelicula as codigop, categorias.Nombre as categoria, horarios.Hora_Inicio as inicio, horarios.Fecha as fecha,  horarios.Hora_Fin as fin, salas.Nombre as sala, peliculas.Descripcion as descripcion, salas.Capacidad as capacidad
								FROM peliculas, salas, union_horarios, horarios, categorias
								WHERE peliculas.Cod_Sala= salas.Cod_Salas
								AND peliculas.Cod_Pelicula=union_horarios.Cod_Pelicula
								AND horarios.Cod_Horario=union_horarios.Cod_Horario
								AND peliculas.Cod_Categoria=categorias.Cod_Categoria
								AND peliculas.Cod_Pelicula=".$codigo;


							$ejecutar=$base->ejecutar($consulta);
							$fila=$base->obtener_array($ejecutar);

							$date = date_create($fila['fecha']);
							echo date_format($date, 'Y-m-d H:i:s');

							echo '<div class="row">						
									<div class="col m3 s12 peli">
										<h5 class="center">'.$fila['pelicula'].'</h5>
										<img class="img img-raised" src="Imagenes/'.$fila['imagen'].'" />
									</div>
									<div class="col m9 s12">
										<h4>Datos Generales</h4>
										<span>Descripción:</span>
										<p class="card-panel blue-grey lighten-4">"'.$fila['descripcion'].'"</p>
										<div class="row">
											<div class="col m6">
												<span>Precios:</span>
												'.number_format($fila['precio'],"2",".",",").'
												<form id="boletos">
													<div class="row">
														<div class="input-field col m4">
															<input id="cantidad" type="number" min="1" max="7" class="validate">
					          								<label for="cantidad">Cantidad</label>
														</div>
													</div>
												</form>
												<span>Precio a Pagar</span> Q 170.00
											</div>
											<div class="col m6">
												<span>Horarios Disponibles:</span><br>
												<ul>
													<li><input type="radio" name="horario" id="horario"> '. date_format($date, 'Y-m-d H:i:s').' | '.( date("g:i a", $fila['fin']) ).'</li>
													<li><input type="radio" name="horario" id="horario">  2:50 pm | 5:40 pm</li>
													<li><input type="radio" name="horario" id="horario"> 10:00 am | 11:40 am</li>
												</ul>
											</div>
										</div>
									</div>
								</div';

							 ?>
					<div class="row">
						<div class="col m12">
							<a href="comida.php" class="btn right">Siguiente<i class="material-icons tiny">forward</i></a>  
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
				
	
	
	<script src="js/jquery-3.3.1.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/principal.js"></script>
	<script>

		  $(document).ready(function(){
		    $('.sidenav').sidenav();
		  });

		  $(".dropdown-trigger").dropdown();	
	</script>
</body>
</html>