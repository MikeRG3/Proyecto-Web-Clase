<?php //Datos de conexión a la base de datos
$hostname = 'localhost';
$database = 'psr'; //----------------------------------------------------NOMBRE-----------------------
$username = 'root';
$password = '12345';

//OBJETO PARA CONECTARSE A LA BASE DE DATOS
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}




?>