<?php

include_once 'RepositorioUsuario.inc.php';

class ValidarID {

    private $aviso_inicio;
    private $aviso_cierre;
    private $ID;
    private $pass;
    private $error_pass;

    public function __construct($ID, $pass, $conexion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger alert-sm' role='alert'>";
        $this->aviso_cierre = "</div>";



        $this->pass = "";
        $this->error_pass = $this->validar_vacio($ID, $pass, $conexion);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    //NUeva validación
    private function validar_vacio($ID, $pass, $conexion){
        if(!$this->variable_iniciada($pass) || !$this->variable_iniciada($ID)){
            return "Ambos campos son obligatorios";
        }
        if (!RepositorioUsuario :: id_existe($conexion, $ID)) {
            return "No se encontró el ID";
        }
        if(!RepositorioUsuario :: ValidarIngreso($ID, $pass, $conexion)){
            return "La contraseña es incorrecta";
        }
        else{
            $this-> ID = $ID;
            $this-> pass = $pass;
        }
        return "";
    }
    
    
    public function obtener_cosas() {
        return $this->ID;
        return $this->pass;
        
    }

    public function obtener_error_cosas() {
        return $this->error_pass;
    }

    public function mostrar_error_cosas() {
        if ($this->error_pass !== '') {
            echo $this->aviso_inicio . $this->error_pass . $this->aviso_cierre;
        }
    }
    
    public function obtener_id() {
        return $this->ID;
    }
    
    public function mostrar_error_cosas1() {
        if ($this->error_pass !== '') {
            echo $this->error_pass;
        }
    }
    //Nueva validación

    //Inicia lo de la contraseña
   /* private function validar_pass($ID, $pass, $conexion) {
        if (!$this->variable_iniciada($pass)) {
            return "Debes insertar la contraseña";
        } else {
            $this->pass = $pass;
        }
        if(!RepositorioUsuario :: ValidarIngreso($ID, $pass, $conexion)){
            return "Incorrecto";
        }
        return "";
    }
    


    public function obtener_pass() {
        return $this->pass;
    }

    public function obtener_error_pass() {
        return $this->error_pass;
    }

    public function mostrar_error_pass() {
        if ($this->error_pass !== '') {
            echo $this->aviso_inicio . $this->error_pass . $this->aviso_cierre;
        }
    }

//Termina lo de la pass
    private function validar_id($conexion, $ID) {
        if (!$this->variable_iniciada($ID)) {
            return "Debes insertar un ID";
        } else {
            $this->ID = $ID;
        }
        if (!RepositorioUsuario :: id_existe($conexion, $ID)) {
            return "No se encontró el ID";
        }
        return "";
    }

    public function obtener_id() {
        return $this->ID;
    }

    public function obtener_error_id() {
        return $this->error_id;
    }

    public function mostar_id() {
        if ($this->ID !== "") {
            echo 'value"' . $this->ID . '"';
        }
    }

    public function mostrar_error_id() {
        if ($this->error_id !== '') {
            echo $this->aviso_inicio . $this->error_id . $this->aviso_cierre;
        }
    }

    //Alternativa
    public function mostrar_error_id2() {
        if ($this->error_id !== '') {
            echo $this->error_id;
        }
    }*/

    public function id_valido() {
        if ($this->error_pass === "") {
            return true;
        } else {
            return false;
        }
    }

}
