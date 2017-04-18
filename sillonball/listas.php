<?php 
	header('Content-Type: text/html; charset=utf-8');
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
    $usuario = $controller->getUserData($_SESSION["email"]);
    $listas = $controller->getListas($_SESSION["email"]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="./assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="assets/css/reveal.css">
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
                     <?php
                        foreach($listas as $li){
                            echo '<li>'
                            . '<a href=miLista.php?id=' . $li[0] . '><h3>'.$li[1].'</h3></a>'      
                            . '</li>';
                        }
                    ?>
                    <li>
                        <a href="#" data-reveal-id="myModal"><h3>+</h3></a>
                    </li>
                </ul>
            </div>
            <div id="myModal" class="reveal-modal">
                <form action="services/servicesParse.php?action=addList" method="post">
                    <label>Nombre de la lista</label>
                    <input type="text" id="inputLista" name="listName"><br>
                    <button id="boton" disabled class="form-button" type="submit" value="Add">Añadir</button>
                </form>
            </div>
		<!--/#three-columns--> 
        </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
</body>
</html>
<script src="./assets/js/jquery.js" type="text/javascript"></script>
<script src="./assets/js/jquery.reveal.js" type="text/javascript"></script>
<script>	

    $("#inputLista").change(function(){
            if($("#inputLista").val() !== ""){
                $("#boton").css("cursor", "pointer");
                $('#boton').removeAttr('disabled');
                $('#boton').css("background-color", "#d83b3b");
            }
            else {
                $("#boton").css("cursor", "default");
                $('#boton').attr('disabled', 'disabled');
                $('#boton').css("background-color", "grey");
            }
	});
</script>