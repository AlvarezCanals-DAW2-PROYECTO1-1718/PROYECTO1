<article>
	<?php 
		if (isset($_REQUEST['tiempoEstimado_reserva'])) {
			$id_rec=$_REQUEST['idRecurso'];
			$tiempo=$_REQUEST['tiempoEstimado_reserva'];
			$descripcion=$_REQUEST['descripcionReserva'];
			$cogerFecha = getdate();
			$dia = $cogerFecha['mday'];
			$mes = $cogerFecha['mon'];
			$anyo = $cogerFecha['year'];
			$hora = $cogerFecha['hours'];
			$minuto = $cogerFecha['minutes'];
			$segundo = $cogerFecha['seconds'];
			$fecha = $anyo."-".$mes."-".$dia." ".$hora.":".$minuto.":".$segundo;

			$query="INSERT INTO `tbl_reserva` ( `descripcion_reserva`,`fechaInicio_reserva`,  `tiempoEstimado_reserva`, `id_empleado`, `id_recurso`) VALUES ('$descripcion', '$fecha', '$tiempo', '$idUsuario', '$id_rec');";
			$consulta = mysqli_query($link, $query);

			$query="UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`id_recurso` = '$id_rec';";
			echo "$query";
			$consulta = mysqli_query($link, $query);
			header('Location: index.php?mostrar=reservas');
		}
		
		if (isset($_REQUEST['idUsu'])) {
			$us=$_REQUEST['idUsu'];
			$consulta=mysqli_query($link, "SELECT * FROM tbl_reserva WHERE id_empleado='$us' ORDER BY id_reserva");
		}else {
			$consulta=mysqli_query($link, "SELECT * FROM tbl_reserva ORDER BY id_reserva");

		}
		echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0) {
				echo "<div class='fila encabezado'>";
					/*falta hacer el inner y ver el producto y el usuario*/
					echo "<div class='columna'>Fecha inicio</div>";
					echo "<div class='columna'>Fecha final</div>";
					echo "<div class='columna'>Tiempo aproximado</div>";
					echo "<div class='columna'>Modo finalizacion</div>";
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$fechaInicio=$array['fechaInicio_reserva'];
					$fechaFin = $array['fechaFinal_reserva'];
					$tiempoEstimado=$array['tiempoEstimado_reserva'];
					$modoFinalizacion = $array['modoFinalizacion_reserva'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$fechaInicio</div>";
						echo "<div class='columna'>$fechaFin</div>";
						echo "<div class='columna'>$tiempoEstimado</div>";
						echo "<div class='columna'>$modoFinalizacion</div>";
					echo "</div>";
				}
			}
		echo "</div>";
			
		
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