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
    <!-- Google Fonts: Inter para un look moderno -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #334155; /* Slate */
            --accent-color: #64748b;
            --success-color: #10b981; /* Emerald */
            --bg-body: #f1f5f9;
        }

        html, body {
            height: 100%;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Navbar mas elegante */
        .navbar-custom {
            background-color: #0f172a !important; /* Navy muy oscuro */
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Miniaturas de productos en tablas */
        .producto-thumb-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
        }

        .main-content {
            flex: 1 0 auto;
            padding-bottom: 3rem;
        }

        /* Estilo para las cards */
        .card {
            border: 1px solid #e2e8f0 !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
        }

        /* Badges de precio mas sobrios */
        .badge.bg-success {
            background-color: var(--success-color) !important;
            font-weight: 600;
            padding: 0.5em 1em;
        }

        .footer-brand-img {
            max-height: 40px;
            filter: grayscale(1) brightness(2); /* Logos en blanco para el footer */
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .footer-brand-img:hover {
            filter: none;
            opacity: 1;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>/catalogo" style="letter-spacing: -0.5px;">
            <span class="text-warning">TIENDA</span>MVC
        </a>
        <div>
            <a class="btn btn-link text-white-50 text-decoration-none btn-sm me-2 fw-semibold" href="<?= BASE_URL ?>/catalogo">Catálogo</a>
            <a class="btn btn-outline-warning btn-sm fw-bold px-3" href="<?= BASE_URL ?>/login">Admin</a>
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
