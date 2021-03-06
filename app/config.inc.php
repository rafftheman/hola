<?php

//Base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BASE', 'bd_escuela');

$conexion = new mysqli(NOMBRE_SERVIDOR, NOMBRE_USUARIO, PASSWORD, NOMBRE_BASE);

//Rutas de la web
define("SERVIDOR", "http://localhost/tarjetas");
define("INICIO", SERVIDOR . "/index.php");
define("INFORMACION", SERVIDOR."/info.php");

define("INICIOm", SERVIDOR . "/indexmaestros.php");
define("INFORMACIONm", SERVIDOR."/infomaestros.php");


define("CLAVE", "m._cl22@ddDPZ_ffDcc1!23ss");

function urlsegura($metodo, $valor){
    return $metodo . "=" . md5(CLAVE . $valor);
}