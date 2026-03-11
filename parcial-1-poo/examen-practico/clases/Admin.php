<?php

require_once 'Usuario.php';

/**
 * Clase Admin.
 * Hereda de la clase base Usuario
 *
 * @package Usuarios
 * @author Jose Carlos Castillo Padilla
 */
class Admin extends Usuario {
    
/**
     * Obtiene el rol específico del usuario.
     *
     * @return string 
     */
    public function getRol() {
        return "Administrador";
    }

}