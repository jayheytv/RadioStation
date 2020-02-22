<?php session_start();
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}


// incluir el archivo de conexion a la db
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$tema = $_POST['tema'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];	
	$montaje = $_POST['montaje'];	
	
	// checar campos vacios
	if(empty($tema) || empty($fecha) || empty($hora) || empty($montaje)) {
				
		if(empty($tema)) {
			echo "<font color='red'>Nombre del campo incompleto.</font><br/>";
		}
		
		if(empty($fecha)) {
			echo "<font color='red'>Campo Fecha incompleto.</font><br/>";
		}
		
		if(empty($hora)) {
			echo "<font color='red'>Campo hora incompleto.</font><br/>";
		}	
		if(empty($montaje)) {
			echo "<font color='red'>Punto de Montaje incompleto.</font><br/>";
		}	
	} else {	
		//actualizar tabla
		$result = mysqli_query($mysqli, "UPDATE products SET tema='$tema', fecha='$fecha', hora='$hora', montaje='$montaje' WHERE id=$id");
		
		//rediirigir a pagina view.php
		header("Location: view.php");
		}

}
//cachar id de URL
$id = $_GET['id'];
//$id = 16;

//seleccionar la data asociada a este particular ID.
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
//$result = $mysqli->query("SELECT * FROM products WHERE id=$id");



while($res = mysqli_fetch_array($result))
{
	$tema = $res['tema'];
	$fecha = $res['fecha'];
	$hora = $res['hora'];
	$montaje = $res['montaje'];

}


?>

<html>
<head>	
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Editar Informacion</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">Ver estaciones de Radio</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Tema</td>
				<td><input type="text" name="tema" value="<?php echo $tema;?>"></td>
			</tr>
			<tr> 
				<td>Fecha</td>
				<td><input type="text" name="fecha" value="<?php echo $fecha;?>"></td>
			</tr>
			<tr> 
				<td>Hora</td>
				<td><input type="time" name="hora" value="<?php echo $hora;?>"></td>
			</tr>
			<tr> 
				<td>Punto de Montaje</td>
				<td><input type="text" name="montaje" value="<?php echo $montaje;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
