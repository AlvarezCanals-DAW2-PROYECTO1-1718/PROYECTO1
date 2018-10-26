<nav id='MenuDesplegable' class="menu">
	<ul class="nav">
		<li class="nivel1"><a href="index.php">Recursos</a></li>
		<li class="nivel1"><a href="index.php?mostrar=reservas">Reservas</a></li>
		<li class="nivel1"><a href="index.php?mostrar=incidencias">Incidencias</a></li>

		<li class="usuario"><a href="index.php?mostrar=reservas&mias=si">Mis Reservas</a></li>
		<li class="usuario"><a href="index.php?mostrar=incidencias&mias=si">Mis Incidencias</a></li>
		<?php
			// if ($user['grupo']=='administrador')
			/*echo "<li class='usuario'><a>".$usuario."</a>";
				echo "<ul class=ul2>";
					echo "<li class='usuario2'><a class=usuario href=''>Tu perfil</a></li>";
					echo "<li class='usuario2'><a class=usuario href=''>Configuracion</a></li>";
					echo "<li class='usuario2'><a class=usuario href=''>Salir</a></li>";
				echo "</ul>";
			echo "</li>";*/
		?>
	</ul>
</nav>