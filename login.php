<?php session_start(); ?>
<html>
<head>
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Login</title>
</head>

<body>
<a class="btn btn-primary" href="index.php" role="button">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "usuario o password estan vacios.";
		echo "<br/>";
		echo "<a href='login.php'>Regresar</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("No se puede ejecutar el comando seleccionado.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
		} else {
			echo "Datos invalidos.";
			echo "<br/>";
			echo "<a href='login.php'>Regresa</a>";
		}

		if(@isset($_SESSION['valid'])) {
			@header('Location: index.php');			
		}
		
	}
} else {
?>
	<p><font size="+2">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Username</td>
				<td><input class="form-control" type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input class="btn btn-primary" type="submit" name="submit" value="Entrar"></td>
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
