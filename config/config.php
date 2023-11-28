<?php

//Estableciendo la conexión a la BD

$server = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "Prueba_Doopla";

	$conexion = mysqli_connect($server, $usuario, $contraseña, $base_de_datos);

	//Sí la conexión falla
	if (!$conexion) {
		die("Error en la conexión: " . mysql_connect_error());
	}

?>