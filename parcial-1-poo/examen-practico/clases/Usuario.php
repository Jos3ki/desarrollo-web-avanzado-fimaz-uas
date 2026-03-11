<?php

/**
 * Clase base Usuario.
 * Define los atributos principales, aplica el encapsulamiento y 
 * asegura la integridad de los datos validando el formato del correo.
 *
 * @package Usuarios
 * @author Jose Carlos Castillo Padilla
 */
class Usuario {
        /**
         * @var string Nombre del usuario.
         */
        private $Vnombre;
        /**
         * @var string Correo electrónico validado.
         */
        private $Vcorreo;

        /**
         * Constructor de la clase Usuario.
         *
         * @param string $nombre Nombre del usuario.
         * @param string $correo Correo a validar.
         * @throws Exception Si el correo no cumple con un formato válido.
         */
        public function __construct($nombre, $correo)
        {
            $this->Vnombre = $nombre;

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Correo invalido" . $correo);
            } else {
                $this->Vcorreo = $correo;
            }
        }

        /**
         * Obtiene el nombre del usuario.
         *
         * @return string 
         */
        public function getNombre(){
            return $this->Vnombre;
        }

        /**
         * Obtiene el correo electrónico del usuario.
         *
         * @return string
         */
        public function getCorreo(){
            return $this->Vcorreo;
        }
}