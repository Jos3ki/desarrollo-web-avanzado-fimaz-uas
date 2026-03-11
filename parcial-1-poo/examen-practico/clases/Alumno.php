<?php

require_once 'Usuario.php';

/**
 * Clase Alumno.
 * Hereda de la clase base usuario 
 *
 * @package Usuarios
 * @author Jose Carlos Castillo Padilla
 */
class Alumno extends Usuario {

    /**
     * @var string nuermo de matricula.
     */
    private $Vmatricula;


    /**
     * Constructor de la clase Alumno.
     * Reutiliza el constructor del padre para aplicar la validación del correo
     *
     * @param string $nombre Nombre del alumno
     * @param string $correo Correo electrónico (validado en la clase base)
     * @param string $matricula Matrícula del alumno
     */
    public function __construct($nombre, $correo, $matricula)
    {
        parent::__construct($nombre, $correo);
        $this->Vmatricula = $matricula;
    }

    /**
     * Obtiene la matrícula del alumno
     *
     * @return string Retorna la matrícula
     */
    public function getMatricula(){
        return $this->Vmatricula;
    }

    /**
     * Obtiene el rol específico del usuario.
     *
     * @return string
     */
    public function getRol(){
        return "Alumno";
    }
}