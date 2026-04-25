<?php

/**
 * Controlador para la gestión de Productos.
 *
 * Esta clase actúa como intermediaria entre el modelo Producto y la base de datos,
 * encargándose de las operaciones CRUD y búsquedas específicas.
 *
 * @category   Controller
 * @package    App\Controllers
 * @author     Jose Carlos Castillo Padilla
 * @version    1.0.0
 */

namespace App\Controllers;

use App\Config\Database;
use App\Models\Producto;
use PDO;

class ProductoController {
    
    /** * @var PDO Instancia de la conexión a la base de datos 
     */

    /**
     * Constructor de la clase.
     * * Inicializa la conexión a la base de datos obteniéndola de la clase Database.
     */
    private $connection;

    public function __construct() {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    /**
     * Registra un nuevo producto en la base de datos.
     *
     * @param Producto $producto Objeto con los datos del producto a insertar.
     * @return bool True si la operación fue exitosa, false en caso contrario.
     */
    public function crear(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio)
                VALUES (:nombre, :descripcion, :existencia, :precio)";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getPrecio());

        return $stmt->execute();
    }

    /**
     * Lista todos los productos registrados.
     *
     * @return array[] Arreglo asociativo con todos los productos ordenados por ID descendente.
     */
    public function listar() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Obtiene los detalles de un producto por su ID único.
     *
     * @param int $id Identificador del producto.
     * @return array|bool Datos del producto o false si no se encuentra.
     */
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Actualiza los datos de un producto existente.
     *
     * @param Producto $producto Objeto Producto con los datos actualizados e ID válido.
     * @return bool Resultado de la ejecución de la consulta.
     */
    public function actualizar(Producto $producto) {
        $sql = "UPDATE productos
                SET nombre = :nombre, descripcion = :descripcion, existencia = :existencia,
                precio = :precio
                WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':id', $producto->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getPrecio());

        return $stmt->execute();
    }

    /**
     * Elimina un producto de la base de datos.
     *
     * @param int $id Identificador del producto a eliminar.
     * @return bool Resultado de la operación.
     */
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Busca productos basados en un término de búsqueda.
     * * Realiza una búsqueda parcial (LIKE) en las columnas nombre y descripción.
     *
     * @param string $termino Palabra o frase a buscar.
     * @return array[] Resultados coincidentes.
     */
    public function buscar($termino) {
    $sql = "SELECT * FROM productos
            WHERE nombre LIKE :termino
                OR descripcion LIKE :termino
            ORDER BY id DESC";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue(':termino', '%' . $termino . '%');
    $stmt->execute();

    return $stmt->fetchAll();
}

}
?>