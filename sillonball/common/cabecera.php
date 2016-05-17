<header id="main-header">
        <div id="div-fotoCab"><a href="main.php"><img id="foto-cabecera" src="./assets/imagenes/iconos/iconoSillon.png" alt=""/></a></div>
        <a id="logo-header" href="main.php">
            <span class="site-name">Sillonball</span>
            <span class="site-desc"><em>Haz el vago!</em></span>
        </a> <!-- / #logo-header -->
        <input type="checkbox" id="check-menu">
        <nav class="menu">
            <ul>
                <li><a href="catalogo.php"><img class="icono-cabecera" src="./assets/imagenes/iconos/iconoGrid.png" alt="Catálogo"/></a></li>
                <li><a href="listas.php"><img class="icono-cabecera" src="./assets/imagenes/iconos/iconoListas3.png" alt="Mis Listas"/></a></li>
                <li><a href="calendario.php"><img class="icono-cabecera" src="./assets/imagenes/iconos/iconoCalendario.png" alt="Calendario"/></a></li>
                <li>
                    <a href="perfil.php">
                    <?php
                        if(!isset($_SESSION["avatar"])){
                            $ruta = "./assets/imagenes/iconos/iconoUsuario2.png";
                        } else {
                            $ruta = "./assets/imagenes/avatares/". $_SESSION["avatar"];
                        }
                    ?>
                        <img class="icono-cabecera avatar-cabecera" src="<?php echo $ruta ?>" alt="Mi Perfil"/>
                    </a>
                </li>
            </ul>
       </nav><!-- / nav -->
    </header><!-- / #main-header -->

    <label id="boton-menu" for="check-menu"><h3 id="boton-menu-responsive">Menú</h3></label>
<?php if(isset($_SESSION["error"])): ?>
    <div class="error"><span class="fa fa-exclamation-triangle" aria-hidden="true"></span> <?php echo $_SESSION["error"] ?></div>
    <?php unset($_SESSION["error"]) ?>
<?php elseif(isset($_SESSION['exito'])): ?>
    <div class="exito"><span class="fa fa-thumbs-o-up" aria-hidden="true"></span> <?php echo $_SESSION["exito"] ?></div>
    <?php unset($_SESSION["exito"]) ?>
<?php endif; ?>