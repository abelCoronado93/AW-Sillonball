<?php
session_start();
require '../controller/editorController.php';
$controller = new editorController();
$id = $_GET['id'];
$thisSerie = $controller->getThisSerie($id);
$temporadas = $controller->getAllTemp($id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sillonball</title>
        <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="../assets/css/serie.css">
        <link rel="stylesheet" href="../assets/css/reveal.css">
        <link rel="stylesheet" href="../assets/css/editor.css">
    </head>

    <body>
        <?php include 'common/cabecera.php' ?>

        <section id="main-content">
            <article>
                <header>
                    <?php
                    foreach ($thisSerie as $Tserie) {
                        echo '<h1>' . $Tserie[1] . '</h1>';
                    }
                    ?>
                </header>
                <ul class="rig columns-2">
                    <?php
                    foreach ($thisSerie as $Tserie) {
                        $ruta = '../assets/imagenes/caratulas/' . $Tserie[2];
                        echo '<li>'
                        . '<img class="caratula" src="' . $ruta . '"/> '
                        . '</li>';
                        echo '<li>'
                        . '<p><b>Titulo:</b> ' . $Tserie[1] . '</p>'
                        . '<p><b>Género:</b> ' . $Tserie[3] . '</p>'
                        . '<p><b>Sinopsis:</b> ' . $Tserie[4] . '</p>'
                        . '<p><b>Año:</b> ' . $Tserie[5] . '</p>'
                        . '<p><b>Puntuación:</b> ' . $Tserie[7] . '/10</p>'
                        . '<p><b>Duración:</b> ' . $Tserie[6] . ' min</p>'
                        . '</li>';
                    }
                    ?>
                    <div>
                        <a id="addTemp" data-reveal-id="myModal"><button> Añadir Temporada </button></a>
                    </div>
                </ul>

                <ul rig class="rig columns-2" id="temporadas">
                    <?php
                    foreach ($temporadas as $temp) {
                        echo '<li class="nivel1" id="'.$temp[1].'">'
                        . '<h3>Temporada ' . $temp[2]
                        . '<a id="' . $temp[1] . '"class="borrarTemp" data-reveal-id="myModal2">
                                <img class="botonBorrarEditor" src="../assets/imagenes/iconos/iconoBorrar.png"/></a>
                           </h3>
                    <ul class="nivel2" id="c' . $temp[1] . '">';
                        $idTemp = $temp[1];
                        $capitulos = $controller->getCapsByTemp($idTemp);

                        foreach ($capitulos as $capitulo) {
                            echo '<li><a href="capitulo.php?idCap=' . $capitulo[0] . '">Capítulo'
                            . $temp[2] . 'x' . $capitulo[4] . '</a></li>';
                        }
                        echo'<a href="addCapitulo.php?id=' . $id . '"><button> Añadir Capítulo </button> </a>';
                        echo'</ul>';
                    }
                    ?>
                </ul>
                <div id="myModal" class="reveal-modal">
                    <form action="../services/servicesParseEditor.php?&action=addTemp&idSerie=<?php echo $id; ?>" method="post">
                        <label>Número de la temporada: </label>
                        <input type="text" id="inputTemp" name="tempNum"><br>
                        <button id="boton" disabled class="form-button" type="submit" value="Add">Añadir</button>
                    </form>
                </div>
                <div id="myModal2" class="reveal-modal">
                    <h3>¿Estás seguro de que deseas eliminar esta temporada?</h3>
                    <a class="botonModal" id="siBorrarTemp">Si</a>
                    <a class="botonModal" href="../editor/serie.php?id=<?php echo $id; ?>">No</a>
                </div>
            </article> <!-- /article -->
        </section> <!-- / #main-content -->

        <?php include 'common/cabecera.php' ?>

    </body>
</html>
<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/jquery.reveal.js" type="text/javascript"></script>
<script>
    $("#temporadas").on("click", ".borrarTemp", function () {
        idTemp = $(this).attr("id");
        $('#myModal2').reveal({
            animation: 'fade', // fade, fadeAndPop, none
            animationspeed: 600, // how fast animtions are
            closeonbackgroundclick: true, // if you click background will modal close?
            dismissmodalclass: 'close'
        });
    });

    $("#siBorrarTemp").on("click", function () {
        $url = "../services/servicesParseEditor.php?&action=deleteTemp&idTemp=" + idTemp + "&idSerie=" + <?php echo $id ?>;
        $.get($url);

        alert("Temporada eliminada!");
        location.reload();
    });

    $("#boton").css("cursor", "default");
    $('#boton').attr('disabled', 'disabled');
    $('#boton').css("background-color", "#777");
    $("#inputTemp").change(function () {
        if ($("#inputTemp").val() !== "") {
            $("#boton").css("cursor", "pointer");
            $('#boton').removeAttr('disabled');
            $('#boton').css("background-color", "#d83b3b");
        } else {
            $("#boton").css("cursor", "default");
            $('#boton').attr('disabled', 'disabled');
            $('#boton').css("background-color", "#777");
        }
    });

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