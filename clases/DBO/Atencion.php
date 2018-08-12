<?php
require_once(Link::include_file('clases/utilidad/DBO.php'));

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Atencion
 *
 * @author maria ignacia
 */
class Atencion extends DBO{
    private $paciente_id;
    private $servicio_id;
    private $numero;
    private $descripcion;
    private $precio;
    private $fecha;
    
    function getPaciente_id() {
        return $this->paciente_id;
    }

    function getServicio_id() {
        return $this->servicio_id;
    }

    function getNumero() {
        return $this->numero;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setPaciente_id($paciente_id) {
        $this->paciente_id = $paciente_id;
    }

    function setServicio_id($servicio_id) {
        $this->servicio_id = $servicio_id;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

        
    //put your code here
}
