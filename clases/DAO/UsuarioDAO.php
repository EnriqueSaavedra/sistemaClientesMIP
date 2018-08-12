<?php

require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Usuario.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author enriq
 */
class UsuarioDAO extends BDconn{
    
    function __construct() {
        parent::__construct();
    }

    public function loginUsuario($email, $pass){
        $consulta = $this->pdo->prepare("SELECT * from usuario WHERE email = :email AND pass = MD5(:pass);");
        $respuesta = $consulta->execute(array(
            "email" => $email,
            "pass" => $pass
        ));
        if(!$respuesta)
            return false;
        /*@var $usuario Usuario*/
        $usuario = $consulta->fetchObject("Usuario");
        $usuario->setGrupoObj($this->getGrupoUsuario($usuario->getGrupo()));
        if(empty($usuario->getGrupoObj()->getNombre()))
            return false;
        $this->iniciarSesion($usuario);
        return true;
    }
    
    /**
     * 
     * @param Usuario $usuario
     */
    private function iniciarSesion($usuario){
        $_SESSION['USUARIO']['id'] = $usuario->getId();
        $_SESSION['USUARIO']['grupo'] = $usuario->getGrupo();
        $_SESSION['USUARIO']['email'] = $usuario->getEmail();
        $_SESSION['USUARIO']['nombre'] = $usuario->getNombre();
        $_SESSION['USUARIO']['CTX'] = 'AGENTE';
    }
    
    private function cerrarSesion(){
        session_destroy();
    }
    
    public function getGrupoUsuario($id){
        $consulta = $this->pdo->prepare("SELECT * from grupo_usuario WHERE id = :id;");
        $respuesta = $consulta->execute(array(
            "id" => $id
        ));
        if(!$respuesta)
            return null;
        /*@var $grupo GrupoUsuario*/
        $grupo = $consulta->fetchObject("GrupoUsuario");
        return $grupo;
    }
    //put your code here
}
