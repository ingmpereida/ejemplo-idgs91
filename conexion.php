<?php
$host = "localhost";
$usuario = "root";
$contrasenia = "";
$base_datos = "practica7_empleados";
//funcion para conectar con MySQL
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_datos);
//en caso de error de conexion
if($mysqli->connect_errno)
{
	echo "Fallo la conexion a MySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}
return $mysqli;