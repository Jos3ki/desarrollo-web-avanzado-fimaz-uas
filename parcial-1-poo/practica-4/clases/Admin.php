<?php

require_once 'Usuario.php';

/**
 * Clase Admin que hereda de Usuario.
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