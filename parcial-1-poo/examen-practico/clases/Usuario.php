<?php

class Usuario {
        private $Vnombre;
        private $Vcorreo;

        public function __construct($nombre, $correo)
        {
            $this->Vnombre = $nombre;

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Correo invalido" . $correo);
            } else {
                $this->Vcorreo = $correo;
            }
        }

        public function getNombre(){
            return $this->Vnombre;
        }
        
        public function getCorreo(){
            return $this->Vcorreo;
        }
}