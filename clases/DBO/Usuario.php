<?php

require_once(Link::include_file('clases/utilidad/DBO.php'));
require_once(Link::include_file('clases/DBO/GrupoUsuario.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author enriq
 */
class Usuario extends DBO{
    
    public $id;
    public $nombre;
    public $email;
    private $pass;
    public $grupo;
    
    /*@var $grupoObj GrupoUsuario*/
    private $grupoObj;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getGrupo() {
        return $this->grupo;
    }

    /**
     * 
     * @return GrupoUsuario
     */
    function getGrupoObj() {
        return $this->grupoObj;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    
    /**
     * 
     * @param GrupoUsuario $grupo
     */
    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    function setGrupoObj($grupoObj) {
        $this->grupoObj = $grupoObj;
    }

    
    public function validarPass($pass){
        return md5($pass) == $this->pass;
    }
        
    
    //put your code here
}
