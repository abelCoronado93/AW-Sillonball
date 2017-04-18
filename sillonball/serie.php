<?php 
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
    $usuario = $controller->getUserData($_SESSION["email"]);
    $id = $_GET['id'];
    $thisSerie = $controller->getThisSerie($id);
    $temporadas = $controller->getAllTemp($id);
    $puntuacionMedia = $controller->getPuntuacionMediaSerie($id);
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
                <?php 
                    foreach($thisSerie as $Tserie){
                    echo '<h1>'.$Tserie[1].'</h1>'; }
                ?>
            </header>
        <ul class="rig columns-2">
            <?php
                
                foreach($thisSerie as $Tserie){
                    $ruta = './assets/imagenes/caratulas/' . $Tserie[2];
                    echo '<li>'
                        . '<img class="caratula" src="' . $ruta . '"/> '
                        . '</li>';
                     echo '<li>'
                        .'<p><b>Titulo:</b> ' . $Tserie[1] . '</p>'
                        .'<p><b>Género:</b> ' . $Tserie[3] . '</p>'
                        .'<p><b>Sinopsis:</b> ' . $Tserie[4] . '</p>'
                        .'<p><b>Año:</b> ' . $Tserie[5] . '</p>'
                        .'<p><b>Puntuación:</b> ' . round($puntuacionMedia[0][0], 2) . '/10</p>'
                        .'<p><b>Duración:</b> ' . $Tserie[6] . ' min</p>'     
                        . '</li>';
                }
            ?>
        </ul>
        
        <ul rig class="rig columns-2">
            
            <?php
            foreach($temporadas as $temp){
                echo '<li class="nivel1" id="'.$temp[1].'">'
                    . '<h3>Temporada '. $temp[2].'</h3>
                   <ul class="nivel2" id="c' . $temp[1] . '">';
                   $idTemp = $temp[1];
                   $capitulos = $controller->getCapsByTemp($idTemp);
                   foreach ($capitulos as $capitulo){
                       echo  '<li><a href="capitulo.php?idCap=' . $capitulo[0] . '">Capítulo'
                        . $temp[2].'x'.$capitulo[4].'</a></li>';
                   }
                    echo'</ul>';
            }
            ?>
        </ul>
               
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
        $(".nivel1").click(function () {
            idT = $(this).attr("id");
            $("#c"+idT).each(function () {
                displaying = $(this).css("display");
                if (displaying === "block") {
                    $(this).fadeOut('slow', function () {
                        $(this).css("display", "none");
                    });
                } else {
                    $(this).fadeIn('slow', function () {
                        $(this).css("display", "block");
                    });
                }
            });
        });
    });
</script>