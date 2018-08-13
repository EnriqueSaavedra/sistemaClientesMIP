<?php
require_once(Link::include_file('clases/utilidad/DBO.php'));

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patologia
 *
 * @author maria ignacia
 */
class Patologia extends DBO{
    //put your code here
    public $id;
    public $nombre;
    public $detalle;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
    function getDetalleParcial(){
        if(strlen($this->getDetalle()) > 30)
            return substr($this->getDetalle(), 0, 30)."...";
        else
            return $this->getDetalle();
    }


}
