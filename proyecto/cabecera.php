<!--CABECERA-->
<header id="cabecera">
    <div id="logo">
        <h1>Blog de videojuegos</h1>
    </div>
    <!--MENU-->
    <nav id = "menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php
                require_once("funciones.php");
                $categorias = conseguirCategorias($conn);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <li><a href="entradas_de_categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a></li>
            <?php
                    endwhile;
                endif;
            ?>
            <li><a href="responsabilidad.php">Responsabilidad</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>
</header>