<?php

/**
 * Clase base Usuario.
 * Gestiona los datos principales y valida el formato del correo electrónico.
 *
 * @package Usuarios
 * @author Jose Carlos
 */
class Usuario {

    /**
     * @var string
     */
    private $vNombre;

    /**
     * @var string
     */
    private $vCorreo;

    /**
     * Constructor que inicializa y valida al usuario.
     *
     * @param string $nombre
     * @param string $correo
     * @throws Exception Si el correo no es válido.
     */
    public function __construct($nombre, $correo)
    {
        $this->vNombre = $nombre;
        $this->setCorreo($correo);
    }

        /**
     * @return string
     */
    public function getNombre() {
        return $this->vNombre;
    }

    /**
     * @return string
     */

    public function getCorreo(){
        return $this->vCorreo;
    }

    /**
     * @param string $nuevoNombre
     */
    public function setNombre($nuevoNombre) {
        $this->vNombre = $nuevoNombre;
    }

    /**
     * Asigna un correo tras validar su formato.
     *
     * @param string $nuevoCorreo
     * @throws Exception Si el formato del correo es inválido.
     */
    public function setCorreo($nuevoCorreo){
        if(filter_var($nuevoCorreo, FILTER_VALIDATE_EMAIL)) {
           $this->vCorreo = $nuevoCorreo;
        } else {
             throw new Exception("Error: el correo '$nuevoCorreo' no tiene un formato valido");
        }
    }


}