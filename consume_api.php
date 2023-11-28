<?php

//Aplicando el URL del API
$api_url = 'http://localhost/Prueba-Doopla/api.php';
    echo $api_url;

    //Haciendo la petición
    $response = file_get_contents($api_url);

        //Verificando que la solicitud sea exitosa
        if ($response === FALSE) {
            die('Error al tratar de consumir el API');
        }

            //Recibiendo la respuesta de formato JSON
            $data = json_decode($response, true);

                //Sí recibe la respuesta correctamente
                if ($data === NULL ) {
                    die('Error al recibir la respuesta JSON');
                }

?>

<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Datos del API</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<!--Icono-->
	<link rel="shortcut icon" type="text/css" href="icono.png">
</head>
<body>
	
<!--MENÚ-->
	<header id="main-header">
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="consulta.html">Consulta</a></li>
                    <li><a href="ver_api.php">API</a></li>
                </ul>
            </nav>
    </header>

<!--INICIO Y BIENVENIDA-->
    <div class="Formularios">

            <!--Mostrando el resultado-->
            <div id="resultado">
                
        <?php

                //Mostrando los datos en pantalla
                echo '<h1>Empleados de la provincia Chiapas</h1>';
                echo '<br><br>';
                echo '<h2>Estos son los datos de todos los empleados pertenecientes a esta provincia</h2>';
                echo '<br><br>';
                echo '<table align="center">';
                echo '<tr>';
                echo '<td><b>Nombre</b></td>';
                echo '<td><b>Teléfono</b></td>';

                    foreach ($data as $empleado) {

                        echo '<tr>';
                        echo '<td>'.$empleado['Nombre'].'</td>';
                        echo '<td>'.$empleado['Telefono'].'</td>';
                    }

                echo '</table>';

                ?>

            </div>

<br><br><br><br><br>

<div align="center">
    <!--BOTNÓN PARA REGRESAR-->
    <button class="boton1">
        <a href="ver_api.php">Regresar</a>
    </button>
</div>

    </div>


<br><br><br><br><br>

<!--FOOTER-->
    <footer>
        <a href="https://linktr.ee/yen_hzu" target="_blank">
            <p>Desarrollado por Yenifer Hzu</p>
        </a>
    </footer>

</body>
</html>


