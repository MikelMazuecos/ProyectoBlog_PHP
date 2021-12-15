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
            $categoria_id = $_GET['id'];
            
            $sql = "SELECT * FROM entradas WHERE categoria_id = $categoria_id;";

            $entradas = mysqli_query($conn,$sql);
            
            require_once("funciones.php");
            while($entrada = mysqli_fetch_assoc($entradas)):
                    
        ?>
            <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2><?=$entrada['titulo']?></h2></a>
            <p><?=$entrada['fecha']?></p>
            <p><?=$entrada['descripcion']?></p>
        <?php
            endwhile;
        ?>
    </div>
</body>
</html>