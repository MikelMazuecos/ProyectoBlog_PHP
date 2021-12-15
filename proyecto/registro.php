<?php

require_once("conexion.php");
require_once("funciones.php");

if(isset($_POST)){
    $nombre = mysqliRealEscapeString($conn,$_POST['nombre'] ?? null);
    $apellidos = mysqliRealEscapeString($conn,$_POST['apellidos'] ?? null);
    $email = mysqliRealEscapeString($conn,$_POST['email'] ?? null);
    $contrasena = mysqliRealEscapeString($conn,$_POST['contrasena'] ?? null);
}

$errores = array();

if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre))
    $errores['nombre'] = 'El nombre no es valido';

if(empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos))
    $errores['apellidos'] = 'Los apellidos no son validos';

if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    $errores['email'] = 'El email no es valido';

if(empty($contrasena))
    $errores['contrasena'] = 'La contrase&ntilde;a no es valida';

$sql = "SELECT * FROM usuarios WHERE email = '$email';";
$buscarEmail = mysqli_query($conn,$sql);
if ($buscarEmail && mysqli_num_rows($buscarEmail) >= 1)
    $errores['email'] = 'El email ya est&aacute; siendo usado por otro usuario';

$guardar_usuario = false;
$_SESSION['errores'] = null;

if(count($errores) == 0){
    $guardar_usuario = true;
    $contrasena_segura = password_hash($contrasena, PASSWORD_BCRYPT, ['cost'=>4]);
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES ('$nombre','$apellidos','$email','$contrasena_segura');";
    if (mysqli_query($conn,$sql))
    {
        $_SESSION['ok'] = array();
        $_SESSION['ok']['registro'] = 'El registro se ha completado con exito';
    }
    else
    {
        $_SESSION['errores'] = array();
        $_SESSION['errores']['registro'] = array();
        $_SESSION['errores']['registro'][] = 'Fallo al guardar el usuario';
    }
}
else{
    $_SESSION['errores']['registro'] = $errores;
}

header('location: index.php');

?>