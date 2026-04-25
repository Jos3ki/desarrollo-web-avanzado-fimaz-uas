<?php

namespace App\Config;

use PDO;
use PDOException;

/**
 * Gestión de conexiones a base de datos.
 *
 * @package    App\Database
 * @author     Jose Carlos Castillo Padilla
 * @version    1.0.0
 */
class Database {
    private $host = "localhost";
    private $dbname = "phppdobd";
    private $username = "root";
    private $password = "";
    private $connection;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $this->connection = new PDO($dsn, $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>