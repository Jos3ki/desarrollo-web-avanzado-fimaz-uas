<?php

namespace Controllers;

use Models\UsuarioModel;
use Models\BitacoraModel;

/**
 * Controlador de autenticación del administrador.
 *
 * Gestiona el formulario de acceso, el inicio de sesión, el cierre de sesión
 * y el registro de eventos en la bitácora.
 *
 * @package Controllers
 */
class AuthController 
{
    /**
     * Registra una acción de autenticación en la bitácora.
     *
     * @param int|null $adminId Identificador del administrador.
     * @param string|null $username Usuario relacionado con el evento.
     * @param string $accion Acción ejecutada.
     * @param string|null $entidad Entidad afectada.
     * @param int|null $entidadId Identificador de la entidad afectada.
     * @param string $descripcion Descripción legible del evento.
     * @param string $resultado Resultado de la operación.
     *
     * @return void
     */
    private function registrarBitacora(?int $adminId, ?string $username, string $accion, ?string $entidad, ?int $entidadId, string $descripcion, string $resultado): void
    {
        $bitacora = new BitacoraModel();
        $bitacora->registrar([
            'admin_id' => $adminId,
            'username' => $username,
            'accion' => $accion,
            'entidad' => $entidad,
            'entidad_id' => $entidadId,
            'descripcion' => $descripcion,
            'resultado' => $resultado,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
        ]);
    }

    /**
     * Muestra la vista del formulario de inicio de sesión.
     *
     * @return void
     */
    public function showLogin(): void {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    /**
     * Valida las credenciales del administrador y crea la sesión.
     *
     * @return void
     */
    public function login(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!csrf_valid($_POST['csrf_token'] ?? null)) {
            $_SESSION['error'] = 'Token CSRF inválido.';
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            $_SESSION['error'] = 'todos los campos son obligatorios.';
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->buscarPorUsername($username);

        
        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['admin'] = [
                'id' => $usuario['id'],
                'username' => $usuario['username'],
                'nombre_completo' => $usuario['nombre_completo']
            ];

            $_SESSION['success'] = 'Bienvenido, ' . $usuario['nombre_completo'] . '.';
            $this->registrarBitacora(
                (int)$usuario['id'],
                $usuario['username'],
                'login',
                'usuario',
                (int)$usuario['id'],
                'Inicio de sesión exitoso.',
                'exito'
            );
            header('Location: ' . BASE_URL . '/productos');
            exit;
        }

        $_SESSION['error'] = 'Credenciales incorrectas.';
        $this->registrarBitacora(
            null,
            $username !== '' ? $username : null,
            'login',
            'usuario',
            null,
            'Intento de inicio de sesión fallido.',
            'fallido'
        );
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    /**
     * Cierra la sesión del administrador y registra la salida.
     *
     * @return void
     */
    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $admin = $_SESSION['admin'] ?? null;
        if (is_array($admin)) {
            $this->registrarBitacora(
                isset($admin['id']) ? (int)$admin['id'] : null,
                $admin['username'] ?? null,
                'logout',
                'usuario',
                isset($admin['id']) ? (int)$admin['id'] : null,
                'Cierre de sesión.',
                'exito'
            );
        }

        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}