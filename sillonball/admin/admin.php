<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
 
<body>
    
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
        <h1>Admin</h1>
        
        <p>Nuestro rol 'admin' gestionará únicamente los roles de usuarios (editor, usuario autenticado)</p>
    
        <form>
            <label>Nuevo editor</label>
            <input list="nuevoeditor" name="list" />
            <datalist id="nuevoeditor">
                <option label="acoronad@ucm.es" value="Abel">
                <option label="mcasta01@ucm.es" value="María">
                <option label="juanlur@ucm.es" value="Juanlu">
                <option label="carlospi@ucm.es" value="Piña">
            </datalist>
            
            <button>Aceptar</button>
            
        </form>
        
        
        <ul>
            <h4><b>Editores</b></h4>
            <li>Abel Coronado</li>
            <li>Carlos Piña</li>
        </ul>
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>
