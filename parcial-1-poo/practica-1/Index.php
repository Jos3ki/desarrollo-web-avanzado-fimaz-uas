<?php

require 'Usuario.php'; //incluir el archivo Usuario.php en el que esta la clase y sus metodos

$Usuario1 = new Usuario("jose", "joosec29@gmail.com"); // crear el objeto pasandole un nombre y correo 

echo "El nombre de usaurio es: " . $Usuario1->getNombre() . " y su correo es: " . $Usuario1->getCorreo() . "\n"; //mostrar los valores iniciales con los getter 

$Usuario1->setCorreo("jose12@gmail.com"); // actualizar el correo con el set
$Usuario1->setNombre("Carlos"); // actualizar el nombre con el set 

echo "El nombre de usaurio actualizado es: " . $Usuario1->getNombre() . " y su correo actualizado es: " . $Usuario1->getCorreo(); //mostrar los nuevos valores 