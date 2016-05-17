<?php

class logueadoController {
    
    public function getUserData($useremail){
        
        $servidor = "localhost";
        $userBD = "aw-local";
        $pass = "awpass";
        $database = "sillonball";

        $mysqli = new mysqli($servidor, $userBD, $pass, $database);
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require './DAO/userDAO.php';
        $dao = new userDAO();
        
        $usuario = $dao->getUserByCorreo($useremail, $mysqli);
        
        $mysqli->close();
        
        return $usuario;
    }
    
}