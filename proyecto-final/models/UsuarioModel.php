<?php

namespace Models;

use Config\Database;
use PDO;
use PDOException;

/**
 * Modelo de usuarios del sistema.
 *
 * Se utiliza principalmente para localizar al administrador por nombre de
 * usuario durante el inicio de sesión.
 *
 * @package Models
 */
class UsuarioModel {
    /**
     * Conexión activa a la base de datos.
     *
     * @var PDO
     */
    private PDO $conexion;
    
    /**
     * Abre la conexión PDO del modelo.
     */
    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->connect();
    }

    /**
     * Busca un usuario por su nombre de acceso.
     *
     * @param string $username Nombre de usuario a buscar.
     *
     * @return array<string, mixed>|null
     */
    public function buscarPorUsername(string $username) : ?array {
        try {
            $sql = 'SELECT * FROM usuarios WHERE username = :username LIMIT 1';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $usuario = $stmt->fetch();  
            return $usuario ?: null;
        } catch(PDOException $e) {
            return null;
        }
    }
}