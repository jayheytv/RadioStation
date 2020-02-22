<html>
<head>
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Registro</title>
</head>

<body>
<a class="btn btn-primary" href="index.php" role="button">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "Todos los campos deben ser llenados.";
		echo "<br/>";
		echo "<a href='register.php'>Regresa</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("No se puede ejecutar el comando seleccionado.");
			
		echo "Registro Satisfactorio!";
		echo "<br/>";
		echo "<a class='btn btn-primary' href='login.php' role='button'>Login</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre Completo</td>
				<td><input class="form-control" type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input class="form-control" type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input class="form-control" type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input class="btn btn-primary"  type="submit" name="submit" value="Registrate"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	

</body>
</html>
