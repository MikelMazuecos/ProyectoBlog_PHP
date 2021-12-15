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
    $errores['contraseña'] = 'La contrase&ntilde;a no es valida';

$id = $_SESSION['id_usuarios'];
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND id <> $id;";
$buscarEmail = mysqli_query($conn,$sql);
if ($buscarEmail && mysqli_num_rows($buscarEmail) >= 1)
    $errores['email'] = 'El email ya est&acuteM siendo usado por otro usuario';
    
$guardar_usuario = false;

if(count($errores) == 0){
    $guardar_usuario = true;
    $contrasena_segura = password_hash($contrasena, PASSWORD_BCRYPT, ['cost'=>4]);
    $sql = "UPDATE usuarios
            SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', password = '$contrasena_segura'
            WHERE email = '$email';";
    $guardar = mysqli_query($conn,$sql);

    if($guardar){
        $_SESSION['ok'] = $_SESSION['ok'] ?? array();
        $_SESSION['ok']['datos_usuario'] = 'Los cambios se han guardado con exito';
    }else{
        $_SESSION['errores'] = array();
        $_SESSION['errores']['datos_usuario'] = array();
        $_SESSION['errores']['datos_usuario'][] = 'Fallo al publicar la entrada';
    }

    header('location: index.php');
}
else{
    $_SESSION['errores'] = $errores;
    header('location: actualizar_datos_usuario.php');
}
?>