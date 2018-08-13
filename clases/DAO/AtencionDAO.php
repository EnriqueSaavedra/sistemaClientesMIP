<?php
require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Atencion.php'));

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtencionDAO
 *
 * @author enriq
 */
class AtencionDAO extends BDconn {
    
    function __construct() {
        parent::__construct();
    }
    
    public function getAtencionesDia(){
        $fechaActual = new DateTime();
        $consulta = $this->pdo->prepare("SELECT * from atencion WHERE fecha >= :today;");
        $respuesta = $consulta->execute(array(
                "today" => $fechaActual->format("Y-m-d")
        ));
        if(!$respuesta)
            return null;
        $arrAtenciones = $consulta->fetchAll(PDO::FETCH_CLASS,"Atencion");
        return $arrAtenciones;
    }
    
    /**
     * 
     * @param string $param
     * @return Paciente
     */
//    public function getAtencionByCliente($param){
//        $param = "%".strtolower(Paciente::limpiarRut($param))."%";
//        $consulta = $this->pdo->prepare("SELECT * from paciente WHERE LOWER(rut) LIKE :param;");
//        $respuesta = $consulta->execute(array(
//            "param" => $param
//        ));
//        if(!$respuesta)
//            return null;
//        /*@var $paciente Paciente*/
//        $paciente = $consulta->fetchObject("Paciente");
//        return $paciente;
//    }


    public function registrarAtencion(Atencion $atencion){
        $sm = new SQLManager($this->pdo, 'atencion', array('paciente_id','servicio_id','numero'), $atencion);
        $sql = $sm->getInsert();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }
}
