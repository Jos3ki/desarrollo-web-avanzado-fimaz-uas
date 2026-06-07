<?php
require_once __DIR__ . '/config/Autoload.php';

use Controllers\AuthController;
use Controllers\ProductoController;
use Controllers\PublicController;

// Calcula la URL base del proyecto a partir del script en ejecución.
$baseUrl = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
define('BASE_URL', $baseUrl);

/**
 * Genera o recupera el token CSRF de la sesión activa.
 *
 * @return string
 */
function csrf_token(): string
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Valida un token CSRF contra el valor guardado en sesión.
 *
 * @param string|null $token Token recibido desde el formulario.
 *
 * @return bool
 */
function csrf_valid(?string $token): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['csrf_token'])
        && is_string($token)
        && hash_equals($_SESSION['csrf_token'], $token);
}

$route = $_GET['route'] ?? 'catalogo';

$authController = new AuthController();
$productoController = new ProductoController();
$publicController = new PublicController();

switch ($route) {
    case 'login':
        $authController->showLogin();
        break;

    case 'auth/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        }
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'productos':
        $productoController->index();
        break;

    case 'productos/create':
        $productoController->create();
        break;

    case 'productos/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController->store();
        }
        break;

    case 'productos/edit':
        $productoController->edit();
        break;

    case 'productos/update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController->update();
        }
        break;

    case 'productos/delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController->delete();
        }
        break;

    case 'catalogo':
    default:
        $publicController->catalogo();
        break;
}