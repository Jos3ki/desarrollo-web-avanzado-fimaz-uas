<?php

require_once __DIR__ . '/../models/Producto.php';

require_once __DIR__ . '/../config/Database.php';

class ProductoController {

    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->getConnection();
    }

    public function registro(Producto $producto) {

        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio) VALUES (:nombre, :descripcion, :existencia, :precio)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':nombre', $producto->getnombre());
        $stmt->bindValue(':descripcion', $producto->getdescripcion());
        $stmt->bindValue(':existencia', $producto->getexistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getprecio());
        return $stmt->execute();

    }

    public function listar() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue( ':id', $id, PDO::PARAM_INT);
         $stmt->execute();
        return $stmt->fetch();
    }

    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function actualizar(Producto $producto){
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, existencia = :existencia, precio = :precio WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $producto->getid(), PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $producto->getnombre());
        $stmt->bindValue(':descripcion', $producto->getdescripcion());
        $stmt->bindValue(':existencia', $producto->getexistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getprecio());
        return $stmt->execute();
    }

    public function buscar($termino) {
        $sql = "SELECT * FROM productos WHERE nombre LIKE :termino ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':termino', '%'. $termino . '%');
        $stmt->execute();

        return $stmt->fetchAll();
    }
}