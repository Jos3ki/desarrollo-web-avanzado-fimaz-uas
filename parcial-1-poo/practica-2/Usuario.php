<?php

/**
 * Clase que gestiona la información de un usuario.
 * @package Usuarios
 * @version 1.0.0
 * @author Jose Carlos
 */
class Usuario { 

    /**
     * El nombre del usuario.
     *
     * @var string
     */
    private $Vnombre; 

    /**
     * El correo electrónico del usuario.
     *
     * @var string
     */
    private $Vcorreo;

    /**
     * Registra e inicializa un nuevo usuario.
     *
     * @param string $nombre El nombre del usuario.
     * @param string $correo El correo electrónico del usuario.
     */
    public function __construct($nombre, $correo) 
    {
        $this->Vnombre = $nombre; 
        $this->Vcorreo = $correo;

    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string Retorna el nombre registrado.
     */

    public function getNombre(){ 
        return $this -> Vnombre;
    }
    
    /**
     * Obtiene el correo del usuario.
     *
     * @return string Retorna el correo electrónico registrado.
     */

    public function getCorreo() { 
        return $this -> Vcorreo;
    }

    /**
     * Actualiza el nombre del usuario.
     *
     * @param string $nuevo_nombre El nuevo nombre a asignar.
     */

    public function setNombre($nuevo_nombre) {  
        $this -> Vnombre = $nuevo_nombre;
    }

    /**
     * Actualiza el correo del usuario.
     *
     * @param string $nuevo_correo El nuevo correo a asignar.
     */

    public function setCorreo($nuevo_correo) { 
        $this -> Vcorreo = $nuevo_correo;
    }
}