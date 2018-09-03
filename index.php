<?php
ob_start();
session_start();
require_once('./clases/utilidad/Link.php');
//HEADER
if(isset($_SESSION['USUARIO'])){
    require_once(Link::include_file('app/'.$_SESSION['USUARIO']['CTX'].'/header.php'));
}else{
    require_once(Link::include_file('app/PUBLIC/header.php'));
}
//BODY
//debería considerar parametros extra
$ctx = isset($_GET["ctx"]) ? $_GET["ctx"] : null;
$app = isset($_GET["app"]) ? $_GET["app"] : null;
try{
    if(!file_exists(Link::include_file(Link::getRuta($ctx,$app)))){
        throw new Exception("Error al obtener: ".Link::getRuta($ctx,$app));
    }
    require_once(Link::include_file(Link::getRuta($ctx,$app)));
} catch (Exception $ex) {
    require_once(Link::include_file(Link::getRuta(null,null)));
}
//FOOTER
if(isset($_SESSION['USUARIO'])){
    require_once(Link::include_file('app/'.$_SESSION['USUARIO']['CTX'].'/footer.php'));
}else{
    require_once(Link::include_file('app/PUBLIC/footer.php'));
}
ob_flush();
?>