<?php 
	$consulta=mysqli_query($link, "SELECT * FROM tbl_incidencia ORDER BY id_incidencia");
	echo "Incidencias<br>";
	echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0){
			echo "<div class='fila encabezado'>";
				echo "<div class='columna'>Nombre</div>";
				echo "<div class='columna'>Descripcion</div>";
				echo "<div class='columna'>Tiempo aproximado</div>";
			echo "</div>";
			while($array = mysqli_fetch_array($consulta)){
				$nombre = $array['titulo_incidencia'];
				$tipo = $array['descripcion_incidencia'];
				$disponible=$array['tiempoEstimado_incidencia'];
				echo "<div class='fila'>";
					echo "<div class='columna'>$nombre</div>";
					echo "<div class='columna'>$tipo</div>";
					echo "<div class='columna'>$disponible</div>";
				echo "</div>";
				
			}
		}
	echo "</div>";
?>
<div id='mostrarDivAñadirList' class='divEmergente'>
	<div class='subDivEmergente'>
		<a href='#close' title='Close' class='close'>X</a>
		<h3 class='ventanaModal'>Añadir Incidencia</h3>
		<div class='formularios'>
			<form action='index.php?mostrar=incidencias' method='POST'>
				<label>Nombre:</label>
				<input type='text' name='nombreIncidencia' placeholder='Titulo de la incidencia'>
				<br><br><br>
				<label>Descripción:</label>
				<textarea rows='10' cols='70' name='descripcionIncidencia' placeholder='Descripción de la Incidencia'></textarea>
				<br><br><br>
				<label>Referencia reserva:</label>
				<input type='text' name='referenciaReserva' placeholder='Titulo de la incidencia'>
				<br style='clear: both;'>
				<input type='submit' value='Enviar'>
			</form>
		</div>
	</div>
</div>
<?php 
	if (isset($_REQUEST['nombreIncidencia'])) {
		$nombre=$_REQUEST['nombreIncidencia'];
		$descripcion=$_REQUEST['descripcionIncidencia'];
		
		$cogerFecha = getdate();
		$dia = $cogerFecha['mday'];
		$mes = $cogerFecha['mon'];
		$anyo = $cogerFecha['year'];
		$hora = $cogerFecha['hours'];
		$minuto = $cogerFecha['minutes'];
		$segundo = $cogerFecha['seconds'];
		$fecha = $anyo."-".$mes."-".$dia." ".$hora.":".$minuto.":".$segundo;
		echo "$fecha";


		$query="INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `tiempoEstimado_incidencia`, `fechaInicio_incidencia`, `fechaFinal_incidencia`, `id_reserva`) VALUES ('$nombre', '$descripcion', NULL, '$fecha', NULL, (SELECT `id_reserva` FROM `tbl_reserva` WHERE `id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')))";
			}
 ?>