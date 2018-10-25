<?php 
$consulta=mysqli_query($link, "SELECT * FROM tbl_incidencia ORDER BY id_incidencia");
echo "Incidencias<br>";
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
		?>
<div id='mostrarDivAñadirList' class='divEmergente'>
	<div class='subDivEmergente'>
		<a href='#close' title='Close' class='close'>X</a>
		<h3 class='ventanaModal'>Editar lista</h3>
		<div class='formularios'>
			<form action='index.php?insertar=".$ins."' method='POST'>
				<label>Nombre:</label>
				<input type='text' name='añadirNombreList' placeholder='Titulo de la lista'>
				<br><br><br>
				<label>Descripción:</label>
				<textarea rows='10' cols='70' name='añadirDescripcionList' placeholder='Descripción de la lista (opcional)'></textarea>
				<br style='clear: both;'>
				<input type='submit' value='Enviar'>
			</form>
		</div>
	</div>
</div>