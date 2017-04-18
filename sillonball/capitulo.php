<?php 
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
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
            $caratula_serie = $serie[2];
            $nombre_serie = $serie[1];
        }
    }
    $ucap = $controller->getUserCapitulo($_SESSION["email"], $id);
    $comentarios = $controller->getComentarios($id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="./assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/capitulo.css">
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
            
        <ul class="rig columns-2">
            <?php
            if (isset($ucap['visto']) && $ucap['visto']){
                $imagenVisto='<img src="./assets/imagenes/iconos/iconoVisto.png" title="Capitulo visto"/>';
            }
            else{
                $imagenVisto='<img src="./assets/imagenes/iconos/iconoNoVisto.png" title="Capitulo no visto"/>';
            }
            foreach ($micapitulo as $capitulo){
                $puntuacion = $controller->getPuntuacion($capitulo[0]);
            echo'   <li>
                        <img class="caratula" src="./assets/imagenes/caratulas/'.$caratula_serie.'" alt="caratula"/>
                    </li>
                    <li><p><b>Serie: </b>'.$nombre_serie.'</p>
                        <p><b>Número de capítulo: </b>'.$numTemp.'x'.$capitulo[4].'</p>
                        <p><b>Duración capítulo: </b>'.$capitulo[5].'min.</p>
                        <p><b>Puntuación capítulo: </b>'.$puntuacion.'/10</p>
                        <p><b>Calificar :</b>
                            <form method="post" action="services/servicesParse.php?action=doPuntuar&idCap='.$id.'">
                                <select id="puntuacion" name="puntuacion">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <button type="submit" value="Puntuar"> Puntuar! </button>
                            </form>
                        </p>
                        <form method="post" action="services/servicesParse.php?action=doVisto&idCap='.$id.'">
                            <button id=imgvisto type="submit" value="visto"> '.$imagenVisto.'</button>
                        </form>
                        
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
                            <p>'.$comentario[3].'</p>
                        </li>';
                }
            ?>
        </ul>
        <?php
            echo '<form action="./services/servicesParse.php?action=doComent&idCap='.$id.'" method="post">'
                .'<img id="usuarioNuevoComentario" src="./assets/imagenes/avatares/'.$_SESSION["avatar"].'"/>'
                .'<p id="nombreUsuarioNuevoComentario">'.$_SESSION["email"].'</p>'
                .'<textarea class="nuevoComentario" type="text" name="nuevoComentario" value="" 
                  placeholder="Escribe aquí tu comentario."></textarea>
                <button type="submit" value="Enviar"> Enviar </button>
                </form>';
        ?>
        
        
        
    </article> <!-- /article -->
    </section> <!-- / #main-content -->
    
    <?php include 'common/pie.php' ?>
</body>
</html>
