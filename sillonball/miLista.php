<?php 
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
    $usuario = $controller->getUserData($_SESSION["email"]);
	if(isset($_GET['id'])){
    $id=$_GET['id'];
	}
    $miLista = $controller->getMiLista($id);
    $misSeries = $controller->getMisSeries($id);
   

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="./assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/catalogo.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
		<?php if(isset($_GET['id'])): ?>
            <header>
            <?php 
                foreach($miLista as $mli){
                echo '<h1>'.$mli[1].'</h1>'; }?>
            </header>
            <div class="content">
                    <div id="three-columns" class="grid-container">
			<ul class="rig columns-3">
				<?php
                                foreach($misSeries as $miserie){
                                    $ruta = './assets/imagenes/caratulas/' . $miserie[2];
                                    echo '<li>'
                                        . '<a href=serie.php?id=' . $miserie[0] . '>'
                                        . '<img src="' . $ruta . '"/>'
                                        . '</a>'
                                        . '<a href=serie.php?id=' . $miserie[0] . '><h3>'.$miserie[1].'</h3></a>'      
                                    . '</li>';
                                }
    
                            ?>
			</ul>
		</div>
		<!--/#three-columns-->    
            </div>
		<?php else: ?>
 			<header>Lista no encontrada</header>
		<?php endif; ?>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
</body>
</html>
