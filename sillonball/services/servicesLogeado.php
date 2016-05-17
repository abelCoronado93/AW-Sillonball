<?php

session_start();

class servicesLogeado {

    public function editPerfil() {
        
        $servidor = "localhost";
        $userBD = "aw-local";
        $pass = "awpass";
        $database = "sillonball";
    	
	    if(isset($_POST['cropped-image-data'])){
	        $croppedData = json_decode($_POST["cropped-image-data"], true);
	        $originalImageInfo = $_FILES["imagen-perfil"];

	        if($originalImageInfo['error'] == UPLOAD_ERR_INI_SIZE){
	        	$_SESSION["error"] = "El tamaño del avatar es demasiado grande.";
				return '../editarPerfil.php';
	        } elseif($originalImageInfo['error'] != UPLOAD_ERR_OK){
	        	$_SESSION["error"] = "Error al subir el avatar";
				return '../editarPerfil.php';
	        }

	        $imgFormat = exif_imagetype($originalImageInfo["tmp_name"]);
	        if($imgFormat == IMAGETYPE_JPEG){
				$src = imagecreatefromjpeg($originalImageInfo["tmp_name"]);
	        } elseif($imgFormat == IMAGETYPE_PNG){

				$src = imagecreatefrompng($originalImageInfo["tmp_name"]);
	        } else{
	        	$_SESSION["error"] = "Formato del avatar no válido. Debe ser PNG o JPG";
				return '../editarPerfil.php';
	        }

	        $cropped = imagecreatetruecolor($croppedData["width"], $croppedData["height"]);
	        imagecopy($cropped, $src, 0, 0, $croppedData["x"], $croppedData["y"], $croppedData["width"], $croppedData["height"]);

	        $newname = md5("id_del_usurario".$originalImageInfo["tmp_name"]).'.png';
	        imagejpeg($cropped,  __DIR__.'/../assets/imagenes/avatares/'.$newname);

	        $_SESSION["avatar"] = $newname;
	    }
		require '../DAO/userDAO.php';
        
        $username = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_MAGIC_QUOTES);
        $usersurname = filter_input(INPUT_POST, 'Apellidos', FILTER_SANITIZE_MAGIC_QUOTES);
        $userdesc = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $mysqli = new mysqli($servidor, $userBD, $pass, $database);
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }

        $dao = new userDAO();
        
        $dao->updateUser($username, $usersurname, $userdesc, $mysqli);
        
        $mysqli->close();
        
        return '../perfil.php';
        
    }    
    
    public function logOut(){
        
        session_write_close();
        header('location: /index.php');
        exit();
    }
}
