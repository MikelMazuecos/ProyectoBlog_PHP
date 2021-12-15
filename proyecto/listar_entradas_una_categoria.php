<?php
require_once('funciones.php');
require_once('conexion.php');
?>

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
        <?php
        $result = conseguirEntradasUnicaCategoria($conn,'Rol'); 
        $i = 0;
        while($row=mysqli_fetch_array($result)){
            echo $row[$i];
            $i += 1;
        }
        ?>
    </div>
</body>
</html>