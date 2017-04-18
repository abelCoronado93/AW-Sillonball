<?php session_start(); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Sillonball</title>
        <link id="favicon" rel="icon" href="assets/imagenes/iconos/favicon.png" type="image/png"/>
        <link rel="stylesheet" href="assets/css/reveal.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    </head>
    
    <body>
        <?php
        if(isset($_GET['error'])){
            echo '<script>alert("'.$_GET['error'].'")</script>';
        }
        ?>
        <div>
            <div id="titulo-portada">
                <h1>SillonBall</h1>
                <p>Haz el vago!</p>
            </div>
            <div id="botones">
                <a href="#" data-reveal-id="myModal">Entra</a>
                <a href="#" data-reveal-id="myModal2">Regístrate</a>
                <?php if(isset($_SESSION["error"])): ?>
                    <div class="error"><span class="fa fa-exclamation-triangle" aria-hidden="true"></span> <?php echo $_SESSION["error"] ?></div>
                    <?php unset($_SESSION["error"]) ?>
                <?php endif; ?>
            </div>
            <div id="myModal" class="reveal-modal">
                <h2 class="titulomodal">Entra</h2>
                <form action="services/servicesParse.php?action=doLogin" method="post">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <input type="text" name="username"><br>
                    <span class="fa fa-unlock-alt" aria-hidden="true"></span>
                    <input type="password" name="password"><br>
                    <button type="submit" value="Entrar">Entrar</button>
                </form>
            </div>
            <div id="myModal2" class="reveal-modal">
                <h2 class="titulomodal">Regístrate</h2>
                <form action="services/servicesParse.php?action=doRegister" method="post">
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
                        <input class="required" id="campoPass" type="password" name="password1">
                    </div>
                    
                    <div>
                        <label>Repita la contraseña</label>
                        <input class="required" id="campoPass2" type="password" name="password2">
                    </div>
                    <button id="boton" type="submit" disabled="true" value="Aceptar">Aceptar</button> 
                </form>  
            </div>
        </div>
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/jquery.reveal.js" type="text/javascript"></script>
        <script>	

        $("#campoPass, #campoPass2").change(function(){
            if(($("#campoPass").val() !== $("#campoPass2").val() &&
                    (($("#campoPass2").val()) !== "")) &&
                    (($("#campoPass").val()) !== "")){
                $("#campoPass").css("border", "solid");
                $("#campoPass").css("border-color", "#d83b3b");
                $("#campoPass2").css("border", "solid");
                $("#campoPass2").css("border-color", "#d83b3b");
                alert("Las contraseñas no coinciden");
            }
            else {
                $("#campoPass").css("border", "solid");
                $("#campoPass").css("border-color", "green");
                $("#campoPass2").css("border", "solid");
                $("#campoPass2").css("border-color", "green");
            }
	});
        $("#campoEmail").change(function(){
            if(($("#campoEmail").val().indexOf('@', 0) === -1 || $("#campoEmail").val().indexOf('.', 0) === -1) ){
                $("#campoEmail").css("border", "solid");
                $("#campoEmail").css("border-color", "#d83b3b");
                alert("Correo no válido");
            }
            else {
                $("#campoEmail").css("border", "solid");
                $("#campoEmail").css("border-color", "green");
            }
	});
        
        $(".required").change(function(){
            if(($("#campoNombre").val() !== "") &&
                    ($("#campoPass").val() !== "") &&
                    ($("#campoPass2").val() !== "") &&
                    ($("#campoEmail").val() !== "") &&
                    (!($("#campoEmail").val().indexOf('@', 0) === -1 || $("#campoEmail").val().indexOf('.', 0) === -1))&&
                    (($("#campoPass").val() === $("#campoPass2").val()))){
                        $('#boton').removeAttr('disabled');
                        $('#boton').css("cursor", "pointer");
                        $('#boton').css("background-color", "#d83b3b");
                    }
            else {
                $('#boton').attr('disabled', 'disabled');
                $('#boton').css("cursor", "default");
                $('#boton').css("background-color", "grey");
            }
        });

        </script>
    </body>
    
</html>
