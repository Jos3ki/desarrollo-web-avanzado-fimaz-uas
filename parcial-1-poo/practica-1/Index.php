<?php

/**
 * Script de prueba y ejecución para la clase Usuario.
 * * Este archivo demuestra la instanciación de un objeto a partir de la clase Usuario,
 * la recuperación de su estado inicial mediante métodos Getter, y la actualización
 * segura de sus propiedades utilizando métodos Setter aplicando encapsulamiento.
 *
 * @package Usuarios
 * @author Jose Carlos
 */

require 'Usuario.php'; 

$Usuario1 = new Usuario("jose", "joosec29@gmail.com"); 

echo "El nombre de usaurio es: " . $Usuario1->getNombre() . " y su correo es: " . $Usuario1->getCorreo() . "<br>"; 

$Usuario1->setCorreo("jose12@gmail.com"); 
$Usuario1->setNombre("Carlos");  

echo "El nombre de usaurio actualizado es: " . $Usuario1->getNombre() . " y su correo actualizado es: " . $Usuario1->getCorreo();  