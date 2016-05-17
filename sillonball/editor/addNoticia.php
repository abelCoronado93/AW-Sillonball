<!DOCTYPE html>

<html>
    
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
</head>
 
<body>
    
    <h1>Nueva noticia</h1>
    
    <form>
        
        <p>Título</p>
        <input type="text" name= "Título"/>
        
        <p>Cuerpo</p>
        <p><textarea type="text" name= "Cuerpo"></textarea></p>
        
        <p><input type="file" /></p>
        
        <div>
            <input type="button" name="Aceptar" value="Aceptar" onclick="location.href='./main.php'">
            <!-- el tipo de boton de Aceptar se tiene que cambiar a Summit-->
            <button type="reset">Limpiar</button>
            <input type="button" name="Cancelar" value="Cancelar" onclick="location.href='./main.php'">
        </div>
    
    </form>
    
</body>
    
</html>
