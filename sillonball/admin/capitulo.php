<?php 
    session_start();
    require '../controller/adminController.php';
    $controller = new adminController();
    $usuario = $controller->getUserData($_SESSION["email"]);
    $micapitulo = $controller->getInfoCapitulo($_GET["idCap"]);
    foreach ($micapitulo as $capitulo){
        $id = $capitulo[0];
        $mitemporada = $controller->getInfoTemp($capitulo[1]);
    }
    foreach ($mitemporada as $temporada){
        $numTemp = $temporada[2];
        $miserie = $controller->getInfoSerie($temporada[0]);
        foreach ($miserie as $serie){
            $idS = $serie[0];
            $caratula_serie = $serie[2];
            $nombre_serie = $serie[1];
        }
    }
    $comentarios = $controller->getComentarios($id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/capitulo.css">
    <link rel="stylesheet" href="../assets/css/editor.css">
    <link rel="stylesheet" href="../assets/css/reveal.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
    <article>
        <?php
        foreach ($micapitulo as $capitulo){
            echo '<header><h1>'.$capitulo[2].'</h1></header>';
        }
        ?>
            
        <ul class="rig columns-2" id="capitulo">
            <?php
            foreach ($micapitulo as $capitulo){
            echo   '<li>
                        <img class="caratula" src="../assets/imagenes/caratulas/'.$caratula_serie.'" alt="caratula"/>
                    </li>
                    <li><p><b>Serie: </b>'.$nombre_serie.'</p>
                        <p><b>Número de capítulo: </b>'.$numTemp.'x'.$capitulo[4].'</p>
                        <p><b>Duración capítulo: </b>'.$capitulo[5].'min.</p>

                        <a href=editarCapitulo.php?id='.$capitulo[0].'&idSerie='.$idS.'>
                            <img class="botonCapituloEditor" src="../assets/imagenes/iconos/iconoEditar.png" />
                        </a>
                        <a class="borrarCapitulo">
                            <img class="botonCapituloEditor" src="../assets/imagenes/iconos/iconoBorrar.png" />
                        </a>
                    </li>'; 
            }
            ?>
        </ul>    
        <ul class="comentarios">
            <?php
                foreach($comentarios as $comentario){
                    $userComent = $controller->getUserData($comentario[1]);
                    echo '<li>
                            <img class="usuarioComentario" src="./assets/imagenes/avatares/'.$userComent["avatar"].'"/>
                            <p class="nombreUsuarioComentario">'.$userComent["nombre"] .'</p>
                            
                            <a class="borrarComent" id="'.$comentario[2].'"> 
                                <img class="iconoBorrarComentario" src="../assets/imagenes/iconos/iconoBorrar.png"/>
                            </a>

                            <p>'.$comentario[3].'</p>
                        </li>';
                }
            ?>
        </ul>
        <?php
            echo '<form action="../services/servicesParseAdmin.php?action=doComent&idCap='.$id.'" method="post">'
                .'<img id="usuarioNuevoComentario" src="./assets/imagenes/avatares/'.$_SESSION["avatar"].'"/>'
                .'<p id="nombreUsuarioNuevoComentario">'.$_SESSION["email"].'</p>'
                .'<textarea class="nuevoComentario" type="text" name="nuevoComentario" value="" 
                  placeholder="Escribe aquí tu comentario."></textarea>
                <button type="submit" value="Enviar"> Enviar </button>
                </form>';
        ?>
        
    <div id="myModal" class="reveal-modal">                
        <h3>¿Estás seguro de que deseas eliminar este comentario?</h3>
        <a class="botonModal" id="siBorrar"> Sí </a>
        <a class="botonModal" href="../admin/capitulo.php?idCap=<?php echo $id ?>"> No </a>
    </div>
    
    <div id="myModal2" class="reveal-modal">                
        <h3>¿Estás seguro de que deseas eliminar este capítulo?</h3>
        <a class="botonModal" id="siBorrarCap"> Sí </a>
        <a class="botonModal" href="../admin/capitulo.php?idCap=<?php echo $id ?>"> No </a>
    </div>
        
    </article> <!-- /article -->
    </section> <!-- / #main-content -->
    
    <?php include 'common/pie.php' ?>
    
    <script src="../assets/js/jquery.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.reveal.js" type="text/javascript"></script>
    <script>
     var idCom;
     $(".comentarios").on("click", ".borrarComent", function(){ 
        idCom = $(this).attr("id");  
	   $('#myModal').reveal({
		animation: 'fade',              // fade, fadeAndPop, none
                animationspeed: 600,            // how fast animtions are
                closeonbackgroundclick: true,   // if you click background will modal close?
                dismissmodalclass: 'close' 
        });
    });
    
    $("#siBorrar").on("click",function(){ 
        $url="../services/servicesParseAdmin.php?&action=deleteComent&idCom="+idCom+"&idCap="+ <?php echo $id ?>;
        $.get($url);
        
        alert("Comentario eliminado!");
        location.reload();
    });
    </script>
    <script>
     $("#capitulo").on("click", ".borrarCapitulo", function(){  
	   $('#myModal2').reveal({
		animation: 'fade',              // fade, fadeAndPop, none
                animationspeed: 600,            // how fast animtions are
                closeonbackgroundclick: true,   // if you click background will modal close?
                dismissmodalclass: 'close' 
        });
    });
    
    $("#siBorrarCap").on("click",function(){ 
        $url="../services/servicesParseAdmin.php?&action=deleteCapitulo&idCap="+ <?php echo $id ?>;
        $.get($url);
       
        alert("Capítulo eliminado");
        window.location.href = "../admin/serie.php?id="+<?php echo $idS?>;
    });
    </script>
</body>
</html>
