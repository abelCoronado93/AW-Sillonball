<?php

session_start();
require '../common/config.php';

class servicesLogeado {

    public function editPerfil() {

        //Check for errors
        if (isset($_POST['cropped-image-data']) && $_FILES['imagen-perfil']['tmp_name'] != '') {

            $croppedData = json_decode($_POST["cropped-image-data"], true);
            $originalImageInfo = $_FILES["imagen-perfil"];
            
            //Check max size
            if ($originalImageInfo['error'] == UPLOAD_ERR_INI_SIZE) {
                $_SESSION["error"] = "El tamaño del avatar es demasiado grande.";
                return '../editarPerfil.php';
                //Check generic errors
            } elseif ($originalImageInfo['error'] != UPLOAD_ERR_OK) {
                $_SESSION["error"] = "Error al subir el avatar";
                return '../editarPerfil.php';
            }

            //Get the mimeType
            $imgFormat = exif_imagetype($originalImageInfo["tmp_name"]);
            if ($imgFormat == IMAGETYPE_JPEG) {
                $src = imagecreatefromjpeg($originalImageInfo["tmp_name"]);
            } elseif ($imgFormat == IMAGETYPE_PNG) {

                $src = imagecreatefrompng($originalImageInfo["tmp_name"]);
            } else {
                $_SESSION["error"] = "Formato del avatar no válido. Debe ser PNG o JPG";
                return '../editarPerfil.php';
            }

            //Create an empty iamge with the width and height desired
            $cropped = imagecreatetruecolor($croppedData["width"], $croppedData["height"]);
            
            //Copy original image ($src) into new empty image ($cropped)
            imagecopy($cropped, $src, 0, 0, $croppedData["x"], $croppedData["y"], $croppedData["width"], $croppedData["height"]);

            //Creating a new unique name
            $newname = md5($_SESSION['email'] . $originalImageInfo["tmp_name"]) . '.jpg';
            
            //Saving $cropped into file as jpeg file
            imagejpeg($cropped, __DIR__ . '/../assets/imagenes/avatares/' . $newname);

            $_SESSION["avatar"] = $newname;
        }
        require '../DAO/userDAO.php';

        $username = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_MAGIC_QUOTES);
        $usersurname = filter_input(INPUT_POST, 'Apellidos', FILTER_SANITIZE_MAGIC_QUOTES);
        $userdesc = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_MAGIC_QUOTES);

        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);


	$mysqli->set_charset('utf8');

        if (mysqli_connect_errno()) {
            echo "Error de conexión a la BD: " . mysqli_connect_error();
            exit();
        }

        $dao = new userDAO();

        $dao->updateUser($username, $usersurname, $userdesc, $mysqli);

        $mysqli->close();

        return '../perfil.php';
    }

    public function logOut() {

        session_write_close();
        header('location: /index.php');
        exit();
    }

}
