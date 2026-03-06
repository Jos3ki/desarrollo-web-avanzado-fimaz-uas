<?php

class Usuario {

    private $Vnombre;
    private $Vcorreo;

    public function __construct($nombre, $correo)
    {
        $this->Vnombre = $nombre;
        $this->Vcorreo = $correo;

    }

    public function getNombre(){
        return $this -> Vnombre;
    }

    public function getCorreo() {
        return $this -> Vcorreo;
    }

    public function setNombre($nuevo_nombre) {
        $this -> Vnombre = $nuevo_nombre;
    }

    public function setCorreo($nuevo_correo) {
        $this -> Vcorreo = $nuevo_correo;
    }
}