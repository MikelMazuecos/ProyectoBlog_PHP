
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="estilos.css?ts=<?=time()?>" rel="stylesheet" type="text/css">
</head>
<body>  
<div id="contenedor">
    <?php
    require_once('cabecera.php');
    require_once('barra_lateral.php');
    ?>    
    </div>

    <div id="principal">
    <!--CAJA PRINCIPAL--> 
    
    <h1>Modificar mis datos</h1>
    <?php 
        if(isset($_SESSION['errores'])): ?>
            <div class="alerta_error">
                <?=implode(', ',$_SESSION['errores'])?>
            </div>
    <?php endif; ?>
    <form method="post" action="validar_actualizar_datos_usuario.php">
        Nuevo nombre
        <br>
        <input type="text" id="nombre" name="nombre"/>
        <br>
        Nuevos apellidos
        <br>
        <input type="text" id="apellidos" name="apellidos"/>
        <br>
        Nuevo email
        <br>
        <input type="email" id="email" name="email"/>
        <br>
        Nueva contrase&ntilde;a
        <br>
        <input type="password" id="contrasena" name="contrasena"/>
        <br>
        <input type="submit" id="boton2" value="Modificar datos"></input>
        <?php echo isset($_SESSION['errores']['actualizarDatosUsuario']) ? implode(', ',$_SESSION['errores']['actualizarDatosUsuario']) : ''; ?>
    </form> 
</body>
</html>