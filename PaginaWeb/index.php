<!DOCTYPE html>
<html>
	<head>
		<title>Categorias</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700" rel="stylesheet">
		<script type="text/javascript" src="assets/js/js_version2.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
		<link rel="stylesheet" type="text/css" href="assets/css/ventanaModal.css">
		<link rel="stylesheet" type="text/css" href="assets/css/formulariosBotones.css">
		<link rel="stylesheet" type="text/css" href="assets/css/tablas.css">
	</head>
	<body>
		<div class="total">
			<?php
				include "assets/php/conexion.proc.php";
				//if (!isset($_REQUEST['login']) || !$_REQUEST['login'] == 'bien') {
					//include "login.php";
				//} else {
					//include "assets/php/filtros.php";
					
					//include "assets/php/reservas.php";
					//include "assets/php/reservarRecursos.php";
					//include "assets/php/liberarRecursos.php";
					if (isset($_REQUEST['mostrar']) && $_REQUEST['mostrar'] == 'incidencias') {
					include "assets/php/incidencias.php";
					}else{
						include "assets/php/recursos.php";
					}
				//}
			?>
			<a href="#mostrarDivAñadirList"><input class="añadir-lista" type="button" value="Añadir"></a>
		</div>
	</body>
</html>