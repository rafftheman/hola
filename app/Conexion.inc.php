<?php

class Conexion {

    private static $conexion;

    public static function abrir_conexion() {
        if (!isset(self::$conexion)) {
            try {
                include_once 'config.inc.php';
                
                self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR. '; dbname='.NOMBRE_BASE, NOMBRE_USUARIO, PASSWORD);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec("SET CHARACTER SET utf8");

            } catch (PDOException $exc) {
                print 'ERROR: ' . $exc -> getMessage() . "<br>";
                die();
            }
        }
    }
    
    public function cerrar_conexion(){
        if(isset(self::$conexion)){
            self::$conexion = null;

        }
    }
    
    public static function obtener_conexion(){
        return self::$conexion;
    }

}
