<?php
    require_once("funciones.php");
    $entradas = conseguirUltimasEntradas($conn);
    if(!empty($entradas)):
        while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
    <article class="entrada">
    <a href="entrada.php?id=<?=$entrada['id']?>">
        <h2><?=$entrada['titulo']?></h2>
        <span class="fecha"><?=$entrada['nombre'].' | '.$entrada['fecha']?></span>
        <p><?=$entrada['descripcion']?></p>
    </a>
    </article>
    <?php
        endwhile;
    endif;
?>