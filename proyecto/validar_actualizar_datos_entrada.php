<?php

require_once("conexion.php");
require_once("funciones.php");

if(isset($_POST)){
    $titulo = mysqliRealEscapeString($conn,$_POST['titulo'] ?? null);
    $descripcion = mysqliRealEscapeString($conn,$_POST['descripcion'] ?? null);
    $categoria = mysqliRealEscapeString($conn,$_POST['categoria'] ?? null);
}

$errores = array();

if(empty($titulo))
    $errores['nombre'] = 'El titulo no puede estar vacio';

if(empty($descripcion))
    $errores['apellidos'] = 'La descripcion no puede estar vacia';

if(empty($categoria))
    $errores['categoria'] = 'Tienes que seleccionar una categoria';

$id = $_SESSION['id_entradas'];

if(count($errores) == 0){
    $sql = "UPDATE entradas
            SET titulo = '$titulo', descripcion = '$descripcion', categoria_id = '$categoria'
            WHERE id = '$id';";
    $guardar = mysqli_query($conn,$sql);

    if($guardar){
        $_SESSION['ok'] = $_SESSION['ok'] ?? array();
        $_SESSION['ok']['datos_entrada'] = 'Los cambios se han guardado con exito';
    }else{
        $_SESSION['errores'] = array();
        $_SESSION['errores']['datos_entrada'] = array();
        $_SESSION['errores']['datos_entrada'][] = 'Fallo al actualizar la entrada';
    }

    unset($_SESSION['id_entradas']);
    header('location: index.php');
}
else{
    $_SESSION['errores'] = $errores;
    unset($_SESSION['id_entradas']);
    header('location: entrada.php?id=<?=$entrada["id"]?>');
}



?>