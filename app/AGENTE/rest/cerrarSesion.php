<?php
require_once('./../../../clases/utilidad/Link.php');
require_once(Link::include_file('clases/utilidad/RestData.php'));
require_once(Link::include_file('clases/utilidad/PHPLogger.php'));
require_once(Link::include_file('clases/utilidad/Errores.php'));

session_start();    
$restData = new RestData();

try {
    session_destroy();
    $restData->data = array();
    $restData->success = true;
    $restData->returnRestData();
} catch (Exception $e) {
    $restData->success = false;
    $restData->data = array();
    $restData->mensaje = "Error Inesperado, favor informar.";
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);
    $restData->returnRestData();
}
?>