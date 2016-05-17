<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
        <header>
            <h1>Contacto</h1>
        </header>
        <div id="form-contacto">
            <form  action="mailto:sillonball@gmail.com" method="post">
                <p class="form-p">Nombre </p>
                <input class="form-input" type="text" name= "Nombre" value="" placeholder="Pablo Escobar"/>
                
                <p class="form-p">Email </p>
                <input class="form-input" type="email" name= "Email" value="" placeholder="farlopa@colombia.co"/>
                
                <dl>
                    <dt>Motivo de consulta</dt>
                    <dt><input type="radio" name="motivo" value="evaluacion"> Evaluación</dt>
                    <dt><input type="radio" name="motivo" value="sugerencias"> Sugerencias</dt>
                    <dt><input type="radio" name="motivo" value="criticas"> Críticas</dt>
                </dl>
                
                <p class="form-p">Redacte su consulta</p>
                <textarea class="form-input" name="motivoConsulta" rows="4" cols="80"></textarea>
                <p id="terminos"><input type="checkbox" name="aceptarTerminos" value="on"/> He leído los términos y condiciones del servicio. </p>
                
                <input class="form-button" type="submit" name="enviar" value="Enviar" />
                <input class="form-button" type="reset" name="borrar" value="Borrar" />

            </form>
        </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>
