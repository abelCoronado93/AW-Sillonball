<?php

class userDAO {
    
    public function getUserByCorreo($useremail, $mysqli){

        $query = sprintf("SELECT * FROM usuarios WHERE email = '$useremail'", $mysqli->real_escape_string($useremail));
            
        $rs = $mysqli->query($query)
            or die ($mysqli->error. " en la línea ".(__LINE__-1));
        
        $result = null;
        while($row = $rs->fetch_assoc()){
            $result = $row;
        }

        $rs->free();
        
         return $result;
    }
    
    public function insertNewUser($mysqli, $nombre, $apellidos, $correo, $passHash, $role) {
        
        $query = sprintf("SELECT * FROM usuarios WHERE email = '$correo'", $mysqli->real_escape_string($correo));
        
        $rs = $mysqli->query($query)
            or die ($mysqli->error. " en la línea ".(__LINE__-1));
        
        $result = null;
        while($row = $rs->fetch_assoc()){
            $result = $row;
        }

        $rs->free();
        
        if($result == null){
            $sql = "INSERT INTO usuarios (nombre, email, apellidos, password, role) 
                VALUES ('".$nombre."','".$correo."','". $apellidos."','". $passHash."','".$role."')";
        
            $mysqli->query($sql)
                or die ($mysqli->error. " en la línea ".(__LINE__-1));
        }
        
        else {
            $_SESSION["error"] = "Usuario existente"; 
        } 
    }
    
    public function updateUser($username, $usersurname, $userdesc, $mysqli){
        
        $sql = "UPDATE usuarios 
                SET nombre = '".$username."', apellidos = '".$usersurname."', 
                    avatar = '".$_SESSION["avatar"]."', descripcion = '".$userdesc."'
                WHERE email = '".$_SESSION["email"]."'";
        
        $mysqli->query($sql)
                or die ($mysqli->error. " en la línea ".(__LINE__-1));
    }
    
}
    
    
    
    