<?php

require_once("conexion.php");
require_once("funciones.php");

if(isset($_POST)){
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
}

$errores = array();

if(empty($nombre))
    $errores['nombre'] = 'El nombre no puede estar vacio';

if(count($errores) == 0){
    $guardar_entrada = true;
    $sql = "INSERT INTO categorias(id,nombre) VALUES (null,'$nombre');";
    $guardar = mysqli_query($conn,$sql);

    if (!$guardar){
    $_SESSION['errores'] = array();
    $_SESSION['errores']['categoria'] = array();
    $_SESSION['errores']['categoria'][] = 'Fallo al publicar la entrada';
    }
    else{
        $_SESSION['ok'] = $_SESSION['ok'] ?? array();
        $_SESSION['ok']['categoria'] = 'Categoria creada con exito';
        header('Location: index.php');
    }
}
else{
    $_SESSION['errores']['categoria'] = $errores;
    header('Location: crear_categoria.php');
}


