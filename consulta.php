<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="icono.png" type="image/x-icon">
	<title>Consulta 1</title>
</head>
<body>

<!--Menú de las secciones-->
	<header id="main-header">
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="consulta.html">Consulta</a></li>
                    <li><a href="ver_api.php">API</a></li>
                </ul>
            </nav>
    </header>

<br><br><br><br><br><br><br><br><br><br><br>

<!--Inicio del sitio y bienvenida-->
<div align="center">

    <h1>Consulta de la sección 1</h1>
    	<h2>Este fue el resultado de la consulta 1</h2>


<?php

//Conectando a la base de datos
	$server = "localhost";
	$usuario = "root";
	$contraseña = "";
	$bd = "Prueba_Doopla";

	$conexion = mysqli_connect($server, $usuario, $contraseña, $bd)
		or die("Error en la conexion");

		//Realizando la consulta
			$consulta = mysqli_query($conexion, "SELECT
				Empleados.Nombre,
				Domicilios.Calle,
				CodigoPostal.Provincia,
				CodigoPostal.CodigoPostal
				FROM Empleados
				INNER JOIN Domicilios ON Empleados.DNI = Domicilios.DNI
				INNER JOIN CodigoPostal ON Domicilios.CodigoPostal = CodigoPostal.CodigoPostal
				ORDER BY
				CodigoPostal.CodigoPostal DESC
				")

				or die("Error al mostrar los clientes");

		//Mostrando el resultado
				echo "<table>";
				echo "<tr>";
				echo "<td><b>Nombre</b></td>";
				echo "<td><b>Calle</b></td>";
				echo "<td><b>Provincia</b></td>";
				echo "<td><b>Código Postal</b></td>";
				echo "</tr>";

					while ($datos = mysqli_fetch_array($consulta)) {
						echo "<tr>";
						echo "<td>".$datos['Nombre']."</td>";
						echo "<td>".$datos['Calle']."</td>";
						echo "<td>".$datos['Provincia']."</td>";
						echo "<td>".$datos['CodigoPostal']."</td>";
						echo "</tr>";
					}

			mysqli_close($conexion);
			echo "</table>";

?>

</div>

<br><br><br><br>

<div align="center">
	<!--BOTNÓN PARA REGRESAR-->
	<button class="boton1">
        <a href="consulta.html">Regresar</a>
    </button>
</div>


<br><br><br><br><br>

<!--PIE DE PÁGINA-->
<footer>
    <p align="center"><a href="https://linktr.ee/yen_hzu" target="_blank">Desarrollado por Yenifer Hernández</a></p>
</footer>

</body>
</html>
