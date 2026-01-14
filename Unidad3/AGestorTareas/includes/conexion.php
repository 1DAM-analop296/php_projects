<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "gestion";

//Crear conexión

$conn=mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

//Verificar la conexión

if(!$conn){
    die("Error en la conexión ". mysqli_connect_error());
}


?>