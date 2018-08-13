<?php

require_once(Link::include_file('clases/utilidad/DBO.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author maria ignacia
 */
class Paciente extends DBO{
    
    public $id;
    public $rut;
    public $nombre;
    public $fecha_nacimiento;
    public $telefono;
    public $email;
    public $region;
    public $ciudad;
    public $calle;
    public $numero_calle;
    
    
    function getNumero_calle() {
        return $this->numero_calle;
    }

    function setNumero_calle($numero_calle) {
        $this->numero_calle = $numero_calle;
    }
        
    function getCiudad() {
        return $this->ciudad;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

        function getId() {
        return $this->id;
    }

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }
    function getCalle() {
        return $this->calle;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    function getFechaFormatoChile(){
        $fecha = new DateTime($this->fecha_nacimiento);
        return $fecha->format('d/m/Y');
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function setCalle($calle) {
        $this->calle = $calle;
    }
    
    function getEdad(){
        $fechaNacimiento = new DateTime($this->getFecha_nacimiento());
        $diff = $fechaNacimiento->diff(new DateTime());
        return $diff->y;
    }
    
    public static function limpiarRut($rut){
        $rut = str_replace(".", "", $rut);
        return str_replace("-", "", $rut);
    }
    
    function getRegion() {
        return $this->region;
    }

    function setRegion($region) {
        $this->region = $region;
    }

        //put your code here
}
