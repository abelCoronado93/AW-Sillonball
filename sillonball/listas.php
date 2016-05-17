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
    <link rel="stylesheet" href="./assets/css/listas.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
        <header>
            <h1>Mis Listas</h1>
        </header>
            
        <div class="content">
        <div id="three-columns" class="grid-container">
			 <ul class="rig columns-3">
				<li>
                    <a href="miLista.php"><h3>Acción</h3></a>
				</li>
				<li>
					<h3>Comedia</h3>
				</li>
				<li>
					<h3>Favoritas</h3>
				</li>
				<li>
					<h3>2016</h3>
				</li>
                <li>
					<a href="#"><h3>+</h3></a>
				</li>
			</ul>
		</div>
		<!--/#three-columns--> 
        <p> La lista de prueba es la de acción.</p>
        </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
</body>
</html>
