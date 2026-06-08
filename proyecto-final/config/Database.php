<?php

namespace Config;

use PDO;
use PDOException;

/**
 * Clase de conexión a base de datos.
 *
 * Centraliza la configuración PDO utilizada por los modelos del sistema.
 *
 * @package Config
 */
class Database {

    /**
     * Host de MySQL.
     *
     * @var string
     */
    private string $host = 'localhost';
    /**
     * Nombre de la base de datos.
     *
     * @var string
     */
    private string $dbName = 'tienda_mvc';
    /**
     * Usuario de conexión.
     *
     * @var string
     */
    private string $username = 'root';
    /**
     * Contraseña de conexión.
     *
     * @var string
     */
    private string $password = '';
    /**
     * Codificación usada en la conexión.
     *
     * @var string
     */
    private string $charset = 'utf8mb4';

    /**
     * Crea y configura una instancia PDO.
     *
     * @return PDO
     */
    public function connect() : PDO {
        try {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
        } catch(PDOException $e) {
            die('Error de conexión con la base de datos.');
        }
    }
    
}