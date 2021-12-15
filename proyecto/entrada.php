
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
    
    <h1>Entrada</h1>
    <?php 
        $categoria_id = $_GET['id'];
        $sql = "SELECT * FROM entradas WHERE id = $categoria_id;";                

        $guardar = mysqli_query($conn,$sql);

        require_once("funciones.php");
        while($entrada = mysqli_fetch_assoc($guardar)):
                
    ?>
        <h2><?=$entrada['titulo']?></h2>
        <p><?=$entrada['fecha']?></p>
        <p><?=$entrada['descripcion']?></p>
    <?php
        endwhile;

    require_once('conexion.php');

    if (isset($_SESSION['ok']['login'])):
        $_SESSION['id_entradas'] = $_GET['id'];
        if(isset($_SESSION['errores'])): ?>
            <div class="alerta_error">
                <?=implode(', ',$_SESSION['errores'])?>
            </div>
        <?php endif; ?>
        <h2>Modificar entrada</h2>
        <form method="post" action="validar_actualizar_datos_entrada.php">
            Nuevo t&iacute;tulo
            <br>
            <input type="text" id="titulo" name="titulo"/>
            <br>
            Nueva descripci&oacute;n
            <br>
            <textarea id="descripcion" name="descripcion" cols='55' rows='10'></textarea>
            <br>
            Nueva categor&iacute;a
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
        <input type="submit" id="boton2" value="Actualizar"></input>
        <?php echo isset($_SESSION['errores']['actualizarDatosEntrada']) ? implode(', ',$_SESSION['errores']['actualizarDatosEntrada']) : ''; ?>
        </form>
        <p>
        <a href="eliminar_entrada.php?id=<?=$categoria_id?>" id='eliminar'>Eliminar</a> 
        </p>
    <?php endif;?>
</body>
</html>