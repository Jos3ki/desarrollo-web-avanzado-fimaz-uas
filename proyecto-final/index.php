<?php
require_once __DIR__ . '/config/Autoload.php';

use Controllers\AuthController;
use Controllers\ProductoController;
use Controllers\PublicController;
use Controllers\ProductoApiController;

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

switch ($route) {
    case 'api/productos':
        $apiController = new ProductoApiController();
        $apiController->index();
        break;

    case 'login':
        $authController = new AuthController();
        $authController->showLogin();
        break;

    case 'auth/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->login();
        }
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    case 'productos':
        $productoController = new ProductoController();
        $productoController->index();
        break;

    case 'productos/create':
        $productoController = new ProductoController();
        $productoController->create();
        break;

    case 'productos/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController = new ProductoController();
            $productoController->store();
        }
        break;

    case 'productos/edit':
        $productoController = new ProductoController();
        $productoController->edit();
        break;

    case 'productos/update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController = new ProductoController();
            $productoController->update();
        }
        break;

    case 'productos/delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController = new ProductoController();
            $productoController->delete();
        }
        break;

    case 'catalogo':
    default:
        $publicController = new PublicController();
        $publicController->catalogo();
        break;
}