<?php
require_once(Link::include_file('clases/utilidad/UserException.php'));
require_once(Link::include_file('clases/utilidad/MensajeSistema.php'));
require_once(Link::include_file('clases/utilidad/Errores.php'));
require_once(Link::include_file('clases/utilidad/PHPLogger.php'));
require_once(Link::include_file('clases/utilidad/Debuger.php'));
require_once(Link::include_file('clases/utilidad/HtmlUtiles.php'));
require_once(Link::include_file('clases/DAO/UsuarioDAO.php'));
/*
 * Metodos globales
 */
       
date_default_timezone_set('America/Santiago');
function printArray($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function unicode2html($str){
    return str_replace("u00f3", "ó", $str);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	
        <title>Login Podologia MIP</title>	

       <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Web Fonts  -->
        <link href="recursos/imagenes/LogoPies.png" rel="shortcut icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
        <link rel="stylesheet" href="recursos/css/login.css">
        <link rel="stylesheet" href="recursos/css/bootstrap-select.min.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="recursos/css/theme.css">
        <!-- Skin CSS -->
        <link rel="stylesheet" href="recursos/css/skins/default.css">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="recursos/css/custom.css">
        <!-- Head Libs -->
        <!-- Vendor -->
        <script src="recursos/js/jquery.min.js"></script>
        <script src="recursos/js/bootstrap.min.js"></script>
        <script src="recursos/js/bootstrap-select.min.js"></script>
        <script src="recursos/js/jquery.rut.min.js"></script>
        
        <script src="recursos/js/theme.js"></script>
        <!-- Current Page Vendor and Views -->
        <script src="recursos/js/views/view.home.js"></script>
        <script src="recursos/js/bootstrap-notify-master/bootstrap-notify.min.js"></script>
        <!-- Theme Custom -->
        <script src="recursos/js/custom.js"></script>
        <!-- Theme Initialization Files -->
        <script src="recursos/js/theme.init.js"></script>
        <!-- Google Analytics -->

        <script src="recursos/js/jquery.rut.min.js"></script>
    </head>
    <body>
        <div class="container">