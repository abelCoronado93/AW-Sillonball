<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="../assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/editor.css">
    <link rel="stylesheet" href="../assets/css/catalogo.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
            <header>
                <h1>Catálogo</h1>
                <h4>El único contenido que está linkado es el de Daredevil, ya que esto es una versión de prueba.
                    En posteriores entregas todo el contenido tendrá el link referenciando a sus propios datos.
                </h4>
            </header>
            <select>
                    <option value="putuacion">Puntuación</option>
                    <option value="genero">Género</option>
                    <option value="titulo">Título</option>
            </select>
			
                <a href="addSerie.php"> 
                    <img class="botonCatalogoEditor" src="../assets/imagenes/iconos/iconoAdd.png" >
                </a>
            <div class="content">
                    <div id="three-columns" class="grid-container">
			<ul class="rig columns-3">
				<li>
                    <a href="serie.php"><img src="../assets/imagenes/caratulas/Daredevil2.jpg" />
                    
                    </a>
                    <a href="serie.php"><h3>Daredevil
                        <div class="botonesSerie">
                            <a href="editarSerie.php"> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3></a> 
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Vikingos.jpg" /></a>
					<h3>Vikingos
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Breaking_Bad.jpg" /></a>
					<h3>Breaking bad
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Juego_de_tronos.jpg" /></a>
					<h3>Juego de tronos
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Jessica_Jones.jpg" /></a>
					<h3>Jessica Jones
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Los_100.jpg" /></a>
					<h3>Los 100
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Pequenas_mentirosas.jpg" /></a>
					<h3>Pequeñas mentirosas
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/Silicon_Valley.jpg" /></a>
					<h3>Silicon Valley
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
				<li>
					<a><img src="../assets/imagenes/caratulas/The_Walking_Dead.jpg"></a>
					<h3>The walking dead
                    <div class="botonesSerie">
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoEditar.png" >
                            </a>
                            <a> 
                                <img class="botonSerieEditor" src="../assets/imagenes/iconos/iconoBorrar.png" >
                            </a>
                        </div>
                    </h3>
				</li>
			</ul>
		</div>
		<!--/#three-columns-->    
            </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
 	
     <?php include 'common/pie.php' ?>
</body>
</html>
