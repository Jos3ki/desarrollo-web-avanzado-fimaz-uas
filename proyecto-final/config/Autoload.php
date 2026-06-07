<?php

/**
 * Registra un autoloader simple para clases por namespace.
 *
 * Convierte los namespaces a rutas de archivo dentro del proyecto y carga la
 * clase cuando existe el archivo correspondiente.
 *
 * @package Config
 */
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../';
    $class = str_replace('\\', '/', $class);
    $parts = explode('/', $class);

    if (!empty($parts)) {
    $parts[0] = strtolower($parts[0]);
    }

    $file = $baseDir . implode('/', $parts) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});