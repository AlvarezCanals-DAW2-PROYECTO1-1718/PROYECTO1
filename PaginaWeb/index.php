<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700" rel="stylesheet">
		<script type="text/javascript" src="assets/js/js_version2.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
		<title>Recursos</title>
	</head>
	<body>
		<?php
			include "php/conexion.proc.php";
			include "php/datosUsuario.proc.php";
			if (!isset($_SESSION['user_id'])) {
				include "php/login.php";
			} else {
				include "php/navegador.php";
				?><section><?php
					if (!isset($_REQUEST['mostrar'])) {
						include "php/recursos.php";
						?><!-- <a href="index.php?mostrar=incidencias"><input class="añadir-lista" type="button" value="incidencias"></a> --><?php
					} else {
						$mostrar = $_REQUEST['mostrar'];
						switch ($mostrar) {
							case 'recursos':
								include "php/recursos.php";
								break;
							case 'reservas':
								include "php/reservas.php";
								break;
							case 'incidencias':
								include "php/incidencias.php";
								break;
							case 'cerrarSesion':
								include "php/login.php";
								break;
							default:
								echo "Error";
								break;
						}
						//include "php/filtros.php";
						//include "php/reservas.php";
						//include "php/reservarRecursos.php";
						//include "php/liberarRecursos.php";
					}
				?></section><?php
			}
		?>
	</body>
</html>