<?php
session_start();
require '../controller/adminController.php';
$controller = new adminController();
;
$editores = $controller->getEditores();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Sillonball</title>
        <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="../assets/css/admin.css">
        <link rel="stylesheet" href="../assets/css/reveal.css">
    </head>

    <body>
<?php include 'common/cabecera.php' ?>
        <section id="main-content">
            <h1>Admin</h1>

            <h3 class="subtitulo"><b>Nuevo editor</b></h3>
            <form action="../services/servicesParseAdmin.php?action=doRegister" method="post">
                <div>
                    <label>Nombre</label>
                    <input id="campoNombre" class="required" type="text" name="username">
                </div>

                <div>
                    <label>Apellidos</label>
                    <input type="text" name="usersurname">
                </div>

                <div>
                    <label>Correo electrónico</label>
                    <input class="required" id="campoEmail" type="text" name="useremail">

                </div>

                <div>
                    <label>Contraseña</label>
                    <input class="required" id="campoPass" type="text" name="password1">
                </div>

                <button id="boton" type="submit" value="Aceptar">Aceptar</button> 
            </form>
            <h3 class="subtitulo"><b>Editores</b></h3>
            <?php
            echo '<ul  class="editores">';
            foreach ($editores as $editor) {
                echo '<li>'
                . '<p>' . $editor[1] . '<a class="botonBorrar" id="'.$editor[1].'"><img class="botonBorrarEditor" src="../assets/imagenes/iconos/iconoBorrar.png"></a></p>'
                . '</li>';
            }
            echo '<ul>';
            ?>

            <div id="myModal" class="reveal-modal">                
                <h3>¿Estás seguro de que deseas eliminar este editor?</h3>
                <a class="botonModal" id="siBorrar"> Sí </a>
                <a class="botonModal" href="../admin/admin.php"> No </a>
            </div>
        </section> <!-- / #main-content -->

<?php include 'common/pie.php' ?>

    </body>
</html>
<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/jquery.reveal.js" type="text/javascript"></script>
<script>
    var email;
    $(".editores").on("click", ".botonBorrar", function () {
        email = $(this).attr("id");
        $('#myModal').reveal({
            animation: 'fade', // fade, fadeAndPop, none
            animationspeed: 600, // how fast animtions are
            closeonbackgroundclick: true, // if you click background will modal close?
            dismissmodalclass: 'close'
        });
    });

    $("#siBorrar").on("click", function () {
        $url = "../services/servicesParseAdmin.php?&action=deleteEditor&email=" + email;
        $.get($url);

        alert("Editor eliminado.");
        window.location.href = "../admin/admin.php";
    });
</script>