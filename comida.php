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
	<title>Pedir Comida | Cine Virtual</title>
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.css">
</head>
<style>
	.peli img{
		width: 100%;
		height: auto;
	}
	body{
		font-family: Raleway;
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
	select{
		display:block;
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
		<div class="row">
			<div class="col m12">
				<div class="row">
					<div class="col m3">
						<div class="collection with-header">
							<h5 class="collection-header">Menú De Comidas</h5>
							<?php 
								$consulta="SELECT comidas.Cod_Comidas as Cod_Comidas, comidas.Nombre as Nombre, comidas.Imagen as Imagen, tamanos.Cod_Tamano as codta FROM comidas, tamanos, uniones_comidas WHERE uniones_comidas.Cod_Comidas=comidas.Cod_Comidas AND uniones_comidas.Cod_Tamano=tamanos.Cod_Tamano GROUP BY comidas.Cod_Comidas ";
								$ejecutar=$base->ejecutar($consulta);
									
								while ($fila=$base->obtener_array($ejecutar)) {
									echo '<a id="enlace'.$fila["Cod_Comidas"].'" onclick="comida('.$fila["Cod_Comidas"].','.$fila["codta"].')" href="#" class="collection-item"><i class="tiny material-icons">label</i> '.$fila['Nombre'].'</a>'	;							}


							 ?>
						 </div>
					</div>
					<div class="col m9" id="comida">
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
	  
	<script src="js/jquery-3.3.1.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script>

		  $(document).ready(function(){
		    $('.sidenav').sidenav();
		  });	


		  //$('#comida').hide();

		 function comida(codigo,tamano) {
		 	$('#comida').show();
		 	var controlador = "procesos/obtener_comida.php";
		 	$.ajax({
		 		url:controlador,
		 		type:'POST',
		 		data:{codigo:codigo, tamano:tamano},
		 		success:function (retorno) {
		 			console.log(retorno);
		 			$('#comida').html(retorno);
		 		}


		 	});
		 }
	</script>
</body>
</html>