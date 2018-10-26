<article class="login">
<?php
	echo "<div class='contenedor-login'>";
		session_start();
		if (!empty($_POST['email']) && !empty($_POST['password_empleado'])) {
			$records = $conn->prepare('SELECT id_empleado, usuario_empleado, email_empleado, password_empleado FROM tbl_empleado WHERE email_empleado = :email OR usuario_empleado = :email');
			$records->bindParam(':email', $_POST['email']);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			$message = '';
			if (count($results) > 0 && password_verify($_POST['password'], $results['password_empleado'])) {
				$_SESSION['user_id'] = $results['id_empleado'];
				/*header("Location: index.php");*/
			} else {
				$message = 'El usuario y/o la contraseña son incorrectos';
			}
		}
		echo "<h1>Inicia Sesión</h1>"
		?>
		<form action="index.php" method="POST">
			<input class=login name="email" type="text" placeholder="Direccion de email*" required>
			<input class=login name="password" type="password" placeholder="Contraseña*" required>
			<input class=login type="submit" value="Submit">
		</form>
		<?php
		if (!empty($message)) {
			echo "<p>".$message."</p>";
		}
	echo "</div>";

	// Cerrar sesion:
	/*session_start();
					session_unset();
					session_destroy();
					header('Location: index.php');*/
?>
</article>
