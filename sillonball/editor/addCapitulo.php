<!DOCTYPE html>

<html>
    
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
</head>
 
<body>
    
    <h1>Nuevo capítulo</h1>
    
    <form>
        <!-- method="post" name="Aceptar" action="location.href='./serie-editor.php'"-->
        <p>Título</p>
        <input type="text" name= "Título"/>
        
        <p>Temporada</p>
        <select>
            <option value="">1</option>
            <option value="">2</option>
        </select>
        
        <p>Número de capítulo</p>
        <input type="text" name= "NCap"/>
        
        <p>Duración</p>
        <p><input type="text" name= "Duracion"/></p>
        
        
            <input class="form-button" type="button" name="Aceptar" value="Aceptar" onclick="location.href='./serie.php'">
            <!-- el tipo de boton de Aceptar se tiene que cambiar a Summit-->
            <button class="form-button" type="reset">Limpiar</button>
            <input class="form-button" type="button" name="Cancelar" value="Cancelar" onclick="location.href='./capitulo.php'">
    </form>
</body>
    
</html>
