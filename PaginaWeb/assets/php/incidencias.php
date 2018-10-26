<article>
	<h1>Incidencias</h1>
	<?php
		// Consulta incompleta
		$consulta=mysqli_query($link, "SELECT * FROM tbl_incidencia ORDER BY id_incidencia");
		echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0) {
				echo "<div class='fila encabezado'>";
					/*falta hacer el inner y ver el producto y el usuario*/
					echo "<div class='columna'>Titulo</div>";
					echo "<div class='columna'>Descripcion</div>";
					echo "<div class='columna'>Tiempo aproximado</div>";
					echo "<div class='columna'>Fecha inicio</div>";
					echo "<div class='columna'>Fecha fin</div>";
					echo "<div class='columna'>Disponibilidad durante incidencia</div>";
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$nombre = $array['titulo_incidencia'];
					$tipo = $array['descripcion_incidencia'];
					$tiempoEstimado=$array['tiempoEstimado_incidencia'];
					$fechaInicio=$array['fechaInicio_incidencia'];
					$fechaFin = $array['fechaFinal_incidencia'];
					$disponible = $array['dispRecurso_incidencia'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$nombre</div>";
						echo "<div class='columna'>$tipo</div>";
						echo "<div class='columna'>$tiempoEstimado</div>";
						echo "<div class='columna'>$fechaInicio</div>";
						echo "<div class='columna'>$fechaFin</div>";
						echo "<div class='columna'>$disponible</div>";
					echo "</div>";
				}
			}
		echo "</div>";

		if (isset($_REQUEST['tituloIncidencia'])) {
			$nombre=$_REQUEST['tituloIncidencia'];
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

			$query="INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `fechaInicio_incidencia`, `id_reserva`) VALUES ('$nombre', '$descripcion', '$fecha', (SELECT `id_reserva` FROM `tbl_reserva` WHERE `id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = '$recurso')))";
			echo "$query";
			$consulta = mysqli_query($link, $query);
			header('Location: index.php?mostrar=incidencias');
		}
	?>
	<div id='mostrarAñadirIncidencia' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Añadir Incidencia</h3>
			<div class='formularios'>
				<form action='index.php?mostrar=incidencias' method='POST'>
					<label>Titulo incidencia:</label>
					<input type='text' name='tituloIncidencia' placeholder='Titulo de la incidencia'>
					<br><br><br>
					<label>Descripción incidencia:</label>
					<textarea rows='10' cols='70' name='descripcionIncidencia' placeholder='Descripción de la Incidencia'></textarea>
					<br><br>
					<br style='clear: both;'>
					<br>
					<label>Recurso incidencia:</label>
					<select name="recursoIncidencia">
						<option value="">-- Selecciona --</option>
						<?php
							/*falta inner para que solo se muestren los recursos que estan en una reserva*/
							$consulta=mysqli_query($link, "SELECT * FROM tbl_recurso ORDER BY id_recurso");
							if(mysqli_num_rows($consulta)>0) {
								while($array = mysqli_fetch_array($consulta)) {
									$id = $array['id_recurso'];
									$nombre = $array['nombre_recurso'];									
									echo "<option value='$id'>$nombre</option>";
								}
							}
						?>
					</select>
					<br style='clear: both;'>
					<input type='submit' value='Enviar'>
				</form>
			</div>
		</div>
	</div>
	<div id='mostrarFinalizarIncidencia' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Finalizar Incidencia</h3>
			<div class='formularios'>
				<form action='index.php?mostrar=incidencias' method='POST'>
					
				</form>
			</div>
		</div>
	</div>
	<a href="#mostrarAñadirIncidencia"><input class="añadir-lista" type="button" value="Añadir"></a>
	<a href="#mostrarFinalizarIncidencia"><input class="añadir-lista" type="button" value="Finalizar"></a>
	<!-- <a href="index.php"><input class="añadir-lista" type="button" value="Recursos"></a> -->
</article>