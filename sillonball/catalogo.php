<?php 
	header('Content-Type: text/html; charset=utf-8');
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
    $usuario = $controller->getUserData($_SESSION["email"]);
    $series = $controller->getCatalogo();
    $listas = $controller->getListas($_SESSION["email"]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="./assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/catalogo.css">
    <link rel="stylesheet" href="assets/css/reveal.css">
</head>
 
<body>
   <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
  <article>
            <header>
                <h1>Catálogo</h1>
            </header>
            <select id="selector">
                    <option value="puntuacion">Puntuación</option>
                    <option value="titulo">Título</option>
            </select>
            <div class="content">
                <div id="three-columns" class="grid-container">
                    <ul id="lista" class="rig columns-3">
                            <?php
                                foreach($series as $serie){
                                    $ruta = './assets/imagenes/caratulas/' . $serie[2];
                                    echo '<li>'
                                        . '<a href=serie.php?id=' . $serie[0] . '>'
                                        . '<img src="' . $ruta . '"/>'
                                        . '</a>'
                                        . '<a href=serie.php?id=' . $serie[0] . '><h3>'.$serie[1].'</h3></a>'
                                        . '<a id="'.$serie[0].'" class="anyadirSerie">Añadir a lista</a>'
                                    . '</li>';
                                }
                            ?>
                    </ul>
                    <div id="myModal" class="reveal-modal">
                            <?php
                            foreach($listas as $lista){
                                    echo '<li>'
                                        . '<a href="" class="selectLista" id="'.$lista[0].'">' . $lista[1] . '</a>'
                                    . '</li>';
                                }
                            ?>
                    </div>
                </div>
                
                
    <!--/#three-columns-->    
            </div>
  </article> <!-- /article -->
    </section> <!-- / #main-content-->
   
    <?php include 'common/pie.php' ?>
    
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="./assets/js/jquery.reveal.js" type="text/javascript"></script>
<script>
var idSerie;
var idLista;

$("#selector").on("change", function(){ 
     if($("#selector").val() === "puntuacion"){
          $url="services/servicesCatalogoParse.php?action=ordenarPunt";   
     } 
     else if($("#selector").val() === "titulo"){
          $url="services/servicesCatalogoParse.php?action=ordenarTitulo";   
     }
     $.get($url, function(data, status){
         if(status === 'success'){
            $catalogo = JSON.parse(data);
            $("#lista").empty();
            $ret = "";
            for ($i = 0; $i < $catalogo.length; $i++) {
                $id = $catalogo[$i][0];
                $ruta = './assets/imagenes/caratulas/' + $catalogo[$i][2];
                $nombre = $catalogo[$i][1];
                
                $ret += '<li>' + 
                            '<a href=serie.php?id=' + $id + '>' +
                            '<img src="' + $ruta + '" />' + 
                            '</a>' + 
                            '<a href=serie.php?id=' + $id + '><h3>' + $nombre + '</h3></a>' + 
                            '<a id="' + $id + '" class="anyadirSerie">Añadir a lista</a>' +
                       '</li>'; 
            }
            $("#lista").html($ret);
         }
     });
  });
  
  $("#lista").on("click", ".anyadirSerie", function(){ 
	idSerie = $(this).attr("id");
	$('#myModal').reveal({
		  animation: 'fade',              // fade, fadeAndPop, none
                animationspeed: 600,            // how fast animtions are
                closeonbackgroundclick: true,   // if you click background will modal close?
                dismissmodalclass: 'close' 
});
  });

  $(".selectLista").on("click",function(){ 
    idLista = $(this).attr("id");
    $url="services/servicesParse.php?action=addSerieALista&serie="+idSerie+"&lista="+idLista;
    $.get($url);

    alert('Serie añadida con éxito');
  });
</script>
</body>
</html>