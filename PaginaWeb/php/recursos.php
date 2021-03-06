<article>
	<?php

		if ($grupoUsuario == 'administradores') {
			echo "<a href='#mostrarAñadirRecurso'><input type='button' value='Añadir Recurso'></a>";
		}
		
		// Insertar --------------------------------------------------
		if (isset($_REQUEST['nombreRecurso'])) {
			$nombreRec = $_REQUEST['nombreRecurso'];
			$descRec = $_REQUEST['descripcionRecurso'];
			$imgNombre = $_REQUEST['nombreImg'];
			$idTipoRec = $_REQUEST['idTipoRec'];
			$query="INSERT INTO `tbl_recurso` (`nombreArchivos_recurso`, `nombre_recurso`, `descripcion_recurso`, `disp_recurso`, `id_tipoRecurso`) VALUES ('$imgNombre', '$nombreRec', '$descRec', 'si', '$idTipoRec');";
			mysqli_query($link,$query);
			header('Location: index.php');
		}
		if (isset($_REQUEST['nombreTipoRecurso'])) {
			$nombreTipoRec = $_REQUEST['nombreTipoRecurso'];
			$query="INSERT INTO `tbl_tiporecurso` (`nombre_tipoRecurso`) VALUES ('$nombreTipoRec');";
			mysqli_query($link,$query);
			header('Location: index.php');
		}

		// Mostrar --------------------------------------------------
		$consulta=mysqli_query($link, "SELECT * FROM tbl_recurso ORDER BY id_recurso");
		echo "<div class='tabla tablaRecursos'>";
			include "php/filtrosRecursos.php";
			if(mysqli_num_rows($consulta)>0) {
				while($array = mysqli_fetch_array($consulta)) {
					$idRecurso=$array['id_recurso'];
					$nombre = $array['nombre_recurso'];
					$disponible = $array['disp_recurso'];
					$rutaImagen = $array['rutaArchivos_recurso'];
					$nombreImagen = $array['nombreArchivos_recurso'];
					$extensionImagen = $array['extensionArchivos_recurso'];
					$imagen = $rutaImagen.$nombreImagen.$extensionImagen;
					echo "<div class='fila filaRecursos'>";
						echo "<div class='columna columnaRecursos'><img class='imgRecursos' src='$imagen'></div>";
						echo "<div class='columna columnaRecursos'>$nombre</div>";
						if ($disponible == 'si') {
							if (isset($_REQUEST['filtrarTipoRecurso'])) {
								$filtro = $_REQUEST['filtrarTipoRecurso'];
								echo "<div class='columna columnaRecursos'><a href='index.php?filtrarTipoRecurso=$filtro&idRecurso=$idRecurso#mostrarAñadirReserva'><input type='button' value='Reservar'></a></div>";
							} elseif (isset($_REQUEST['disponibilidad'])) {
								$filtro = $_REQUEST['disponibilidad'];
								echo "<div class='columna columnaRecursos'><a href='index.php?disponibilidad=$filtro&idRecurso=$idRecurso#mostrarAñadirReserva'><input type='button' value='Reservar'></a></div>";
							} elseif (isset($_REQUEST['buscar'])) {
								$filtro = $_REQUEST['buscar'];
								echo "<div class='columna columnaRecursos'><a href='index.php?buscar=$filtro&idRecurso=$idRecurso#mostrarAñadirReserva'><input type='button' value='Reservar'></a></div>";
							} else {
								echo "<div class='columna columnaRecursos'><a href='index.php?idRecurso=$idRecurso#mostrarAñadirReserva'><input type='button' value='Reservar'></a></div>";
							}
							/*echo "<div class='columna columnaRecursos'><a href='index.php?idRecurso=$idRecurso#mostrarAñadirReserva'><input type='button' value='Reservar'></a></div>";*/
						} else {
							echo "<div class='columna columnaRecursos'><input class='desabilitado' type='button' value='Reservar'></div>";
						}
						
					echo "</div>";
				}
			}
		echo "</div>";

		
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
				<form name="formValidar1" action='index.php?mostrar=recursos' method='POST'>
					<label>Nombre Recurso:</label>
					<input class="formValidar1" type='text' name='nombreRecurso' placeholder='Nombre del recurso'>
					<br style='clear: both;'><br>
					<label>Descripción del Recurso:</label>
					<textarea class="formValidar1" rows='10' cols='70' name='descripcionRecurso' placeholder='Descripcion del recurso'></textarea>
					<br style='clear: both;'><br>
					<label>Nombre de la imagen:</label>
					<input class="formValidar1" type="text" name="nombreImg">
					<br style='clear: both;'><br>
					<label>Tipo de Recurso:</label>
					<select class="formValidar1" name="idTipoRec">
						<option value="" class="opHidden">-- selecciona --</option>
						<?php
							/*falta inner para que solo se muestren los recursos que estan en una reserva*/
							$consulta=mysqli_query($link, "SELECT * FROM tbl_tiporecurso ORDER BY id_tipoRecurso");
							if(mysqli_num_rows($consulta)>0) {
								while($array = mysqli_fetch_array($consulta)) {
									$idTipoRecurso = $array['id_tipoRecurso'];
									$nombreTipoRecurso = $array['nombre_tipoRecurso'];									
									echo "<option value='$idTipoRecurso'>$nombreTipoRecurso</option>";
								}
							}
						?>
						<option value='El campo es obligatorio' class="opHidden">El campo es obligatorio</option>
					</select><br>
					<a href="#mostrarAñadirTipoRecurso"><input type="button" value="Añadir Tipo Recurso"></a>
					<br style='clear: both;'><br>
					<input type='submit' value='Enviar'>
				</form>
			</div>
		</div>
	</div>
	<div id='mostrarAñadirTipoRecurso' class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Añadir Tipo Recurso</h3>
			<div class='formularios'>
				<form name="formValidar2" action='index.php?mostrar=recursos' method='POST'>
					<label>Nombre Tipo Recurso:</label>
					<input class="formValidar2" type='text' name='nombreTipoRecurso' placeholder='Nombre del tipo de recurso'>
					<br style='clear: both;'><br>
					<input type='submit' value='Enviar'>
				</form>
			</div>
		</div>
	</div>
	<?php
		if (isset($_REQUEST['idRecurso'])) {
			$idRecurso = $_REQUEST['idRecurso'];
		}
	?>
	<div id="mostrarAñadirReserva" class='divEmergente'>
		<div class='subDivEmergente'>
			<a href='#close' title='Close' class='close'>X</a>
			<h3 class='ventanaModal'>Añadir Reserva</h3>
			<div class='formularios'>
				<form name="formValidar3" action='index.php?mostrar=reservas' method='POST'>
					<label>Tiempo aproximado:</label>
					<input class="formValidar3" type='time' name='tiempoEstimado_reserva' placeholder='Tiempo Estimado'>					
					<br><br>
					<br style='clear: both;'>
					<label>Descripción reserva:</label>
					<textarea class="formValidar3" rows='10' cols='70' name='descripcionReserva' placeholder='Indica brevemente tu reserva'></textarea>
					<input type="hidden" name="idRecurso" value=<?php echo"$idRecurso" ?>>
					<br><br>
					<br style='clear: both;'>
					<input type='submit' value='Enviar'>
				</form>
			</div>
		</div>
	</div>
	<!-- <a href="index.php?insertaRecurso=si">Insertar Recursos <i class="fas fa-plus-square"></i></a><br> -->
</article>