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
                        <input type="text" name="username">
                    </div>
                    
                    <div>
                        <label>Apellidos</label>
                        <input type="text" name="usersurname">
                    </div>
                    
                    <div>
                        <label>Correo electrónico</label>
                        <input type="text" name="useremail">
                    </div>
                    
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="password1">
                    </div>
                    
                    <div>
                        <label>Repita la contraseña</label>
                        <input type="password" name="password2">
                    </div>
                    <button type="submit" value="Aceptar">Aceptar</button> 
                </form>  
            </div>
        </div>
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/jquery.reveal.js" type="text/javascript"></script>
    </body>
    
</html>
