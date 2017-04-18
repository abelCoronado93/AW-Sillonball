<?php 
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    require '../controller/adminController.php';
    $controller = new adminController();
    $series = $controller->getCatalogo();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/editor.css">
    <link rel="stylesheet" href="../assets/css/catalogo.css">
    <link rel="stylesheet" href="../assets/css/reveal.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
            <header>
                <h1>Catálogo</h1>
            </header>	
            <a href="addSerie.php"> 
                <img class="botonCatalogoEditor" src="../assets/imagenes/iconos/iconoAdd.png" >
            </a>
            <div class="content">
                <div id="three-columns" class="grid-container">
                    <ul class="rig columns-3" id="serie">
                        <?php
                            foreach($series as $serie){
                                $ruta = '../assets/imagenes/caratulas/' . $serie[2];
                                echo '<li>'
                                    . '<a href=serie.php?id=' . $serie[0] . '>'
                                    . '<img src="' . $ruta . '"/>'
                                    . '</a>'
                                    . '<a href=serie.php?id=' . $serie[0] . '><h3>'.$serie[1].'</h3></a>'
                                    . '<a href=editarSerie.php?id=' . $serie[0] . '><img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" /></a>'
                                    . '<a class="deleteSerie" id="'.$serie[0].'"><img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" /></a>'
                                . '</li>';
                            }
                        ?>
                    </ul>
                    <div id="myModal" class="reveal-modal">                
                        <h3>¿Estás seguro de que deseas eliminar esta serie?</h3>
                        <a class="botonModal" id="siBorrar">Sí</a>
                        <a class="botonModal" href="../admin/catalogo.php">No</a>
                    </div>
		<!--/#three-columns-->    
                </div>
            </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->

    <?php include 'common/pie.php' ?>
    
    <script src="../assets/js/jquery.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.reveal.js" type="text/javascript"></script>
    <script>
     var idSerie;
     $("#serie").on("click", ".deleteSerie", function(){ 
        idSerie = $(this).attr("id");  
	$('#myModal').reveal({
            animation: 'fade',              // fade, fadeAndPop, none
            animationspeed: 600,            // how fast animtions are
            closeonbackgroundclick: true,   // if you click background will modal close?
            dismissmodalclass: 'close' 
        });
    });
    
    $("#siBorrar").on("click",function(){ 
        url="../services/servicesCatalogoAdminParse.php?&action=deleteSerie&id="+idSerie;
        $.get(url);
        
        alert("Serie eliminada con exito.");
        location.reload();
    });
    </script>
</body>
</html>
