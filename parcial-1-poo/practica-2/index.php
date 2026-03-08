<?php

/**
 * Script de prueba para la Práctica 2: Herencia y reutilización de código.
 * * Demuestra la instanciación de un objeto de la clase hija Admin,
 * comprobando que hereda el constructor y los métodos de la clase padre Usuario,
 * además de ejecutar su propio método exclusivo getRol().
 *
 * @package Usuarios
 * @author Jose Carlos
 */

require 'Admin.php';

$objAdmin = new Admin("jose", "joosec29@gmail.com");

echo "Nombre: " . $objAdmin->getNombre() . "<br>";
echo "Correo: " . $objAdmin->getCorreo() . "<br>";
echo "Rol: " . $objAdmin->getRol(). "<br>";