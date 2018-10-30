<article>
	<?php
		if (isset($_REQUEST['tituloIncidencia'])) {
			$tituloIncidencia=$_REQUEST['tituloIncidencia'];
			$descripcion=$_REQUEST['descripcionIncidencia'];
			
			$cogerFecha = getdate();
			$dia = $cogerFecha['mday'];
			$mes = $cogerFecha['mon'];
			$anyo = $cogerFecha['year'];
			$hora = $cogerFecha['hours'];
			$minuto = $cogerFecha['minutes'];
			$segundo = $cogerFecha['seconds'];
			$fecha = $anyo."-".$mes."-".$dia." ".$hora.":".$minuto.":".$segundo;

			$idRecurso = $_REQUEST['idRecursoIncidencia'];

			$query="INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `fechaInicio_incidencia`, `id_reserva`) VALUES ('$tituloIncidencia', '$descripcion', '$fecha', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = $idRecurso)))";
			$consulta = mysqli_query($link, $query);
			header('Location: index.php?mostrar=incidencias');
		}

		// Consulta incompleta
		if (isset($_REQUEST['idUsu'])) {
			$us=$_REQUEST['idUsu'];
			$consulta=mysqli_query($link, "SELECT * FROM `tbl_incidencia` INNER JOIN `tbl_reserva` ON `tbl_reserva`.`id_reserva`=`tbl_incidencia`.`id_reserva` INNER JOIN `tbl_empleado` ON `tbl_empleado`.`id_empleado`=`tbl_reserva`.`id_empleado` WHERE `tbl_reserva`.`id_empleado`='$us' ORDER BY `id_incidencia`");
		}else{
			$consulta=mysqli_query($link, "SELECT * FROM `tbl_incidencia` ORDER BY `id_incidencia`");
		}
		
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
					echo "<div class='columna'>Añadir</div>";
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$idIncidencia = $array['id_incidencia'];
					$tituloIncidencia = $array['titulo_incidencia'];
					$descripcion = $array['descripcion_incidencia'];
					$tiempoEstimado = $array['tiempoEstimado_incidencia'];
					$fechaInicio = $array['fechaInicio_incidencia'];
					$fechaFin = $array['fechaFinal_incidencia'];
					$disponible = $array['dispRecurso_incidencia'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$tituloIncidencia</div>";
						echo "<div class='columna'>$descripcion</div>";
						echo "<div class='columna'>$tiempoEstimado</div>";
						echo "<div class='columna'>$fechaInicio</div>";
						echo "<div class='columna'>$fechaFin</div>";
						echo "<div class='columna'>$disponible</div>";
						echo "<div class='columna'><a href='index.php?mostrar=incidencias&idIncidencia=$idIncidencia#mostrarFinalizarIncidencia'><input class='añadir-lista' type='button' value='Finalizar'></a></div>";
					echo "</div>";
				}
			} else {
				echo "Aún no tienes ninguna reserva";
			}
		echo "</div>";
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
					<select name="idRecursoIncidencia">
						<option value="">-- Selecciona --</option>
						<?php
							/*falta inner para que solo se muestren los recursos que estan en una reserva*/
							$query = "SELECT * FROM `tbl_recurso` INNER JOIN `tbl_reserva` ON `tbl_recurso`.`id_recurso`=`tbl_reserva`.`id_recurso` WHERE `tbl_reserva`.`id_empleado`='$idUsuario' ORDER BY `tbl_recurso`.`id_recurso`";
							$consulta=mysqli_query($link, $query);
							if(mysqli_num_rows($consulta)>0) {
								while($array = mysqli_fetch_array($consulta)) {
									$idRecurso = $array['id_recurso'];
									$nombreRecurso = $array['nombre_recurso'];									
									echo "<option value='$idRecurso'>$nombreRecurso</option>";
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
	<!-- <a href="#mostrarFinalizarIncidencia"><input class="añadir-lista" type="button" value="Finalizar"></a> -->
</article>