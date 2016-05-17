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
    <link rel="stylesheet" href="./assets/css/acercade.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
            <header>
                <h1>Quiénes somos</h1>
            </header>
        <div id="text-acercade">
            <p >Somos un equipo de estudiantes de la Facultad de Informática de la UCM que estamos desarrollando una aplicación dedicada a hacerte disfrutar de tus series y que lleves un seguimiento controlado de tus capítulos.
            El objetivo de esta aplicación web es apobar la asignatura AW.</p>
        </div>

        <h1>Equipo de desarrollo</h1>
        
        <div class="grid-container">
        <ul class="rig columns-2">
            <li>
                <img class="img-miembro" src="./assets/imagenes/miembros/Maria.png" />
                <h3>María Castañeda López</h3>
                <p>Me gusta ir de compras y cotillear con mis amigas. Programadora experta en Linux.</p>
            </li>
            <li>
                <img class="img-miembro" src="./assets/imagenes/miembros/Abel.png" />
                <h3>Abel Coronado López</h3>
                <p>Me gusta el gym y jugar al Call of Duty. Programador experto en Nada. </p>
            </li>
            <li>
                <img class="img-miembro" src="./assets/imagenes/miembros/Carlos.png" />
                <h3>Carlos Piña Martínez</h3>
                <p>Mi móvil está harto de que cada 2 por 3 le esté cambiando la ROM y cacharreando con él. </p>
            </li>
            <li>
                <img class="img-miembro" src="./assets/imagenes/miembros/JuanLuis.png" />
                <h3>Juan Luis Romero Sánchez</h3>
                <p>Cine y Series como método de pasar el tiempo. Estoy obsesionado con las cachimbas. </p>
            </li>
        </ul>
    </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>

