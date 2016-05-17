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
    <link rel="stylesheet" href="./assets/css/serie.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
            <header>
                <h1>Daredevil</h1>
            </header>
        <ul class="rig columns-2">
            <li>
                <img class="caratula" src="./assets/imagenes/caratulas/Daredevil2.jpg" alt="caratula"/>
            </li>
            <li>
                <p><b>Titulo:</b> Daredevil</p>
                <p><b>Año: </b> 2015</p>
                <p><b>Género: </b> Acción, Ciencia ficción, Superhéroes, Comic</p>
                <p><b>Sinopsis: </b> Serie de TV. Adaptación televisiva de los cómics del abogado de día, Matt Murdock, y superhéroe de noche, Daredevil.</p>
                <p><b>Duración capítulos aprox: </b> 60 min.</p>
                <p><b>Puntuación: </b> 3.8/5 </p>
            </li>
        </ul>
        
        <ul rig class="rig columns-2">
            <li class="nivel1"><h3>Temporada 1</h3>
                <ul class="nivel2">
                    <li><a href="capitulo.php">Capítulo 1x01</a></li>
                    <li>Capítulo 1x02</li>
                    <li>Capítulo 1x03</li>
                    <li>Capítulo 1x04</li>
                    <li>Capítulo 1x05</li>
                    <li>Capítulo 1x06</li>
                </ul>
            <li class="nivel1"><h3>Temporada 2</h3>
                <ul class="nivel2">
                    <li>Capítulo 2x01</li>
                    <li>Capítulo 2x02</li>
                    <li>Capítulo 2x03</li>
                    <li>Capítulo 2x04</li>
                    <li>Capítulo 2x05</li>
                    <li>Capítulo 2x06</li>
                </ul>
            </li>
        </ul>
               
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>