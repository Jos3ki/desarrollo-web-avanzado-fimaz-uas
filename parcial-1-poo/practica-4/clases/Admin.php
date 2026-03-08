<?php

require_once 'Usuario.php';

/**
 * Clase que representa a un Administrador del sistema.
 * Hereda las propiedades y métodos básicos de Usuario.
 * @package Usuarios
 * @version 1.0.0
 * @author Jose Carlos
 */
class Admin extends Usuario {

    /**
     * Polimorfismo: Retorna el rol específico.
     * @return string
     */
    public function getRol() {
        return "Administrador";
    }
}