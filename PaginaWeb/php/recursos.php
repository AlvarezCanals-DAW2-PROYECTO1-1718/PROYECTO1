<article>
	<h1>Recursos</h1>
	
	<?php
		$consulta=mysqli_query($link, "SELECT * FROM tbl_recurso ORDER BY id_recurso");
		echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0) {
				echo "<div class='fila encabezado'>";
					echo "<div class='columna'>Imagen</div>";
					echo "<div class='columna'>Nombre</div>";
					echo "<div class='columna'>Tipo</div>";
					echo "<div class='columna'>Disponibilidad</div>";
					echo "<div class='columna'>Reservar</div>";
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$id=$array['id_recurso'];
					$nombre = $array['nombre_recurso'];
					$tipo = $array['tipo_recurso'];
					$disponible = $array['disp_recurso'];
					$rutaImagen = $array['rutaArchivos_recurso'];
					$nombreImagen = $array['nombreArchivos_recurso'];
					$extensionImagen = $array['extensionArchivos_recurso'];
					$imagen = $rutaImagen.$nombreImagen.$extensionImagen;
					echo "<div class='fila'>";
						echo "<div class='columna'><img src='$imagen'></div>";
						echo "<div class='columna'>$nombre</div>";
						echo "<div class='columna'>$tipo</div>";
						echo "<div class='columna'>$disponible</div>";
						if ($disponible == 'si') {
							echo "<div class='columna'><a href='index.php?idRecurso=$id#mostrarAñadirReserva'><input type='button' value='Reservar'></a></div>";
						} else {
							echo "<div class='columna'><input class='desabilitado' type='button' value='Reservar'></div>";
						}
						
					echo "</div>";
				}
			}
		echo "</div>";

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

			$query="INSERT INTO `tbl_reserva` ( `fechaInicio_reserva`,  `tiempoEstimado_reserva`, `id_empleado`, `id_recurso`) VALUES ( '$fecha', '$tiempo', '$idUsuario', '$id_rec');";
			echo "$query";
			$consulta = mysqli_query($link, $query);
			header('Location: index.php?mostrar=incidencias');
		}
		// Consultas--------------------------------
		/*$nodisponible=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='no' ORDER BY id_recurso");
		$tiempo=mysqli_query($link, "SELECT * FROM `tbl_reserva` ORDER BY `tbl_reserva`.`tiempoEstimado_reserva` DESC");
		$incidencia=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='incidencia' ORDER BY id_recurso");
		$motivo=mysqli_query($link, "SELECT * FROM `tbl_incidencia` INNER JOIN `tbl_reserva` ON `tbl_reserva`.`id_reserva`=`tbl_incidencia`.`id_reserva`INNER JOIN `tbl_recurso`ON `tbl_recurso`.`id_recurso`=`tbl_reserva`.`id_recurso`ORDER BY `tbl_incidencia`.`descripcion_incidencia` ASC");*/

		// Filtro--------------------------------
		/*$q="SELECT * FROM `tbl_recurso` ORDER BY `tbl_recurso`.`disponibilidad_recurso` ASC";
		$q_filtros=mysqli_query($link, $q);
		echo "Categoría: <select name='categoria'>"; 
		echo "<option value='todos'>Todos</option>";
		echo "<option value='si'>Disponible</option>";
		echo "<option value='no'>No disponible</option>";
		echo "<option value='incidencia'>Incidencia</option>";
		echo "</select><br/><br/>";*/
	?>
	<div id='mostrarAñadirRecurso' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Añadir Recurso</h3>
			<div class='formularios'>
				<form action='index.php?mostrar=incidencias' method='POST'>
					
				</form>
			</div>
		</div>
	</div>
	<div id='mostrarAñadirReserva' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Añadir Reserva</h3>
			<div class='formularios'>
				<form action='index.php?mostrar=recursos' method='POST'>
					<label>Tiempo aproximado</label>
					<input type='time' name='tiempoEstimado_reserva' placeholder='Tiempo Estimado'>					
					<br><br>
					<label>Descripción reserva:</label>
					<textarea rows='10' cols='70' name='descripcionReserva' placeholder='Indica brevemente tu reserva'></textarea>
					<br><br>
					<br style='clear: both;'>
					<br>


					
					<br style='clear: both;'>
					<input type='submit' value='Enviar'>
				</form>
			</div>
		</div>
	</div>
	<a href="#mostrarAñadirRecurso"><input type="button" value="Añadir"></a>
	<!-- <a href="index.php?insertaRecurso=si">Insertar Recursos <i class="fas fa-plus-square"></i></a><br> -->
</article>