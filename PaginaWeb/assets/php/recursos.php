<div>
	<?php
		/*
		if (isset($_REQUEST['cat_id'])) {
			$padre=$_REQUEST['cat_id'];
		}else{
		$padre=0;
		}
		*/
		//Filtro
		/*$q="SELECT * FROM `tbl_recurso` ORDER BY `tbl_recurso`.`disponibilidad_recurso` ASC";
		$q_filtros=mysqli_query($link, $q);
		echo "Categoría: <select name='categoria'>"; 
		echo "<option value='todos'>Todos</option>";
		echo "<option value='si'>Disponible</option>";
		echo "<option value='no'>No disponible</option>";
		echo "<option value='incidencia'>Incidencia</option>";
		echo "</select><br/><br/>";*/
		
		//SQLS
		$consulta=mysqli_query($link, "SELECT * FROM tbl_recurso ORDER BY id_recurso");
		/*$nodisponible=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='no' ORDER BY id_recurso");
		$tiempo=mysqli_query($link, "SELECT * FROM `tbl_reserva` ORDER BY `tbl_reserva`.`tiempoEstimado_reserva` DESC");
		$incidencia=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='incidencia' ORDER BY id_recurso");
		$motivo=mysqli_query($link, "SELECT * FROM `tbl_incidencia` INNER JOIN `tbl_reserva` ON `tbl_reserva`.`id_reserva`=`tbl_incidencia`.`id_reserva`INNER JOIN `tbl_recurso`ON `tbl_recurso`.`id_recurso`=`tbl_reserva`.`id_recurso`ORDER BY `tbl_incidencia`.`descripcion_incidencia` ASC");*/
		//Consultas a mostrar
		echo "Recursos<br>";
		echo "<div class='tabla'>";
			if(mysqli_num_rows($consulta)>0){
				echo "<div class='fila encabezado'>";
					echo "<div class='columna'>Nombre</div>";
					echo "<div class='columna'>Tipo</div>";
					echo "<div class='columna'>Disponibilidad</div>";
				echo "</div>";
				while($array = mysqli_fetch_array($consulta)){
					$nombre = $array['nombre_recurso'];
					$tipo = $array['tipo_recurso'];
					$disponible=$array['disponibilidad_recurso'];
					echo "<div class='fila'>";
						echo "<div class='columna'>$nombre</div>";
						echo "<div class='columna'>$tipo</div>";
						echo "<div class='columna'>$disponible</div>";
					echo "</div>";
					
				}
			}
		echo "</div>";
		/*echo "<br><br>Recursos Ocupados<br>";
		if(mysqli_num_rows($nodisponible)>0){
			while($disponible = mysqli_fetch_array($nodisponible)){
				$tempo = mysqli_fetch_array($tiempo);
				$nrecurso=$disponible['nombre_recurso'];
				$tiempoaprox= $tempo['tiempoEstimado_reserva'];
				echo "Recurso reservado: ".$nrecurso."<br>";
				echo "Tiempo reserva (Aprox): ".$tiempoaprox."<br><br>";   
			}
		}
		echo "<br><br>Incidencias<br>";
		if(mysqli_num_rows($motivo)>0){
			while($disponible = mysqli_fetch_array($motivo)){
				$nrecurso=$disponible['nombre_recurso'];
				$motivo_recurso= $disponible['descripcion_incidencia'];
				echo "Nombre recurso: ".$nrecurso."<br>";
				 echo "Motivo Incidencia: ".$motivo_recurso."<br><br>"; 
			}

		}*/
	?>
				 <!--   <br>
			<a href="index.php?insertaRecurso=si">Insertar Recursos <i class="fas fa-plus-square"></i></a><br> -->
			 <a href="index.php?mostrar=incidencias"><input class="añadir-lista" type="button" value="incidencias"></a>
</div>