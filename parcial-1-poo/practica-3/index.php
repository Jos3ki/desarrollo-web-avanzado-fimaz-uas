<?php

require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';

echo "Prueba de creacion de usuario valido: <br>";
try {
    $objAlumno1 = new Alumno("Jose", "joosec29@gmail.com", "26169850");

    echo "Usuario creado con exito. <br>";
    echo "Nombre: " . $objAlumno1->getNombre() . "<br>";
    echo "correo: " . $objAlumno1->getCorreo() . "<br>";
    echo "Rol: " . $objAlumno1->getRol() . "<br>";
    echo "matricula: " . $objAlumno1->getMatricula() . "<br>"; 
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "Prueba de creacion de usuario con Correo INVALIDO: <br>";
try {
    $objAdmin1 = new Admin("Jose", "hola.gemail.");

    echo "nombre: " . $objAdmin1->getNombre() . "<br>";
    echo "correo: " . $objAdmin1->getCorreo() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}