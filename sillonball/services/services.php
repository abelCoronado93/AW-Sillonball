<?php

session_start();
require '../common/config.php';

class services {

    public function doLogin() {
        
        require '../DAO/userDAO.php';
        
        $useremail = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }

        $dao = new userDAO();
        
        $usuario = $dao->getUserByCorreo($useremail, $mysqli);
        
        $mysqli->close();
        
        if($usuario == null){
            $_SESSION["error"] = "Usuario o contraseña no válidos";
            return '../index.php';
        } elseif($usuario['role'] == 'admin' && password_verify($password, $usuario['password'])){
            $_SESSION["role"] = $usuario['role'];
            $_SESSION["email"] = $usuario['email'];
            if ($usuario['avatar'] != null)
                $_SESSION["avatar"] = $usuario['avatar'];
            $_SESSION["descripcion"] = $usuario['descripcion'];
            return '../admin/main.php';
            
        } elseif($usuario['role'] == 'editor' && password_verify($password, $usuario['password'])){
            $_SESSION["role"] = $usuario['role'];
            $_SESSION["email"] = $usuario['email'];
            if ($usuario['avatar'] != null)
                $_SESSION["avatar"] = $usuario['avatar']; 
             $_SESSION["descripcion"] = $usuario['descripcion'];
            return '../editor/main.php';
                
        } elseif($usuario['role'] == 'logeado' && password_verify($password, $usuario['password'])){
            $_SESSION["role"] = $usuario['role'];
            $_SESSION["email"] = $usuario['email'];
            if ($usuario['avatar'] != null)
                $_SESSION["avatar"] = $usuario['avatar'];
             $_SESSION["descripcion"] = $usuario['descripcion'];
            return '../main.php';
            
        } else {
            $_SESSION["error"] = "Usuario o contraseña no válidos";
            return '../index.php';
        }
    }
    
    public function doRegister(){
        
        require '../DAO/userDAO.php';
        
        $nombre = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $apellidos = filter_input(INPUT_POST, 'usersurname', FILTER_SANITIZE_MAGIC_QUOTES);
        $correo = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_MAGIC_QUOTES);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $role = "logeado";
        
        if ($password == $password2){
        
            $passHash = password_hash($password, PASSWORD_BCRYPT);
        
            $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
            $mysqli->set_charset('utf8');
        
            if ( mysqli_connect_errno() ) {
                echo "Error de conexión a la BD: ".mysqli_connect_error();
                exit();
            }
        
            $dao = new userDAO();
        
            $dao->insertNewUser($mysqli, $nombre, $apellidos, $correo, $passHash, $role);
            $mysqli->close();
            if(!isset($_SESSION["error"]) && $_SESSION["error"] != "Usuario existente"){
                $_SESSION["role"] = $role;
                $_SESSION["email"] = $correo;
            
                return '../main.php';
            }
            return '../index.php';
           
        }
        
        else {
            $_SESSION["error"] = "Las contraseñas no coinciden";
            return '../index.php';
        }
    }
    
    public function logOut(){
        
        session_destroy();
        return '../index.php';
    }
    
    public function ordenarTitulo(){
       
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require '../DAO/catalogoDAO.php';
        $dao = new catalogoDAO();
        
        $series = $dao->getAllSeriesTitulo($mysqli);
        $seriesJson = json_encode($series);
        $mysqli->close();
        
            echo $seriesJson;    
        
    }
    
    public function ordenarPunt(){
   
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require '../DAO/catalogoDAO.php';
        $dao = new catalogoDAO();
        
        $series = $dao->getAllSeries($mysqli);
        $seriesJson = json_encode($series);
        $mysqli->close();
        
            echo $seriesJson;
        
    }


    public function addList(){
                
        require '../DAO/listasDAO.php';
        
        $nombreLista = filter_input(INPUT_POST, 'listName', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
            if ( mysqli_connect_errno() ) {
                echo "Error de conexión a la BD: ".mysqli_connect_error();
                exit();
            }
        
            $dao = new listasDAO();
        
            $dao->insertNewList($mysqli,  $_SESSION["email"], $nombreLista);
            $mysqli->close();
          
            return '../listas.php';
           
        }
    
    
    public function doComent(){
            $idCap = $_GET["idCap"];
            require_once '../DAO/comentarioDAO.php';
            
            $contenido = filter_input(INPUT_POST, 'nuevoComentario', FILTER_SANITIZE_MAGIC_QUOTES);
            
            if (!empty($contenido)) {
                $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
                $mysqli->set_charset('utf8');
                
                if ( mysqli_connect_errno() ) {
                    echo "Error de conexión a la BD: ".mysqli_connect_error();
                    exit();
                }
        
                $dao = new comentarioDAO();
                $dao->insertComent($mysqli, $idCap, $_SESSION["email"], $contenido);
                $mysqli->close();
                
                echo "comentario hecho!";
                return '../capitulo.php?idCap='.$idCap;
                
            }
            
        }
        
        public function doPuntuar(){
                        
            require_once '../DAO/userCapDAO.php';
            $dao = new userCapDAO();
            
            $idCap = $_GET["idCap"];
            
            $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
            $mysqli->set_charset('utf8');
            if ( mysqli_connect_errno() ) {
                echo "Error de conexión a la BD: ".mysqli_connect_error();
                exit();
            }
        
            $dao->puntuar($mysqli, $_SESSION["email"], $idCap, $_POST['puntuacion']);
            $mysqli->close();

            return '../capitulo.php?idCap='.$idCap;
        }
        
        public function addSerieALista(){
                   
            require '../DAO/listasDAO.php';
        
            $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
            $mysqli->set_charset('utf8');
        
            if ( mysqli_connect_errno() ) {
                echo "Error de conexión a la BD: ".mysqli_connect_error();
                exit();
            }
        
            $dao = new listasDAO();
        
            
            $dao->addSerieALista($mysqli, $_GET["serie"], $_GET["lista"]);
            $mysqli->close();
            
            return '../miLista.php?idCap='.$_GET["lista"];
        }
    
    public function doVisto(){
        
        require_once '../DAO/userCapDAO.php';
        $dao = new userCapDAO();

        $idCap = $_GET["idCap"];

        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }

        $dao->visto($mysqli, $_SESSION["email"], $idCap);
        $mysqli->close();

        return '../capitulo.php?idCap='.$idCap;
    }
        
}
    
  