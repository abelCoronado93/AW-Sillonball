<?php
    session_start();
    require '../controller/editorController.php';
    $controller = new editorController();
    $id = $_GET['id'];
    $temporadas = $controller->getAllTemp($id);
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
</head>
 
<body>
    
    <h1>Nuevo capítulo</h1>
    
    <?php echo '<form action="../services/servicesParseEditor.php?action=addCapitulo&idSerie='.$id.'" method="post" enctype="multipart/form-data">' ?>
        <p>Título</p>
        <input type="text" name="titulo"/>
        
        <p>Temporada</p>
        <?php
            echo '<select name="numTemporada">';
            foreach($temporadas as $temporada){
                echo '<option value="'.$temporada[1].'">'.$temporada[2];
            }
            echo '</select>'
        ?>
        
        <p>Número de capítulo</p>
        <input type="text" name= "numeroCapitulo"/>
        
        <p>Duración</p>
        <p><input type="text" name= "duracion"/></p>
        
        
            <button type="summit" name="Aceptar" value="Aceptar">Aceptar</button>
            <!-- el tipo de boton de Aceptar se tiene que cambiar a Summit-->
            <button class="form-button" type="reset">Limpiar</button>
            <input class="form-button" type="button" name="Cancelar" value="Cancelar" onclick="location.href='./capitulo.php'">
    </form>
</body>
    
</html>
