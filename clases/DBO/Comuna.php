<?php
require_once(Link::include_file('clases/utilidad/DBO.php'));
require_once(Link::include_file('clases/DBO/Region.php'));

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comuna
 *
 * @author maria ignacia
 */
class Comuna extends DBO {
    private $id;
    private $nombre;
    private $region_id;
    
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getRegion_id() {
        return $this->region_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRegion_id($region_id) {
        $this->region_id = $region_id;
    }

        //put your code here
}
