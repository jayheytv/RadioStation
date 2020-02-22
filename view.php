<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//incliur el archivo  conexion a la db
include_once("connection.php");

//mostrar datos en orden descendente 
$result = mysqli_query($mysqli, "SELECT * FROM products");
?>

<html>
<head>
<meta charset="utf-8">
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Homepage</title>
</head>

<body>
	<a class="btn btn-primary" href="index.php" role="button">Home</a> | <a class="btn btn-primary" href="add.html"role="button">Agregar Estación de Radio</a> | <a class="btn btn-primary" href="logout.php" role="button">Logout</a>
	<br/><br/>
	
	<table class="table">
		<tr bgcolor='#33FFCE'>
			<td>Tema</td>
			<td>Fecha</td>
			<td>Hora</td>
			<td>Punto de Montaje</td>
			<td>Usuario</td>
			<td>Actualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['tema']."</td>";
			echo "<td>".$res['fecha']."</td>";
			echo "<td>".$res['hora']."</td>";	
			echo "<td>".$res['montaje']."</td>";
			echo "<td>".$res['username']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Seguro quieres borrar?')\">Borrar</a></td>";		
		}
		?>
	</table>	

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
