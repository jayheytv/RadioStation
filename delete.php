<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
//incluir el archivo de conexion a la base de datos
include("connection.php");

//tomar la id de data de la url
$id = $_GET['id'];

//borrar de la base de datos
$result=mysqli_query($mysqli, "DELETE FROM products WHERE id=$id");

//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>

