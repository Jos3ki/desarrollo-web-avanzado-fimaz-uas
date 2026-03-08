<?php

require_once 'Usuario.php';

/**
 * Clase Alumno.
 * Hereda de Usuario y añade propiedades específicas de un estudiante.
 *
 * @package Usuarios
 * @author Jose Carlos
 */
class Alumno extends Usuario {

    /**
     * @var string
     */
    private $vMatricula;

    /**
     * Constructor del Alumno.
     *
     * @param string $nombre
     * @param string $correo
     * @param string $matricula
     */
    public function __construct($nombre, $correo, $matricula)
    {
        parent::__construct($nombre, $correo);
        $this->vMatricula = $matricula;
    }

    /**
     * Obtiene el rol del usuario.
     *
     * @return string
     */
    public function getRol(){
        return "Alumno";
    }

    /**
     * Obtiene la matrícula del alumno.
     *
     * @return string
     */
    public function getMatricula(){
        return $this->vMatricula;
    }
}