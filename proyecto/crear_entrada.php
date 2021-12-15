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
    <h1>Crear nueva entrada</h1>
    <?php if(isset($_SESSION['errores']['entrada'])): ?>
        <div class="alerta_error">
            <?=implode(', ',$_SESSION['errores']['entrada'])?>
        </div>
    <?php endif; ?>
    <form method="post" action="validar_entrada.php">
        Titulo
        <br>
        <input type="text" id="titulo" name="titulo">
        <br>
        Descripcion
        <br>
        <textarea id="descripcion" name="descripcion" cols='55' rows='10'></textarea>
        <br>
        Categoria
        <br>
        <?php
            require_once("funciones.php");
            $categorias = conseguirCategorias($conn);
            if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
        ?>
        <div>
            <input type="radio" id="categoria" name="categoria" value=<?=$categoria['id']?>>
            <label for="<?=$categoria['id']?>"><?=$categoria['nombre']?></label>
            </div>
        <?php
                endwhile;
            endif;
        ?>
        <input type="submit" id="boton2" value="Publicar entrada"></textarea>
    </form>
</body>
</html>