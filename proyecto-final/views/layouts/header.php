<?php
if (!defined('BASE_URL')) {
    define('BASE_URL', '');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web Avanzado: POO+PDO-TryCatch-Namespaces-Autoload-Transacciones-MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1 0 auto;
        }

        .catalogo-card-img {
            width: 100%;
            height: 220px;
            object-fit: contain;
            background: #f8f9fa;
        }

        .producto-thumb-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .producto-preview-img {
            width: 100%;
            max-width: 220px;
            height: 220px;
            object-fit: contain;
        }

        .footer-brand-img {
            max-height: 72px;
            width: auto;
            object-fit: contain;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>/catalogo">Tienda MVC</a>
        <div>
            <a class="btn btn-outline-light btn-sm me-2" href="<?= BASE_URL ?>/catalogo">Catalogo</a>
            <a class="btn btn-warning btn-sm" href="<?= BASE_URL ?>/login">Administrador</a>
        </div>
    </div>
</nav>

<div class="container mt-4 main-content">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
