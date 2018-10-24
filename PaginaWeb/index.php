<!DOCTYPE html>
<html>
	<head>
		<title>Categorias</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<script type="text/javascript" src="assets/js/js_version2.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	</head>
	<body>
		<div class="total">
			<?php
				include "conexion.proc.php";
				if (!isset($_REQUEST['login']) || !$_REQUEST['login'] == 'bien') {
					include "login.php";
				} else {
					include "recursos.php";
					include "insertarRecursos.php";
					include "insertarRecursos.proc.php";
				}
			?>
		</div>
	</body>
</html>