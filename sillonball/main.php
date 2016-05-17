<?php 
    session_start();
    require './controller/logueadoController.php';
    $controller = new logueadoController();
    $usuario = $controller->getUserData($_SESSION["email"]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sillonball</title>
    <link id="favicon" rel="icon" href="./assets/imagenes/iconos/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/catalogo.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>
 
<body>
    <?php include 'common/cabecera.php' ?>
 
    <section id="main-content">
	<article>
            <header>
                <h1>Últimas noticias</h1>
            </header>
                <img id="img-noticia" src="./assets/imagenes/JuegoDeTronos.jpg"/>
            <div class="content">
                <p>La sexta temporada de Juego de tronos sufrirá cierto retraso, sí, pero llegará antes de que acabe el mes de abril: en concreto el día 24, así que no podemos quejarnos en absoluto. La cadena HBO lo ha anunciado durante su presencia en la Television Critics Association Winter Press Tour de Pasadena. El estreno el próximo 17 de febrero de la nueva serie de Martin Scorsese titulada Vinyl, ha provocado el que este año Juego de Tronos tuviera que retrasar su vuelta que siempre se había producido un poco antes: a finales de marzo o mediados de abril.</p>
			     <iframe width="560" height="315" src="https://www.youtube.com/embed/tEec3pbctTg" frameborder="0" allowfullscreen></iframe>
                <p>No podemos decir lo mismo del trabajo de George R. R. Martin, que no cumplirá (de nuevo) los plazos pactados y por tanto no tendrá listo "Vientos de invierno" antes del estreno de la nueva tanda de episodios, así que si sois lectores avezados de los que prefieren pasar la mirada por las letras impresas antes de introducirse en la serie, en esta ocasión estaréis tentados a recibir enormes spoilers de las líneas generales de la próxima novela.</p>
            </div>
	</article> <!-- /article -->
    </section> <!-- / #main-content -->
    <section id="main-content">

    <div id="three-columns" class="grid-container">
        <h1> Te puede interesar </h1>
		<ul class="rig columns-3">
			<li>
				<img src="./assets/imagenes/caratulas/Jessica_Jones.jpg" />
			</li>
			<li>
				<img src="./assets/imagenes/caratulas/Silicon_Valley.jpg" />
			</li>
			<li>
				<img src="./assets/imagenes/caratulas/The_Walking_Dead.jpg">
			</li>
		</ul>
	</div>
    
    </section>
 	
    <?php include 'common/pie.php' ?>
    
</body>
</html>
