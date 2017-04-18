<?php
    session_start();
	require '../controller/editorController.php';
    $controller = new editorController();
    $id = $_GET['id'];
    $thisSerie = $controller->getThisSerie($id);
   $_SESSION['id_serie'] = $thisSerie[0][0];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png">
</head>

<body>
    <h1>Editar serie</h1>
     <form method="post" action="../services/servicesParseEditor.php?action=editarSerie">
        <p>Carátula:</p>
        <input type="file" name="caratula"value="<?php echo $thisSerie[0][2]; ?>"/>
        
        <p>Titulo:</p>
        <input type="text" name="titulo" value="<?php echo $thisSerie[0][1]; ?>"/>
        
        <p>Año:</p>
        <input type="text" name="anyo" value="<?php echo $thisSerie[0][5]; ?>"/>
        
        <p>Género:</p>
        <input type="text" name="genero" value="<?php echo $thisSerie[0][3]; ?>"/>
        
        <p>Sinopsis: </p>
        <textarea type="text" name="sinopsis"> <?php echo $thisSerie[0][4]; ?></textarea>
        
        <p>Duración capítulos aprox:</p>    
        <p><input type="text" name="duracion" value="<?php echo $thisSerie[0][6]; ?>"/></p>
        
        <div>
            <button type="summit" name="Aceptar" value="Aceptar">Aceptar</button>
            <!-- el tipo de boton de Aceptar se tiene que cambiar a Summit-->
            <button type="reset">Limpiar</button>
            <input type="button" name="Cancelar" value="Cancelar" onclick="location.href='./catalogo.php'">
        </div>
    </form>
</body>
</html>