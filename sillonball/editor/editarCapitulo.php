<?php
    session_start();
    require '../controller/editorController.php';
    $controller = new editorController();
    $id = $_GET['id'];
    $idS = $_GET['idSerie'];
    $thisCapitulo = $controller->getInfoCapitulo($id);
    $temporadas = $controller->getAllTemp($idS);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png">
</head>

<body>
    <h1>Editar capítulo </h1>
     <?php echo '<form method="post" action="../services/servicesParseEditor.php?action=editarCapitulo&idCap='.$id.'&idS='.$idS.'" enctype="multipart/form-data">' ?>
        <p>Titulo:</p>
        <input type="text" name="titulo"value="<?php echo $thisCapitulo[0][2]; ?>"/>
        
        <p>Temporada</p>
        <?php
            echo '<select name="numTemporada">';
            foreach($temporadas as $temporada){
                echo '<option ';
                if($thisCapitulo[0][1] === $temporada[1]){echo 'selected';};
                echo' id="numTemp" value="'.$temporada[1].'">'.$temporada[2];
            }
            echo '</select>'
        ?>
        
        <p>Número de capítulo:</p>
        <input type="text" name="numCap" value="<?php echo $thisCapitulo[0][4]; ?>"/>
        
        <p>Duración:</p>
        <input type="text" name="duracion" value="<?php echo $thisCapitulo[0][5]; ?>"/>
        
        <div>
            <button type="summit" name="Aceptar" value="Aceptar">Aceptar</button>
            <button type="reset">Limpiar</button>
            <input type="button" name="Cancelar" value="Cancelar" 
                   onclick="location.href='./capitulo.php?idCap='<?php $id ?>">
        </div>
    </form>
</body>
</html>
