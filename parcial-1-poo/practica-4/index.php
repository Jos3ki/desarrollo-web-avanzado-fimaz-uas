<?php

/**
 * Script principal de ejecución - Práctica 4 (Simulador de Examen).
 *
 * Este archivo integra todos los conceptos de la Unidad I:
 * encapsulamiento, herencia, polimorfismo, validación de datos 
 * y manejo de excepciones mediante bloques try/catch.
 *
 * @package Usuarios
 * @author Jose Carlos Castillo Padilla
 */

require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';
require_once 'clases/Invitado.php';

$usuarios = [];
$mensajeError = "";

try {

    $objeAdminvalido = new Admin("Jose", "jose9@gmail.com");
    $usuarios[] = $objeAdminvalido;
    
    $objeAlumnovalido = new Alumno("Abdel", "abdel12@gmail.com", "12131415");
    $usuarios[] = $objeAlumnovalido;

    $objInvitadovalido = new Invitado("Jorge", "jorge13@gmail.com", "Nike");
    $usuarios[] = $objInvitadovalido;


    $objInvalido = new Alumno("Usuario Falso", "correo_sin_arroba.com", "0000");

} catch (Exception $e) {
    $mensajeError = "error controlado: " . $e->getMessage();

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 4 - Sistema POO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .alerta-error { background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #004085; color: white; }
    </style>
</head>
<body>

    <h2>Registro de Usuarios del Sistema</h2>

    <?php if (!empty($mensajeError)): ?>
        <div class="alerta-error">
            <?php echo $mensajeError; ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Matrícula</th>
                <th>Empresa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->getNombre(); ?></td>
                    <td><?php echo $usuario->getCorreo(); ?></td>
                    <td><?php echo $usuario->getRol(); ?></td>
                    
                    <td>
                        <?php echo method_exists($usuario, 'getMatricula') ? $usuario->getMatricula() : "-"; ?>
                    </td>
                    <td>
                        <?php echo method_exists($usuario, 'getEmpresa') ? $usuario->getEmpresa() : "-"; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>