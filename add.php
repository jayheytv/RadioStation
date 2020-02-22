<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
<meta charset="utf-8">
		<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<title>Agregar Estación de Radio</title>
</head>

<body>
<?php
//incluir el archivo de conexion a la db
include_once("connection.php");


if(isset($_POST['Submit'])) {	
	$tema = $_POST['tema'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$montaje = $_POST['montaje'];
	$username = $_SESSION['username'];
	$loginId = $_SESSION['id'];
	
		
	// checando campos vacios
	if(empty($tema) || empty($fecha) || empty($hora) || empty($montaje)) {
				
		if(empty($tema)) {
			echo "<font color='red'>Necesitas un tema.</font><br/>";
		}
		
		if(empty($fecha)) {
			echo "<font color='red'>Necesitas una fecha.</font><br/>";
		}
		
		if(empty($hora)) {
			echo "<font color='red'>Necesitas una hora.</font><br/>";
		}
		if(empty($montaje)) {
			echo "<font color='red'>Necesitas un Punto de montaje.</font><br/>";
		}
		
		//link a la pagina previa
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		// si todos los campos llenos (no vacios)
			
		//insertar informacion en la db	
		$result = mysqli_query($mysqli, "INSERT INTO products(tema, fecha, hora, montaje, username, login_id) VALUES('$tema','$fecha','$hora', '$montaje', '$username', '$loginId')");
		//grbabar al usuario agregando la nueva estacion
		
				
		//mostrar mensaje exitosos
		echo "<h5 class='card-title'>Estación de Radio agregada!</h5>";
		echo "<br/> <a class='btn btn-primary' href='view.php' role='button'>Ver Resultado</a>";
	}
}
?>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
