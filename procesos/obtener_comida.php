<?php 
	require_once "../Librerias/class.conexion.php";

	$base= new base();
	$base->conectar();

	$codigo=$_POST['codigo'];
	$tamano=$_POST['tamano'];


	$consulta="SELECT uniones_comidas.Precio as precio, tamanos.Nombre as tamano, tamanos.Cod_Tamano as codta, comidas.Cod_Comidas as codco, comidas.Nombre as nombre, comidas.Imagen as imagen
				FROM uniones_comidas, comidas, tamanos
				WHERE uniones_comidas.Cod_Comidas=comidas.Cod_Comidas
				AND tamanos.Cod_Tamano=uniones_comidas.Cod_Tamano
				AND comidas.Cod_Comidas=".$codigo."
				AND tamanos.Cod_Tamano=".$tamano."
				GROUP BY comidas.Cod_Comidas" ;
	//echo $consulta;
	$ejecutar=$base->ejecutar($consulta);
	echo "<div class='row'>";
	while ($fila=$base->obtener_array($ejecutar)) {
		echo '<div class="col m3 s12 peli">
				<h5 class="center">'.$fila['nombre'].'</h5>
				<img class="img img-raised" src="Imagenes/'.$fila['imagen'].'" />
			</div>
			<div class="col m3">
				<span>Precio: </span> '.number_format($fila['precio'],"2",".",",").'
				<input type="number" class="validate" name="cantidad" id="cantidad" placeholder="Quiero ..." min="1">
				<span>Total a Pagar: </span>
			</div>
			<div class="col m3">
				<span>Tamaño: </span>
				<select name="tamano" id="tamano">
					<option disabled="disabled">Seleccione un Tamaño</option>
					<option value="1">Pequeño</option>
					<option value="2">Media</option>
					<option value="3">Grande</option>
				</select>
			</div>';
	}
	echo "</div";






 ?>