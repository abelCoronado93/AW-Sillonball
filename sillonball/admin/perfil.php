<?php 
    session_start();
    require '../controller/adminController.php';
    $controller = new adminController();
    $usuario = $controller->getUserData($_SESSION["email"]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/perfil.css">


</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
        <div class="content">
            <div class="info">
                <p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?> </p>
                <p><strong>Apellidos:</strong> <?php echo $usuario['apellidos']; ?></p>
                <p><strong>Correo:</strong> <?php echo $usuario['email']; ?></p>
                <p><strong>Descripción:</strong> <?php echo $usuario['descripcion']; ?></p>
            </div>
            <div class="edita-boton">
                <a href="editarPerfil.php"><button class="form-button">Editar</button></a>
                <a href="../services/servicesParseAdmin.php?action=logOut"><button class="form-button">Cerrar sesión</button></a>
            </div>
        </div>
                            		
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>
