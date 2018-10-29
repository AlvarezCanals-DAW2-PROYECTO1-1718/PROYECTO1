<article>
	<h1>Reservas</h1>
	<?php 
		$consulta=mysqli_query($link, "SELECT * FROM tbl_reserva ORDER BY id_reserva");
		echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0) {
				echo "<div class='fila encabezado'>";
					/*falta hacer el inner y ver el producto y el usuario*/
					echo "<div class='columna'>Fecha inicio</div>";
					echo "<div class='columna'>Fecha final</div>";
					echo "<div class='columna'>Tiempo aproximado</div>";
					echo "<div class='columna'>Finalizacion</div>";
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$fechaInicio=$array['fechaInicio_reserva'];
					$fechaFin = $array['fechaFinal_reserva'];
					$tiempoEstimado=$array['tiempoEstimado_reserva'];
					$finalizacion = $array['finalizacion_reserva'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$fechaInicio</div>";
						echo "<div class='columna'>$fechaFin</div>";
						echo "<div class='columna'>$tiempoEstimado</div>";
						echo "<div class='columna'>$finalizacion</div>";
					echo "</div>";
				}
			}
		echo "</div>";

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

			$recurso = $_REQUEST['recursoIncidencia'];

			$query="INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `fechaInicio_incidencia`, `id_reserva`) VALUES ('$nombre', '$descripcion', '$fecha', (SELECT `id_reserva` FROM `tbl_reserva` WHERE `id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')))";
		}
	?>
	
	<div id='mostrarFinalizarReserva' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Finalizar Reserva</h3>
			<div class='formularios'>
				<form action='index.php?mostrar=incidencias' method='POST'>
					
				</form>
			</div>
		</div>
	</div>
	<!-- <a href="index.php"><input class="añadir-lista" type="button" value="Recursos"></a> -->
</article>