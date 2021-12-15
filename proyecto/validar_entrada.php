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
    $errores['titulo'] = 'El t&iacute;tulo no puede estar vacio';

if(empty($descripcion))
    $errores['descripcion'] = 'La descripci&oacute;n no puede estar vac&iacute;a';

if(empty($categoria))
    $errores['categoria'] = 'Tienes que elegir una categor&iacutea';

$usuarioID = $_SESSION['id_usuarios'];

if(count($errores) == 0){
    $guardar_entrada = true;
    $sql = "INSERT INTO entradas(usuario_id,categoria_id,titulo,descripcion,fecha) VALUES ('$usuarioID', '$categoria', '$titulo','$descripcion',CURDATE());";
    $guardar = mysqli_query($conn,$sql);

    if (!$guardar){
        $_SESSION['errores'] = array();
        $_SESSION['errores']['entrada'] = array();
        $_SESSION['errores']['entrada'][] = 'Fallo al publicar la entrada';
        header('Location: crear_entrada.php');
        }

    else{
        header('Location: index.php');
    }
}

else{
    $_SESSION['errores'] = array();
    $_SESSION['errores']['entrada'] = array();
    $_SESSION['errores']['entrada'] = $errores;
    
    header('Location: crear_entrada.php');
}
    