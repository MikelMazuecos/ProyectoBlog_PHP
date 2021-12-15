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
        <h1>Últimas Entradas</h1>
        <?php
            require_once("funciones.php");
            $entradas = conseguirUltimasEntradas($conn);
            if(!empty($entradas)):
                while($entrada = mysqli_fetch_assoc($entradas)):
        ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2><?=$entrada['titulo']?></h2>
            </a>
            <span class="fecha"><?=$entrada['nombre'].' | '.$entrada['fecha']?></span>
            <p><?=substr($entrada['descripcion'],0,180)."..."?></p>
        </article>
        <?php
                endwhile;
            endif;
        ?>
        <a href="todas_entradas.php" id="boton_entradas">Ver todas las entradas</a>
    </div>  
</body>
</html>