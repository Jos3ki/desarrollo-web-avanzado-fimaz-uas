<?php

require_once 'Usuario.php';
class Alumno extends Usuario {

    private $Vmatricula;

    public function __construct($nombre, $correo, $matricula)
    {
        parent::__construct($nombre, $correo);
        $this->Vmatricula = $matricula;
    }

    public function getMatricula(){
        return $this->Vmatricula;
    }

    public function getRol(){
        return "Alumno";
    }
}