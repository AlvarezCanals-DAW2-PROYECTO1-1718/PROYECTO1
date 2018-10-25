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