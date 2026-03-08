<?php

require_once 'Usuario.php';

/**
 * Clase Alumno.
 * Hereda de Usuario.
 *
 * @package Usuarios
 * @author Jose Carlos
 */
class Alumno extends Usuario {
    
    /** @var string */
    private $vMatricula;

    /**
     * Constructor que reutiliza la validación del padre.
     */
    public function __construct($nombre, $correo, $matricula)
    {
        parent::__construct($nombre, $matricula);
        $this->vMatricula = $matricula;
    }

    /** @return string */
    public function getMatricula(){
        return $this->vMatricula;
    }

    /** @return string */
    public function getRol(){
        return "Alumno";
    }
}