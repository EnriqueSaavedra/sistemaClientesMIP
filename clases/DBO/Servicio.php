<?php

require_once(Link::include_file('clases/utilidad/DBO.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servicio
 *
 * @author maria ignacia
 */
class Servicio extends DBO{
    public $id;
    public $nombre;
    public $detalle;
    public $precio;
    public $tiempo_estimado;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getTiempo_estimado() {
        return $this->tiempo_estimado;
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

    function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    function getPrecioDisplay(){
        return number_format($this->precio, 0, ',', '.');
    }

    function setTiempo_estimado($tiempo_estimado) {
        $this->tiempo_estimado = $tiempo_estimado;
    }

    function getDetalleParcial(){
        if(strlen($this->getDetalle()) > 30)
            return substr($this->getDetalle(), 0, 30)."...";
        else
            return $this->getDetalle();
    }
        //put your code here
}
