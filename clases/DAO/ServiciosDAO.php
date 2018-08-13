<?php

require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Servicio.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiciosDAO
 *
 * @author enriq
 */
class ServiciosDAO extends BDconn {
    
    function __construct() {
        parent::__construct();
    }

    
    public function getAllServicios(){
        $consulta = $this->pdo->prepare("SELECT * from servicio;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        $arrServicios = $consulta->fetchAll(PDO::FETCH_CLASS,"Servicio");
        return $arrServicios;
    }
    
    public function getServicioByName($param){
        $param = "%".strtolower($param)."%";
        $consulta = $this->pdo->prepare("SELECT * from servicio WHERE LOWER(nombre) LIKE :param;");
        $respuesta = $consulta->execute(array(
            "param" => $param
        ));
        if(!$respuesta)
            return null;
        $arrServicios = $consulta->fetchAll(PDO::FETCH_CLASS,"Servicio");
        return $arrServicios;
    }
    
    public function eliminarServicioById($id){
        if(empty($this->getServicioById($id)))
            throw new Exception("No existe servicio a eliminar.");
        $sql = "DELETE FROM servicio WHERE id = :id";
        $consulta = $this->pdo->prepare($sql);
        $respuesta = $consulta->execute(array("id" => $id));
        if(!$respuesta)
            return false;
        return true;
    }
    
    public function getServicioById($id){
        $consulta = $this->pdo->prepare("SELECT * from servicio WHERE id = :id;");
        $respuesta = $consulta->execute(array(
            "id" => $id
        ));
        if(!$respuesta)
            return null;
        /*@var $servicio Servicio*/
        $servicio = $consulta->fetchObject("Servicio");
        return $servicio;
    }
    
    public function crearServicio(Servicio $servicio){
        $sm = new SQLManager($this->pdo, 'servicio', array('id'), $servicio);
        $sql = $sm->getInsert();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }
    
    public function editarServicio(Servicio $servicio){
        $sm = new SQLManager($this->pdo, 'servicio', array('id'), $servicio);
        $sql = $sm->getUpdate();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }
    
    public function getServiciosCombo(){
        $consulta = $this->pdo->prepare("SELECT id,nombre,precio from servicio;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function getServicioNameById($id){
        $consulta = $this->pdo->prepare("SELECT nombre from servicio WHERE id = :id;");
        $respuesta = $consulta->execute(array(
            "id" => $id
        ));
        if(!$respuesta)
            return null;
        return $consulta->fetchColumn();
    }
    //put your code here
}
