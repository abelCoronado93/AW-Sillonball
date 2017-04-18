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
    <link  href="assets/css/cropper.min.css" rel="stylesheet">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
        <div class="content">
            
            <form method="post" action="../services/servicesParseAdmin.php?action=editPerfil" enctype="multipart/form-data">
            <div class="info">                
                <p><strong>Nombre</strong></p>
                
                <input class="form-input" type="text" name="Nombre" value="<?php echo $usuario['nombre'];?>" />
                
                <p><strong>Apellidos</strong></p>
                <input class="form-input" type="text" name="Apellidos" value="<?php echo $usuario['apellidos'];?>" />
                
                <!-- <p><strong>Correo</strong></p> 
                <input class="form-input" type="text" name= "Correo" value=<//?php echo $usuario['email'];?>/> -->
                
                <p><strong>Contraseña</strong></p> 
                <input class="form-input" type="password" name= "Correo" value="" placeholder=""/>
                
                <p><strong>Descripción</strong></p>
                <textarea class="form-input" type="text" name= "Descripcion" ><?php echo $usuario['descripcion'];?></textarea>
                
            </div>
            <div class="edita-boton">
                <input class="form-button" type="button" name="Atrás" value="Atrás" onclick="location.href='../perfil.php'"/>
                <button type="submit" class="form-button">Aceptar</button>
                
            </div>
            </form>
        </div>
                        	       		
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/cropper.min.js"></script>
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                    
                    $('#image').cropper({
                      aspectRatio: 1,
                      crop: function(e) {
                        $("#croppedData").val('{"x": '+e.x+', "y": '+e.y+', "width": '+e.width+', "height": '+e.height+'}');
                      }
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $(document).on('ready', function(){
            $('#img-perfil').on('change', function(){
                
                readURL(this);
                
            });
        });
       
    </script>
</body>
</html>
