<?php

namespace Models;

use Config\Database;
use PDO;
use PDOException;

/**
 * Modelo de bitácora administrativa.
 *
 * Guarda eventos de autenticación y mantenimiento de productos para auditoría
 * básica del sistema.
 *
 * @package Models
 */
class BitacoraModel
{
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
     * Registra un evento en la tabla de bitácora.
     *
     * @param array<string, mixed> $data Datos del evento.
     *
     * @return bool
     */
    public function registrar(array $data): bool
    {
        try {
            $sql = 'INSERT INTO bitacora_admin (
                        admin_id,
                        username,
                        accion,
                        entidad,
                        entidad_id,
                        descripcion,
                        resultado,
                        ip,
                        user_agent
                    ) VALUES (
                        :admin_id,
                        :username,
                        :accion,
                        :entidad,
                        :entidad_id,
                        :descripcion,
                        :resultado,
                        :ip,
                        :user_agent
                    )';

            $stmt = $this->conexion->prepare($sql);

            $adminId = $data['admin_id'] ?? null;
            if ($adminId === null) {
                $stmt->bindValue(':admin_id', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':admin_id', (int)$adminId, PDO::PARAM_INT);
            }

            $entidadId = $data['entidad_id'] ?? null;
            if ($entidadId === null) {
                $stmt->bindValue(':entidad_id', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':entidad_id', (int)$entidadId, PDO::PARAM_INT);
            }

            $stmt->bindValue(':username', $data['username'] ?? null);
            $stmt->bindValue(':accion', $data['accion'] ?? '');
            $stmt->bindValue(':entidad', $data['entidad'] ?? null);
            $stmt->bindValue(':descripcion', $data['descripcion'] ?? null);
            $stmt->bindValue(':resultado', $data['resultado'] ?? 'exito');
            $stmt->bindValue(':ip', $data['ip'] ?? null);
            $stmt->bindValue(':user_agent', $data['user_agent'] ?? null);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
