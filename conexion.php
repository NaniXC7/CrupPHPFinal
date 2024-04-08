<?php 

$server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

$conexion = @mysqli_connect($server, $username, $password, $db);

if(!$conexion){
    echo "Error al conectar a la base de datos";
}
?>