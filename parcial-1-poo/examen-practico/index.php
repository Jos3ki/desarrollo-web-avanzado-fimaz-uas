<?php

/**
 * Examen Práctico - Parcial 1 (POO en PHP)
 * @author Jose Carlos Castillo Padilla
 */

require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';

$Ausuarios = [];
$VmensajeError = "";

try {

$objAdmin = new Admin("Jose", "joosec29@gmail.com");

$Ausuarios[] = $objAdmin;

$objAlumno = new Alumno("sebas", "sebitas@gmail.com", "12131415");

$Ausuarios[] = $objAlumno;

$objInvalido = new Alumno("Usuario", " correo.com", "1213141312");

} catch (Exception $e) {
    $mensajeError = "Error controlado: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen parcial 1 - POO</title>

    <style>
        th, td { border: 1px solid}
        .Alerta {color: red;}
    </style>
</head>
<body>

<h2>Examen parcial 1 - POO mini sistema de usuarios </h2>

    <?php if (!empty($mensajeError)): ?>
        <div class="Alerta">
            <?php echo $mensajeError ; ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Matricula</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Ausuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->getNombre(); ?></td>
                    <td><?php echo $usuario->getCorreo(); ?></td>
                    <td><?php echo $usuario->getRol(); ?></td>

                    <td><?php echo method_exists($usuario, 'getMatricula') ? $usuario->getMatricula() : "-"; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>