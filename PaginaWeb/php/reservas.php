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

		if (isset($_REQUEST['tiempoEstimado_reserva'])) {
			$id_rec=$_REQUEST['idRecurso'];
			$tiempo=$_REQUEST['tiempoEstimado_reserva'];
			$descripcion=$_REQUEST['descripcionReserva'];
			$query="INSERT INTO `tbl_reserva` ( `descripcion_reserva`,`fechaInicio_reserva`,  `tiempoEstimado_reserva`, `id_empleado`, `id_recurso`) VALUES ('$descripcion', '$fecha', '$tiempo', '$idUsuario', '$id_rec');";
			$consulta = mysqli_query($link, $query);

			$query="UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`id_recurso` = '$id_rec';";
			echo "$query";
			$consulta = mysqli_query($link, $query);
			header('Location: index.php?mostrar=reservas');
		}

		if (isset($_REQUEST['idRecursoFinalizar'])) {
			$idRes=$_REQUEST['idReserva'];
			$idRecurso=$_REQUEST['idRecursoFinalizar'];
			$update1=mysqli_query($link, "UPDATE `tbl_reserva` SET `fechaFinal_reserva` = '$fecha', `modoFinalizacion_reserva` = 'bien' WHERE `tbl_reserva`.`id_reserva` = '$idRes';");
			$update2=mysqli_query($link, "UPDATE `tbl_recurso` SET `disp_recurso` = 'si' WHERE `tbl_recurso`.`id_recurso` = '$idRecurso';");					
		}

		if (isset($_REQUEST['idUsu'])) {
			$us=$_REQUEST['idUsu'];
			$consulta=mysqli_query($link, "SELECT * FROM tbl_reserva WHERE id_empleado='$us' ORDER BY id_reserva");
			$boton = true;
		} else {
			$consulta=mysqli_query($link, "SELECT * FROM tbl_reserva ORDER BY id_reserva");
			$boton = false;
		}

		echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0) {
				echo "<div class='fila encabezado'>";
					/*falta hacer el inner y ver el producto y el usuario*/
					echo "<div class='columna'>Fecha inicio</div>";
					echo "<div class='columna'>Fecha final</div>";
					echo "<div class='columna'>Tiempo aproximado</div>";
					echo "<div class='columna'>Modo finalizacion</div>";
					if ($boton) {
						echo "<div class='columna'>Boton</div>";
					}
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)) {
					$idReserva=$array['id_reserva'];
					$fechaInicio=$array['fechaInicio_reserva'];
					$fechaFin = $array['fechaFinal_reserva'];
					$tiempoEstimado=$array['tiempoEstimado_reserva'];
					$modoFinalizacion = $array['modoFinalizacion_reserva'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$fechaInicio</div>";
						echo "<div class='columna'>$fechaFin</div>";
						echo "<div class='columna'>$tiempoEstimado</div>";
						echo "<div class='columna'>$modoFinalizacion</div>";
						if ($boton && $modoFinalizacion==NULL) {
							$query="SELECT * FROM `tbl_reserva` INNER JOIN `tbl_recurso` ON `tbl_reserva`.`id_recurso`=`tbl_recurso`.`id_recurso` WHERE `id_reserva` = '$idReserva' ";
							$consulta = mysqli_query($link, $query);
							if(mysqli_num_rows($consulta)>0) {
								while($array = mysqli_fetch_array($consulta)) {
									$idRecurso = $array['id_recurso'];
									echo "<div class='columna'><a href='index.php?mostrar=reservas&idRecursoFinalizar=$idRecurso&idUsu=2&idReserva=$idReserva'><input class='añadir-lista' type='button' value='Finalizar'></a></div>";
								}
							}

						}
					echo "</div>";
				}
			}
		echo "</div>";
			
		
	?>
	

	<!-- <a href="index.php"><input class="añadir-lista" type="button" value="Recursos"></a> -->
</article>