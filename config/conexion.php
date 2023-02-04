<?php
<<<<<<< HEAD
$servername = "localhost";
$database = "u730587483_alba";
$username = "u730587483_root";
$password = "Alba2023*";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conexion) {
die("Connection failed: " . mysqli_connect_error());
}
?>


=======

$conexion = new mysqli("localhost", "u730587483_root", "Alba2023*", "u730587483_alba");
$conexion -> set_charset("utf8");

?>
>>>>>>> main

