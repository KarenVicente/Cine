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
		height: 300px;
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
				<div class="col m2">
					<div class="collection with-header">
						<div class="collection-header"><h4>Categorias</h4></div>
					    <a href="#!" class="collection-item active" id="es">Estrenos</a>
					    <a href="#!" class="collection-item" id="in">Infantiles</a>
					    <a href="#!" class="collection-item" id="te">Terror</a>
					    <a href="#!" class="collection-item" id="ro">Romanticas</a>
					    <a href="#!" class="collection-item" id="fa">Familiares</a>
					    <a href="#!" class="collection-item" id="co">Comedia</a>
					  </div>
				</div>
				<div class="col m10">
					<h5 class="center">Bienvenido a tu Cine Virtual</h5>
					<div class="row" id="estrenos">
				<div id="estrenos">
					<h3>Estrenos</h3>
					<?php 
						$consulta="SELECT Cod_Pelicula, Nombre, Precio, Cod_Sala, Cod_Categoria, Imagen FROM peliculas WHERE 1 ORDER BY Cod_Pelicula desc 
							LIMIT 8";
					
						$ejecutar=$base->ejecutar($consulta);
						while ($fila=$base->obtener_array($ejecutar)) {
							echo '<div class="col m3 s6 peli">
									<div class="card">
									    <div class="card-image waves-effect waves-block waves-light">
									      <img class="img img-raised" src="Imagenes/'.$fila["Imagen"].'" />
									    </div>
									    <div class="card-content">
									      <span class="card-title activator grey-text text-darken-4">'.$fila["Nombre"].'<i class="material-icons right">more_vert</i></span>
									      <p>
									      <a href="boletos.php?pelicula='.$fila['Cod_Pelicula'].'"class="compra">Boletos <button class="btn-floating right btn-small"><i class="tiny material-icons">add_shopping_cart</i></button></a>

									      </p>
									    </div>
									    <div class="card-reveal">
									      <span class="card-title grey-text text-darken-4">'.$fila["Nombre"].'<i class="material-icons right">close</i></span>
									      <p>
									      
									      	<b>Precio</b>Q  '.number_format($fila['Precio'],2,".",",").' <br>
									      </p>
									    </div>
									  </div>
								</div>';
						}
					
					 ?>
				</div>
			</div>

			<div class="row" id="infantiles">
				<h3>Infantiles</h3>
				<?php 
					$consulta="SELECT peliculas.Nombre as nombre, peliculas.Cod_Pelicula as codigo, categorias.Nombre as categoria,  peliculas.Precio as precio, peliculas.Imagen as imagen
						FROM peliculas,categorias
						WHERE categorias.Cod_Categoria=peliculas.Cod_Categoria
						AND categorias.Cod_Categoria=1";

					$ejecutar=$base->ejecutar($consulta);
						while ($fila=$base->obtener_array($ejecutar)) {
							echo '<div class="col m3 s6 peli">
									<div class="card">
									    <div class="card-image waves-effect waves-block waves-light">
									      <img class="img img-raised" src="Imagenes/'.$fila["imagen"].'" />
									    </div>
									    <div class="card-content">
									      <span class="card-title activator grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">more_vert</i></span>
									      <p>
									      <a href="boletos.php?pelicula='.$fila['codigo'].'"class="compra">Boletos <button class="btn-floating right btn-small"><i class="tiny material-icons">add_shopping_cart</i></button></a>

									      </p>
									    </div>
									    <div class="card-reveal">
									      <span class="card-title grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">close</i></span>
									      <p>
									      
									      	<b>Precio</b>Q  '.number_format($fila['precio'],2,".",",").' <br>
									      </p>
									    </div>
									  </div>
								</div>';
					}


				 ?>
			</div>

			<div class="row" id="terror">
				<h3>Terror</h3>
				<?php 
					$consulta="SELECT peliculas.Nombre as nombre, peliculas.Cod_Pelicula as codigo, categorias.Nombre as categoria,  peliculas.Precio as precio, peliculas.Imagen as imagen
						FROM peliculas,categorias
						WHERE categorias.Cod_Categoria=peliculas.Cod_Categoria
						AND categorias.Cod_Categoria=2";

					$ejecutar=$base->ejecutar($consulta);
						while ($fila=$base->obtener_array($ejecutar)) {
							echo '<div class="col m3 s6 peli">
									<div class="card">
									    <div class="card-image waves-effect waves-block waves-light">
									      <img class="img img-raised" src="Imagenes/'.$fila["imagen"].'" />
									    </div>
									    <div class="card-content">
									      <span class="card-title activator grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">more_vert</i></span>
									      <p>
									      <a href="boletos.php?pelicula='.$fila['codigo'].'"class="compra">Boletos <button class="btn-floating right btn-small"><i class="tiny material-icons">add_shopping_cart</i></button></a>

									      </p>
									    </div>
									    <div class="card-reveal">
									      <span class="card-title grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">close</i></span>
									      <p>
									      
									      	<b>Precio</b>Q  '.number_format($fila['precio'],2,".",",").' <br>
									      </p>
									    </div>
									  </div>
								</div>';
					}


				 ?>
			</div>

			<div class="row" id="romanticas">
				<h3>Romanticas</h3>
				<?php 
					$consulta="SELECT peliculas.Nombre as nombre, peliculas.Cod_Pelicula as codigo, categorias.Nombre as categoria,  peliculas.Precio as precio, peliculas.Imagen as imagen
						FROM peliculas,categorias
						WHERE categorias.Cod_Categoria=peliculas.Cod_Categoria
						AND categorias.Cod_Categoria=3";

					$ejecutar=$base->ejecutar($consulta);
						while ($fila=$base->obtener_array($ejecutar)) {
							echo '<div class="col m3 s6 peli">
									<div class="card">
									    <div class="card-image waves-effect waves-block waves-light">
									      <img class="img img-raised" src="Imagenes/'.$fila["imagen"].'" />
									    </div>
									    <div class="card-content">
									      <span class="card-title activator grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">more_vert</i></span>
									      <p>
									      <a href="boletos.php?pelicula='.$fila['codigo'].'"class="compra">Boletos <button class="btn-floating right btn-small"><i class="tiny material-icons">add_shopping_cart</i></button></a>

									      </p>
									    </div>
									    <div class="card-reveal">
									      <span class="card-title grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">close</i></span>
									      <p>
									      
									      	<b>Precio</b>Q  '.number_format($fila['precio'],2,".",",").' <br>
									      </p>
									    </div>
									  </div>
								</div>';
					}


				 ?>
			</div>

			<div class="row" id="familiares">
				<h3>Familiares</h3>
				<?php 
					$consulta="SELECT peliculas.Nombre as nombre, peliculas.Cod_Pelicula as codigo, categorias.Nombre as categoria,  peliculas.Precio as precio, peliculas.Imagen as imagen
						FROM peliculas,categorias
						WHERE categorias.Cod_Categoria=peliculas.Cod_Categoria
						AND categorias.Cod_Categoria=4";

					$ejecutar=$base->ejecutar($consulta);
						while ($fila=$base->obtener_array($ejecutar)) {
							echo '<div class="col m3 s6 peli">
									<div class="card">
									    <div class="card-image waves-effect waves-block waves-light">
									      <img class="img img-raised" src="Imagenes/'.$fila["imagen"].'" />
									    </div>
									    <div class="card-content">
									      <span class="card-title activator grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">more_vert</i></span>
									      <p>
									      <a href="boletos.php?pelicula='.$fila['codigo'].'"class="compra">Boletos <button class="btn-floating right btn-small"><i class="tiny material-icons">add_shopping_cart</i></button></a>

									      </p>
									    </div>
									    <div class="card-reveal">
									      <span class="card-title grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">close</i></span>
									      <p>
									      
									      	<b>Precio</b>Q  '.number_format($fila['precio'],2,".",",").' <br>
									      </p>
									    </div>
									  </div>
								</div>';
					}


				 ?>
			</div>

			<div class="row" id="comedia">
				<h3>Comedia</h3>
				<?php 
					$consulta="SELECT peliculas.Nombre as nombre, peliculas.Cod_Pelicula as codigo, categorias.Nombre as categoria,  peliculas.Precio as precio, peliculas.Imagen as imagen
						FROM peliculas,categorias
						WHERE categorias.Cod_Categoria=peliculas.Cod_Categoria
						AND categorias.Cod_Categoria=5";

					$ejecutar=$base->ejecutar($consulta);
						while ($fila=$base->obtener_array($ejecutar)) {
							echo '<div class="col m3 s6 peli">
									<div class="card">
									    <div class="card-image waves-effect waves-block waves-light">
									      <img class="img img-raised" src="Imagenes/'.$fila["imagen"].'" />
									    </div>
									    <div class="card-content">
									      <span class="card-title activator grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">more_vert</i></span>
									      <p>
									      <a href="boletos.php?pelicula='.$fila['codigo'].'"class="compra">Boletos <button class="btn-floating right btn-small"><i class="tiny material-icons">add_shopping_cart</i></button></a>

									      </p>
									    </div>
									    <div class="card-reveal">
									      <span class="card-title grey-text text-darken-4">'.$fila["nombre"].'<i class="material-icons right">close</i></span>
									      <p>
									      
									      	<b>Precio</b>Q  '.number_format($fila['precio'],2,".",",").' <br>
									      </p>
									    </div>
									  </div>
								</div>';
					}

				 ?>
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