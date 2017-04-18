<?php
require '../common/config.php';

class editorController {

	public function __construct(){
		if(!isset($_SESSION['role']) || $_SESSION['role'] != 'editor'){
			session_destroy();
			header('Location: ../index.php');
			exit();
		}
	}
    
    public function getUserData($useremail){

        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/userDAO.php';
        $dao = new userDAO();
        
        $usuario = $dao->getUserByCorreo($useremail, $mysqli);
        
        
        $mysqli->close();
        
        return $usuario;
    }
     public function getCatalogo(){

        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/catalogoDAO.php';
        $dao = new catalogoDAO();
        
        $series = $dao->getAllSeries($mysqli);
         
        
        $mysqli->close();
        
        return $series;
     }
    
    public function getThisSerie($id){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/serieDAO.php';
        $dao = new serieDAO();
        
        $thisSerie = $dao-> getThisSerie($id, $mysqli);
       
        
        $mysqli->close();
        
        return $thisSerie;
        
    }
    
      public function getAllTemp($id){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/serieDAO.php';
        $dao = new serieDAO();
        
        $temp = $dao-> getAllTemp($id, $mysqli);
         
        
        $mysqli->close();
        
        return $temp;
        
    }
    
    public function getCapsByTemp($idTemp){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/serieDAO.php';
        $dao = new serieDAO();
        
        $temp = $dao-> getCapsByTemp($idTemp, $mysqli);
       
        
        $mysqli->close();
        
        return $temp;
        
    }
    
    public function getInfoCapitulo ($idC){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/capituloDAO.php';
        $dao = new capituloDAO();
        
        $infoCapitulo = $dao->getInfoCapitulo($mysqli, $idC);
        
        
        $mysqli->close();
        
        return $infoCapitulo;
    }
    
    public function getInfoTemp ($idT){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
	$mysqli->set_charset('utf8');
        
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/capituloDAO.php';
        $dao = new capituloDAO();
        
        $infoTemp = $dao->getTemporada($mysqli, $idT);
       
        
        $mysqli->close();
        
        return $infoTemp;
    }
    
    public function getInfoSerie ($idS){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
	$mysqli->set_charset('utf8');
        
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/capituloDAO.php';
        $dao = new capituloDAO();
        
        $infoSerie = $dao->getNombreSerie($mysqli, $idS);
       
        
        $mysqli->close();
        
        return $infoSerie;
    }
    
    public function getUserCapitulo ($idU){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        $mysqli->set_charset('utf8');
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/userCapDAO.php';
        $dao = new userCapDAO();
        
        $uCap = $dao->getUserCap($mysqli, $idU);

        
        $mysqli->close();
        
        return $uCap;
    }
    
    public function getComentarios ($idC){
        
        $mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
	$mysqli->set_charset('utf8');
        
        
        if ( mysqli_connect_errno() ) {
            echo "Error de conexión a la BD: ".mysqli_connect_error();
            exit();
        }
        
        require_once '../DAO/comentarioDAO.php';
        $dao = new comentarioDAO();
        
        $comentarios = $dao->getComentarios($mysqli, $idC);
        $mysqli->close();
        
        return $comentarios;
    }
    
}