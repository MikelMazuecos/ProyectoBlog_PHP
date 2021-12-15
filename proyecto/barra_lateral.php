<!--BARRA LATERAL-->
<?php if (!isset($_SESSION['ok']['login'])) { ?>
    <aside id="sidebar">
        <div id="buscador">
            <form METHOD=POST action="buscar.php">
                Buscar: 
                <br>
                <input type="text" name="busqueda">
            </form>
        </div>
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <?php if(isset($_SESSION['errores']['login'])): ?>
                <div class="alerta_error">
                    <?=implode(', ',$_SESSION['errores']['login'])?>
                </div>
            <?php endif; ?>
            <form method="post" action="login.php">
                Email
                <br>
                <input type="text" id="email" name="email"/>
                <br>
                Contrase&ntilde;a
                <br>
                <input type="text" id="contrasena" name="contrasena"/>
                <input type="submit" value="Entrar" id="boton"/>
            </form>
        </div>

        <div id="registro">
            <h3>Registrate</h3>
            <?php if(isset($_SESSION['ok']['registro'])): ?>
                <div class="alerta_exito">
                    <?=$_SESSION['ok']['registro']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['registro'])): ?>
                <div class="alerta_error">
                    <?=implode(', ',$_SESSION['errores']['registro'])?>
                </div>
            <?php endif; ?>

            <form method="post" action="registro.php">
                Nombre
                <br>
                <input type="text" id="nombre" name="nombre"/>
                <br>
                Apellidos
                <br>
                <input type="text" id="apellidos" name="apellidos"/>
                <br>
                Email
                <br>
                <input type="text" id="email" name="email"/>
                <br>
                Contrase&ntilde;a
                <br>
                <input type="text" id="contrasena" name="contrasena"/>
                <input type="submit" id="boton" value="Registrar"/>
            </form>
        </div>
    </aside>  
<?php } else { ?>
    <aside id="sidebar">
        <div id="menu_usuario">
            <a href="crear_entrada.php" id="color1">Crear entrada</a>
            <a href="crear_categoria.php" id="color2">Crear categor&iacute;a</a>
            <a href="actualizar_datos_usuario.php" id="color3">Cambiar mis datos</a>
            <a href="cerrar_sesion.php" id="color4">Cerrar sesi&oacute;n</a>
            <?php if(isset($_SESSION['ok']['entrada'])): ?>
                <div class="alerta_exito">
                    <?=$_SESSION['ok']['entrada']?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['ok']['categoria'])): ?>
                <div class="alerta_exito">
                    <?=$_SESSION['ok']['categoria']?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['ok']['datos_usuario'])): ?>
                <div class="alerta_exito">
                    <?=$_SESSION['ok']['datos_usuario']?>
                </div>
            <?php endif; ?>
            
        </div>
        <div id="buscador">
            <form METHOD=POST action="buscar.php">
                Buscar: 
                <br>
                <input type="text" name="busqueda">
            </form>
        </div>
    </aside>
    <?php } ?>