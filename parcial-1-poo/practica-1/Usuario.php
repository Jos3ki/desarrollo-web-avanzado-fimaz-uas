<?php

class Usuario { //definicion de la clase usuario 

    private $Vnombre; //atributo privado nombre
    private $Vcorreo; // atributo privado correo

    public function __construct($nombre, $correo) //constructor para inicializar el usuario
    {
        $this->Vnombre = $nombre; 
        $this->Vcorreo = $correo;

    }

    public function getNombre(){ //get para obtener el nombre del usuario
        return $this -> Vnombre;
    }

    public function getCorreo() { //get para obtener el correo del usuario
        return $this -> Vcorreo;
    }

    public function setNombre($nuevo_nombre) { //set para actualizar el nombre del usuario 
        $this -> Vnombre = $nuevo_nombre;
    }

    public function setCorreo($nuevo_correo) { //set para actualizar el correo del usuario
        $this -> Vcorreo = $nuevo_correo;
    }
}