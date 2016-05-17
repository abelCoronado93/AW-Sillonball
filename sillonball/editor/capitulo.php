<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/capitulo.css">
    <link rel="stylesheet" href="../assets/css/editor.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
    <article>
        <header>
            <h1>Capítulo</h1>
        </header>
            
        <ul class="rig columns-2">
            <li>
                <img class="caratula" src="../assets/imagenes/caratulas/Daredevil2.jpg" alt="caratula"/>
            </li>
            <li>
                <p><b>Titulo:</b> Daredevil</p>
                <p><b>Número de capítulo: </b> 1x01</p>
                <p><b>Duración capítulos aprox: </b>53 min.</p>
                <p> 
                    <img class="stars" src="../assets/imagenes/iconos/fullstar.png"/>
                    <img class="stars" src="../assets/imagenes/iconos/fullstar.png"/>
                    <img class="stars" src="../assets/imagenes/iconos/fullstar.png"/>
                    <img class="stars" src="../assets/imagenes/iconos/midstar.png"/>
                    <img class="stars" src="../assets/imagenes/iconos/emptystar.png"/>
                </p>
                
                <a href="editarCapitulo.php"> 
                    <img class="botonAddNoticiaEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                </a>
            </li>
        </ul>    
        <ul class="comentarios">
            <li>
                <img class="usuarioComentario" src="../assets/imagenes/iconos/iconoUsuarioRojo.png"/>
                <p class="nombreUsuarioComentario"> NOMBRE 1 </p>
                <button class="eliminarComentario">
                    <img src="../assets/imagenes/iconos/iconoBorrar.png"/>
                </button>
                <p>jfdñladjks fñlkasjdflñkasjd flñksjdflñsdkjf lñasjkdasdf jkñladkjsflñdjkfñlaskasf jklasdfjk</p>
            </li>
            <li>
                <img class="usuarioComentario" src="../assets/imagenes/iconos/iconoUsuarioRojo.png"/>
                <p class="nombreUsuarioComentario"> NOMBRE 2 </p>
                <button class="eliminarComentario">
                    <img src="../assets/imagenes/iconos/iconoBorrar.png"/>
                </button>
                <p>jfdñladjksfñlk asjdflñkasj dflñksjdflñ sdkjflñasjkda sdfjkñladkj sflñdjkfñlaskasfj klasdfjk</p>
            </li>
            <li>
                <img class="usuarioComentario" src="../assets/imagenes/iconos/iconoUsuarioRojo.png"/>
                <p class="nombreUsuarioComentario"> NOMBRE 3 </p>
                <button class="eliminarComentario">
                    <img src="../assets/imagenes/iconos/iconoBorrar.png"/>
                </button>
                <p>jfdñladjk sfñlkasjdflñkasjdflñ ksjdflñsdkjflñasj kdasdfjkñladkjsflñd jkfñlaskasfj klasdfjk</p>
            </li> 
        </ul>
    </article> <!-- /article -->
    </section> <!-- / #main-content -->
    
    <?php include 'common/pie.php' ?>
</body>
</html>
