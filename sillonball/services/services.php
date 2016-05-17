<?php

session_start();

class services {

    public function doLogin() {
        
        $servidor = "localhost";
        $userBD = "aw-local";
        $pass = "awpass";
        $database = "sillonball";

        require '../DAO/userDAO.php';
        
        $useremail = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $mysqli = new mysqli($servidor, $userBD, $pass, $database);
        
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
            return '../admin/main.php';
            
        } elseif($usuario['role'] == 'editor' && password_verify($password, $usuario['password'])){
            $_SESSION["role"] = $usuario['role'];
            $_SESSION["email"] = $usuario['email'];
            if ($usuario['avatar'] != null)
                $_SESSION["avatar"] = $usuario['avatar'];    
            return '../editor/main.php';
                
        } elseif($usuario['role'] == 'logeado' && password_verify($password, $usuario['password'])){
            $_SESSION["role"] = $usuario['role'];
            $_SESSION["email"] = $usuario['email'];
            if ($usuario['avatar'] != null)
                $_SESSION["avatar"] = $usuario['avatar'];                    
            return '../main.php';
            
        } else {
            $_SESSION["error"] = "Usuario o contraseña no válidos";
            return '../index.php';
        }
    }
    
    public function doRegister(){
        
        $servidor = "localhost";
        $userBD = "aw-local";
        $pass = "awpass";
        $database = "sillonball";
        
        require '../DAO/userDAO.php';
        
        $nombre = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $apellidos = filter_input(INPUT_POST, 'usersurname', FILTER_SANITIZE_MAGIC_QUOTES);
        $correo = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_MAGIC_QUOTES);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_MAGIC_QUOTES);
        
        //Al registrarte por 1ª vez no tienes permisos -> user normal
        $role = "logeado";
        
        if ($password == $password2){
        
            $passHash = password_hash($password, PASSWORD_BCRYPT);
        
            $mysqli = new mysqli($servidor, $userBD, $pass, $database);
        
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
}
