<?php

//Agregando la conexión a la BD
include('config/config.php');

	//Realizando la consulta
	$consulta = "SELECT 
	Empleados.Nombre,
	Telefonos.Telefono
	FROM Empleados
	INNER JOIN Telefonos ON Telefonos.DNI = Empleados.DNI
	INNER JOIN Domicilios ON Domicilios.DNI = Empleados.DNI
	INNER JOIN CodigoPostal ON CodigoPostal.CodigoPostal = Domicilios.CodigoPostal
	WHERE 
	CodigoPostal.Provincia = 'Chiapas'	
	";

		//Ejecutando la consulta
		$resultado = mysqli_query($conexion, $consulta);

			//Sí la consulta fue exitosa
			if (!$resultado) {
				die("Error al realizar la consulta: " .mysqli_error($conexion));
			}

				//Array que sirve para almacenar los datos
				$resultados = array();
					while ($fila = mysqli_fetch_assoc($resultado)) {
						$resultados[] = $fila;
					}

					//Cerrando la conexión
					mysqli_close($conexion);

						//Convirtiendo los datos a formato JSON
						echo json_encode($resultados);
?>