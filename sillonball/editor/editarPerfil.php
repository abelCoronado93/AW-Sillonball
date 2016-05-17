<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/perfil.css">


</head>
 
<body>
    <header id="main-header">
        <div id="div-fotoCab"><a href="main.php"><img id="foto-cabecera" src="../assets/imagenes/iconos/iconoSillon.png" alt=""/></a></div>
        <a id="logo-header" href="main.php">
            <span class="site-name">Editor</span>
            <span class="site-desc"><em>Haz el vago!</em></span>
        </a> <!-- / #logo-header -->
        <input type="checkbox" id="check-menu">
        <nav class="menu">
            <ul>
                <li><a href="catalogo.php"><img class="icono-cabecera" src="../assets/imagenes/iconos/iconoGrid.png" alt="Catálogo"/></a></li>
                <li><a href="calendario.php"><img class="icono-cabecera" src="../assets/imagenes/iconos/iconoCalendario.png" alt="Calendario"/></a></li>
                <li><a href="perfil.php"><img class="icono-cabecera" src="../assets/imagenes/iconos/iconoUsuario2.png" alt="Mi Perfil"/></a></li>
            </ul>
       </nav><!-- / nav -->
    </header><!-- / #main-header -->
    <label id="boton-menu" for="check-menu"><h3 id="boton-menu-responsive">Menú</h3></label>
 
    <section id="main-content">
	<article>
        <div class="content">
            
            <div class="info">
                
                <img id="img-user" src="../assets/imagenes/iconos/iconoUsuario2.png"/>
                
                <p><b>Nombre</b></p>
                <input class="form-input" type="text" name= "Nombre" value="" placeholder="Pablo Emilio"/>
                
                <p><b>Apellidos</b></p>
                <input class="form-input" type="text" name= "Apellidos" value="" placeholder="Escobar Gaviria"/>
                
                <p><b>Correo</b></p> 
                <input class="form-input" type="text" name= "Correo" value="" placeholder="farlopa@colombia.co"/>
                
                <p><b>Contraseña</b></p> 
                <input class="form-input" type="password" name= "Correo" value="" placeholder=""/>
                
                <p><b>Descripción</b></p>
                <textarea class="form-input" type="text" name= "Descripcion" value="" placeholder="Plata o plomo."></textarea>
                
            </div>
            <div class="edita-boton">
                <a href="perfil.php"><button class="form-button">Atrás</button></a>
                <a href="#"><button class="form-button">Aceptar</button></a>    
            </div>
        </div>
                        	       		
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <footer id="main-footer">
        <div class="grid-footer"><a href="acercade.php">Quiénes somos</a></div>
        <div class="grid-footer"> <a href="http://informatica.ucm.es/">Facultad de Informática UCM</a> &copy; 2016</div>
        <div class="grid-footer"><a href="contacto.php">Contacto</a></div>
    </footer> <!-- / #main-footer -->
    
</body>
</html>
