<?php

class usuario{
    private $ID;
    private $nombre;
    private $password;
    private $fecha_registro;
    private $activo;

public function __construct($ID, $nombre, $password, $fecha_registro, $activo){
        $this -> ID = $ID;
        $this -> nombre = $nombre;
        $this -> password = $password;
        $this -> fecha_registro = $fecha_registro;
        $this -> activo = $activo;

    }
    
    public function obtenerID(){
        return $this -> ID;
    }
    public function obtenerNombre(){
        return $this -> nombre;
    }
    public function obtenerPass(){
        return $this -> password;
    }
    public function obtenerFecha(){
        return $this -> fecha_registro;
    }
    public function obtenerActivo(){
        return $this -> activo;
    }

}
    

