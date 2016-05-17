<?php 
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
    $usuario = $controller->getUserData($_SESSION["email"]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="./assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
            <header>
                <h1>Calendario</h1>
            </header>
                <img src="./assets/imagenes/calendario.png"/>
                    <div class="content">
                        <p>
                            Aquí iría el Google Calendar con los próximos eventos programados como próximos extrenos o noticias relevantes sobre alguna serie.
                        </p>
                        <p>
                            La idea es que los Sillonballers puedan sincronizar el calendario con sus dispositivos y tengan las alertas de los eventos.
                        </p>
                       
                    </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>
