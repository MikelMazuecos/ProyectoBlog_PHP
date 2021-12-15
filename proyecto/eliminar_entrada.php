<?php
require_once('conexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM entradas
        WHERE id = $id;";
$guardar = mysqli_query($conn,$sql);

if($guardar){
    $_SESSION['ok'] = $_SESSION['ok'] ?? array();
    $_SESSION['ok']['datos_entrada'] = 'Entrada eliminada';
}else{
    $_SESSION['errores'] = array();
    $_SESSION['errores']['datos_entrada'] = array();
    $_SESSION['errores']['datos_entrada'][] = 'Fallo al eliminar la entrada';
}

unset($_SESSION['id_entradas']);
header('location: index.php');