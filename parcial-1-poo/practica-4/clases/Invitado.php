<?php

require_once 'Usuario.php';
/**
 * Clase Invitado.
 * Hereda de Usuario.
 *
 * @package Usuarios
 * @author Jose Carlos
 */
class Invitado extends Usuario {

    /** @var string */
    private $vEmpresa;

    /**
     * Constructor que reutiliza la validación del padre.
     * @param string $nombre
     * @param string $correo
     * @param string $empresa
     */
    public function __construct($nombre, $correo, $empresa)
    {
        parent::__construct($nombre, $correo);
        $this->vEmpresa = $empresa;
    }

    /** @return string */
    public function getEmpresa() {
        return $this->vEmpresa;
    }

    /** @return string */
    public function getRol(){
        return "Invitado";
    }
}