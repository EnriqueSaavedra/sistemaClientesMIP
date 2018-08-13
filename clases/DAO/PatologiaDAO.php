<?php


require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Patologia.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PatologiaDAO
 *
 * @author enriq
 */
class PatologiaDAO extends BDconn{
    
    
    function __construct() {
        parent::__construct();
    }

    
    public function getAllPatologias(){
        $consulta = $this->pdo->prepare("SELECT * from patologia;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        $arrPatologia = $consulta->fetchAll(PDO::FETCH_CLASS,"Patologia");
        return $arrPatologia;
    }
    
    public function getPatologiaByName($param){
        $param = "%".strtolower($param)."%";
        $consulta = $this->pdo->prepare("SELECT * from patologia WHERE LOWER(nombre) LIKE :param;");
        $respuesta = $consulta->execute(array(
            "param" => $param
        ));
        if(!$respuesta)
            return null;
        $arrPatologia = $consulta->fetchAll(PDO::FETCH_CLASS,"Patologia");
        return $arrPatologia;
    }
    
    public function eliminarPatologiaById($id){
        if(empty($this->getPatologiaById($id)))
            throw new Exception("No existe patologia a eliminar.");
        $sql = "DELETE FROM patologia WHERE id = :id";
        $consulta = $this->pdo->prepare($sql);
        $respuesta = $consulta->execute(array("id" => $id));
        if(!$respuesta)
            return false;
        return true;
    }
    
    public function getPatologiaById($id){
        $consulta = $this->pdo->prepare("SELECT * from patologia WHERE id = :id;");
        $respuesta = $consulta->execute(array(
            "id" => $id
        ));
        if(!$respuesta)
            return null;
        /*@var $patologia Patologia*/
        $patologia = $consulta->fetchObject("Patologia");
        return $patologia;
    }
    
    public function crearPatologia(Patologia $patologia){
        $sm = new SQLManager($this->pdo, 'patologia', array('id'), $patologia);
        $sql = $sm->getInsert();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }
    
    public function editarPatologia(Patologia $patologia){
        $sm = new SQLManager($this->pdo, 'patologia', array('id'), $patologia);
        $sql = $sm->getUpdate();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }

    //put your code here
}
