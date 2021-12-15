<?php

$usuarioBD = "root";
$passBD = "";
$servidorBD = "127.0.0.1";
$nombreBD = "proyecto";
$conn = new mysqli($servidorBD, $usuarioBD, $passBD, $nombreBD);

if($conn->connect_error){
    die("Error: no se puede conectar al servidor: " . $conn->connect_error);
}

session_start();
?>