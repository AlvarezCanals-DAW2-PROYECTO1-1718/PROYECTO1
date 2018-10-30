<article>
	<?php
		$cogerFecha = getdate();
		$dia = $cogerFecha['mday'];
		$mes = $cogerFecha['mon'];
		$anyo = $cogerFecha['year'];
		$hora = $cogerFecha['hours'];
		$minuto = $cogerFecha['minutes'];
		$segundo = $cogerFecha['seconds'];
		$fecha = $anyo."-".$mes."-".$dia." ".$hora.":".$minuto.":".$segundo;

		// Insertar incidencia ----------------------------------------
		if (isset($_REQUEST['tituloIncidencia'])) {
			$tituloIncidencia=$_REQUEST['tituloIncidencia'];
			$descripcion=$_REQUEST['descripcionIncidencia'];
			$idRecurso = $_REQUEST['idRecursoIncidencia'];
			$query="SET @sub = (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`id_recurso` = $idRecurso) AND (`fechaFinal_reserva` IS NULL));";
			$consulta = mysqli_query($link, $query);
			$query="UPDATE `tbl_reserva` SET `fechaFinal_reserva` = '$fecha', `modoFinalizacion_reserva` = 'incidencia' WHERE `id_reserva` = @sub";
			$consulta = mysqli_query($link, $query);
			$query="INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `fechaInicio_incidencia`, `id_reserva`) VALUES ('$tituloIncidencia', '$descripcion', '$fecha', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = $idRecurso)))";
			$consulta = mysqli_query($link, $query);
			header("Location: index.php?mostrar=incidencias&idUsu=$idUsuario");
		}

		if (isset($_REQUEST['idIncidenciaFinalizar'])) {
			$idRecurso=$_REQUEST['idRecurso'];
			$idIncidencia=$_REQUEST['idIncidenciaFinalizar'];
			$update1=mysqli_query($link, "UPDATE `tbl_incidencia` SET `fechaFinal_incidencia` = '$fecha' WHERE `tbl_incidencia`.`id_incidencia` = '$idIncidencia';");
			$update2=mysqli_query($link, "UPDATE `tbl_recurso` SET `disp_recurso` = 'si' WHERE `tbl_recurso`.`id_recurso` = '$idRecurso';");
		}

		// Empezar incidencia -----------------------------------------
		if (isset($_REQUEST['tiempoEstimado_incidencia'])) {
			$idIncidencia=$_REQUEST['idIncidenciaEmpezar'];
			$tiempoEstimado = $_REQUEST['tiempoEstimado_incidencia'];
			$consultaEmpezar=mysqli_query($link, "UPDATE `tbl_incidencia` SET `tiempoEstimado_incidencia` = '$tiempoEstimado' WHERE `tbl_incidencia`.`id_incidencia` = '$idIncidencia';");
		}

		// Mostrar --------------------------------------------------
		if (isset($_REQUEST['idUsu'])) {
			$us=$_REQUEST['idUsu'];
			$consulta=mysqli_query($link, "SELECT * FROM `tbl_incidencia` INNER JOIN `tbl_reserva` ON `tbl_reserva`.`id_reserva`=`tbl_incidencia`.`id_reserva` INNER JOIN `tbl_empleado` ON `tbl_empleado`.`id_empleado`=`tbl_reserva`.`id_empleado` WHERE `tbl_reserva`.`id_empleado`='$us' ORDER BY `id_incidencia`");
			$boton = true;
		}else{
			$consulta=mysqli_query($link, "SELECT * FROM `tbl_incidencia` ORDER BY `id_incidencia`");
			$boton = false;
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
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$idIncidencia = $array['id_incidencia'];
					$tituloIncidencia = $array['titulo_incidencia'];
					$descripcion = $array['descripcion_incidencia'];
					$tiempoEstimado = $array['tiempoEstimado_incidencia'];
					$fechaInicio = $array['fechaInicio_incidencia'];
					$fechaFin = $array['fechaFinal_incidencia'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$tituloIncidencia</div>";
						echo "<div class='columna'>$descripcion</div>";
						echo "<div class='columna'>$tiempoEstimado</div>";
						echo "<div class='columna'>$fechaInicio</div>";
						echo "<div class='columna'>$fechaFin</div>";
						if ($grupoUsuario == 'administradores') {
							
							$queryBoton="SELECT * FROM `tbl_reserva` INNER JOIN `tbl_incidencia` ON `tbl_reserva`.`id_reserva`=`tbl_incidencia`.`id_reserva` WHERE `id_incidencia` = '$idIncidencia'";
							$consultaBoton = mysqli_query($link, $queryBoton);
							if(mysqli_num_rows($consulta)>0) {
								while($array2 = mysqli_fetch_array($consultaBoton)) {
									$idRecurso = $array2['id_recurso'];
									if ($tiempoEstimado == NULL) {
										echo "<div class='columna'><a href='index.php?mostrar=incidencias&idIncidencia=$idIncidencia#mostrarEmpezarIncidencia'><input class='añadir-lista' type='button' value='Empezar'></a></div>";
									} elseif($fechaFin == NULL) {
										echo "<div class='columna'><a href='index.php?mostrar=incidencias&idIncidenciaFinalizar=$idIncidencia&idRecurso=$idRecurso'><input class='añadir-lista' type='button' value='Finalizar'></a></div>";
									}
								}
							}
							
						}
					echo "</div>";
				}
			} else {
				echo "Aún no hay incidencias";
			}
		echo "</div>";

		if ($boton) {
			echo "<a href='#mostrarAñadirIncidencia'><input class='añadir-lista' type='button' value='Añadir'></a>";
		}
	?>
	
	<div id='mostrarAñadirIncidencia' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Añadir Incidencia</h3>
			<div class='formularios'>
				<form action=<?php echo "index.php?mostrar=incidencias&idUsu=$idUsuario "; ?> method='POST'>
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
							$query = "SELECT * FROM `tbl_recurso` INNER JOIN `tbl_reserva` ON `tbl_recurso`.`id_recurso`=`tbl_reserva`.`id_recurso` WHERE `tbl_reserva`.`id_empleado`='$idUsuario' AND `tbl_reserva`.`modoFinalizacion_reserva` IS NULL ORDER BY `tbl_recurso`.`id_recurso`";
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
	<?php
		if (isset($_REQUEST['idIncidencia'])) {
			$idIncidencia = $_REQUEST['idIncidencia'];
		}
	?>
	<div id='mostrarEmpezarIncidencia' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Empezar Incidencia</h3>
			<div class='formularios'>
				<form action='index.php?mostrar=incidencias' method='POST'>
					<label>Tiempo aproximado</label>
					<input type='time' name='tiempoEstimado_incidencia' placeholder='Tiempo Estimado'>
					<input type="hidden" name="idIncidenciaEmpezar" value=<?php echo"$idIncidencia" ?>>
					<br><br>
					<br style='clear: both;'>
					<input type='submit' value='Enviar'>
				</form>
			</div>
		</div>
	</div>
</article>