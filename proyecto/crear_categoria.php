
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
    <h1>Crear nueva categoria</h1>
    <?php if(isset($_SESSION['errores']['categoria'])): ?>
        <div class="alerta_error">
            <?=implode(', ',$_SESSION['errores']['categoria'])?>
        </div>
    <?php endif; ?>
    <form method="post" action="validar_categoria.php">
        Nombre
        <br>
        <input type="text" id="nombre" name="nombre">
        <br>
        <input type="submit" id="boton2" value="Crear categoria">
    </form>
</body>
</html>