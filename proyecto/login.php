<?php

require_once("conexion.php");
require_once("funciones.php");

if(isset($_POST)){
    $email = mysqliRealEscapeString($conn,$_POST['email'] ?? null);
    $contrasena = mysqliRealEscapeString($conn,$_POST['contrasena'] ?? null);
}

$sql = "SELECT * FROM usuarios WHERE email = '$email';";
$login = mysqli_query($conn,$sql);

if($login && mysqli_num_rows($login) == 1){
    $usuario = mysqli_fetch_assoc($login);

    if (password_verify($contrasena,$usuario['password']))
    {
        $_SESSION['ok'] = array();
        $_SESSION['ok']['login'] = 'Iniciado sesi&oacute;n correctamente';
        $_SESSION['id_usuarios'] = $usuario['id'];
    }
    else
    {
        $_SESSION['errores'] = array();
        $_SESSION['errores']['login'] = array();
        $_SESSION['errores']['login'][] = 'Contrase&ntilde;a incorrecta';
    }
}
else{
    $_SESSION['errores'] = array();
    $_SESSION['errores']['login'] = array();
    $_SESSION['errores']['login'][] = 'Error al iniciar sesi&oacute;n';
}

header('Location: index.php');

?>