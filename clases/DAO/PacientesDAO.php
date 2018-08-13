<?php
require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Paciente.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientesDAO
 *
 * @author enriq
 */
class PacientesDAO extends BDconn {
    
    function __construct() {
        parent::__construct();
    }
    
    public function getAllPacientes(){
        $consulta = $this->pdo->prepare("SELECT * from paciente;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        $arrPacientes = $consulta->fetchAll(PDO::FETCH_CLASS,"Paciente");
        return $arrPacientes;
    }
    
    public function getPacienteNameById($id){
        $consulta = $this->pdo->prepare("SELECT nombre from paciente WHERE id = :id;");
        $respuesta = $consulta->execute(array(
            "id" => $id
        ));
        if(!$respuesta)
            return null;
        return $consulta->fetchColumn();
    }
    
    /**
     * 
     * @param string $param
     * @return Paciente
     */
    public function getPacienteByRut($param){
        $param = "%".strtolower(Paciente::limpiarRut($param))."%";
        $consulta = $this->pdo->prepare("SELECT * from paciente WHERE LOWER(rut) LIKE :param;");
        $respuesta = $consulta->execute(array(
            "param" => $param
        ));
        if(!$respuesta)
            return null;
        /*@var $paciente Paciente*/
        $paciente = $consulta->fetchObject("Paciente");
        return $paciente;
    }
    
    public function getPacienteByName($param){
        $param = "%".strtolower($param)."%";
        $consulta = $this->pdo->prepare("SELECT * from paciente WHERE LOWER(nombre) LIKE :param;");
        $respuesta = $consulta->execute(array(
            "param" => $param
        ));
        if(!$respuesta)
            return null;
        $arrPaciente = $consulta->fetchAll(PDO::FETCH_CLASS,"Paciente");
        return $arrPaciente;
    }
    
    /**
     * 
     * @param type $id
     * @return Paciente
     */
    public function getPacienteById($id){
        $consulta = $this->pdo->prepare("SELECT * from paciente WHERE id = :id;");
        $respuesta = $consulta->execute(array(
            "id" => $id
        ));
        if(!$respuesta)
            return null;
        /*@var $paciente Paciente*/
        $paciente = $consulta->fetchObject("Paciente");
        return $paciente;
    }
    
    private function clearCamposDir($id){
        $sql = "UPDATE paciente SET region = NULL, ciudad = NULL, calle = NULL, numero_calle = NULL WHERE id = $id";
        $consulta = $this->pdo->prepare($sql);  
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return false;
        return true;
    }

    public function crearPaciente(Paciente $paciente){
        $pacienteExistente = $this->getPacienteByRut($paciente->getRut());
        if(!empty($pacienteExistente))
            throw new UserException("El cliente ya existe, favor buscar por: ".$pacienteExistente->getNombre(), UserException::WARNING);
        $sm = new SQLManager($this->pdo, 'paciente', array('id'), $paciente);
        $sql = $sm->getInsert();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }
    
    public function editarPaciente(Paciente $paciente){
        $this->clearCamposDir($paciente->getId());
        $sm = new SQLManager($this->pdo, 'paciente', array('id'), $paciente);
        $sql = $sm->getUpdate();
        $query = $this->pdo->query($sql);
        if(!$query || $query->rowCount() <= 0)
            return false;
        return true;
    }
    
    public function getPacientesCombo(){
        $consulta = $this->pdo->prepare("SELECT id,CONCAT(rut,' - ',nombre) as nombre from paciente;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
