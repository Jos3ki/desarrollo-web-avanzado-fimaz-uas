<?php

namespace Models;

use Config\Database;

use PDO;
use PDOException;

/**
 * Modelo de persistencia de productos.
 *
 * Encapsula las consultas para catálogo público, administración, validaciones
 * de SKU y operaciones CRUD con transacciones.
 *
 * @package Models
 */
class ProductoModel {
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
     * Obtiene todos los productos ordenados de forma descendente.
     *
     * @return array<int, array<string, mixed>>
     */
    public function obtenerTodos() : array {
        try {
            $sql = 'SELECT * FROM productos ORDER BY id DESC';
            $stmt = $this->conexion->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Cuenta el total de productos registrados.
     *
     * @return int
     */
    public function contarTodos(): int
    {
        try {
            $stmt = $this->conexion->query('SELECT COUNT(*) FROM productos');
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }

    /**
     * Obtiene un subconjunto de productos para paginación.
     *
     * @param int $limite Número máximo de registros.
     * @param int $offset Desplazamiento de la consulta.
     *
     * @return array<int, array<string, mixed>>
     */
    public function obtenerPaginados(int $limite, int $offset): array
    {
        try {
            $sql = 'SELECT * FROM productos ORDER BY id DESC LIMIT :limite OFFSET :offset';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Busca productos para el catálogo público.
     *
     * @param string $termino Término de búsqueda.
     *
     * @return array<int, array<string, mixed>>
     */
    public function buscarPublico(string $termino = '') : array {
        try {
            if (trim($termino) == ''){
                return $this->obtenerTodos();
            }

            $sql = 'SELECT * FROM productos WHERE nombre LIKE :termino OR descripcion LIKE :termino ORDER BY id DESC';
            $stmt = $this->conexion->prepare($sql);
            $busqueda = '%' . $termino . '%';
            $stmt->bindParam(':termino', $busqueda);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch(PDOException $e) {
            return [];
        }
    }

    /**
     * Cuenta los productos visibles en el catálogo público.
     *
     * @param string $termino Término de búsqueda.
     *
     * @return int
     */
    public function contarPublico(string $termino = ''): int
    {
        try {
            if (trim($termino) == '') {
                return $this->contarTodos();
            }

            $sql = 'SELECT COUNT(*) FROM productos WHERE nombre LIKE :termino OR descripcion LIKE :termino';
            $stmt = $this->conexion->prepare($sql);
            $busqueda = '%' . $termino . '%';
            $stmt->bindParam(':termino', $busqueda);
            $stmt->execute();
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }

    /**
     * Busca productos públicos aplicando paginación.
     *
     * @param string $termino Término de búsqueda.
     * @param int $limite Número máximo de registros.
     * @param int $offset Desplazamiento de la consulta.
     *
     * @return array<int, array<string, mixed>>
     */
    public function buscarPublicoPaginado(string $termino, int $limite, int $offset): array
    {
        try {
            if (trim($termino) == '') {
                return $this->obtenerPaginados($limite, $offset);
            }

            $sql = 'SELECT * FROM productos WHERE nombre LIKE :termino OR descripcion LIKE :termino ORDER BY id DESC LIMIT :limite OFFSET :offset';
            $stmt = $this->conexion->prepare($sql);
            $busqueda = '%' . $termino . '%';
            $stmt->bindParam(':termino', $busqueda);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            return [];
        }
    }

    /**
     * Obtiene un producto por su identificador.
     *
     * @param int $id Identificador del producto.
     *
     * @return array<string, mixed>|null
     */
    public function obtenerPorId(int $id) : ?array {
        try {
            $sql = 'SELECT * FROM productos WHERE id = :id LIMIT 1';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $producto = $stmt->fetch();
            return $producto ?: null;
        }   catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Comprueba si ya existe un SKU.
     *
     * @param string $sku SKU a validar.
     * @param int|null $excluirId Identificador a excluir en ediciones.
     *
     * @return bool
     */
    public function skuExiste(string $sku, ?int $excluirId = null): bool
    {
        try {
            $sql = 'SELECT id FROM productos WHERE sku = :sku';

            if ($excluirId !== null) {
                $sql .= ' AND id != :id';
            }

            $sql .= ' LIMIT 1';

            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':sku', $sku);

            if ($excluirId !== null) {
                $stmt->bindParam(':id', $excluirId, PDO::PARAM_INT);
            }

            $stmt->execute();
            return (bool)$stmt->fetchColumn();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Inserta un nuevo producto usando transacción.
     *
     * @param array<string, mixed> $data Datos del producto.
     *
     * @return bool
     */
    public function crear(array $data): bool
    {
        try {
            $this->conexion->beginTransaction();

            $sql = 'INSERT INTO productos (sku, nombre, descripcion, precio_compra, precio_venta, existencia, imagen) VALUES (:sku, :nombre, :descripcion, :precio_compra, :precio_venta, :existencia, :imagen)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':sku', $data['sku']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':descripcion', $data['descripcion']);
            $stmt->bindParam(':precio_compra', $data['precio_compra']);
            $stmt->bindParam(':precio_venta', $data['precio_venta']);
            $stmt->bindParam(':existencia', $data['existencia'], PDO::PARAM_INT);
            $stmt->bindParam(':imagen', $data['imagen']);

            $resultado = $stmt->execute();
            if (!$resultado) {
                $this->conexion->rollBack();
                return false;
            }
            $this->conexion->commit();
            return true;

        } catch(PDOException $e) {
            if ($this->conexion->inTransaction()) {
                $this->conexion->rollBack();
            }
            return false;
        }
    }

    /**
     * Actualiza un producto existente usando transacción.
     *
     * @param int $id Identificador del producto.
     * @param array<string, mixed> $data Datos del producto.
     *
     * @return bool
     */
    public function actualizar(int $id, array $data): bool
    {
        try{
            $this->conexion->beginTransaction();

            $sql = 'UPDATE productos SET
                    sku = :sku,
                    nombre = :nombre,
                    descripcion = :descripcion,
                    precio_compra = :precio_compra,
                    precio_venta = :precio_venta,
                    existencia = :existencia,
                    imagen = :imagen
                    WHERE id = :id';

            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':sku', $data['sku']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':descripcion', $data['descripcion']);
            $stmt->bindParam(':precio_compra', $data['precio_compra']);
            $stmt->bindParam(':precio_venta', $data['precio_venta']);
            $stmt->bindParam(':existencia', $data['existencia'], PDO::PARAM_INT);
            $stmt->bindParam(':imagen', $data['imagen']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $resultado = $stmt->execute();
            if (!$resultado) {
                $this->conexion->rollBack();
                return false;
            }

            $this->conexion->commit();
            return true;
        } catch (PDOException $e) {
            if ($this->conexion->inTransaction()) {
                $this->conexion->rollBack();
            }
            return false;
        }

    }

    /**
     * Elimina un producto usando transacción.
     *
     * @param int $id Identificador del producto.
     *
     * @return bool
     */
    public function eliminar(int $id): bool
    {
        try {
            $this->conexion->beginTransaction();
            $Sql = 'DELETE FROM productos WHERE id = :id';
            $stmt = $this->conexion->prepare($Sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                $this->conexion->rollBack();
                return false;
            }

            $this->conexion->commit();
            return true;
        } catch (PDOException $e) {
            if ($this->conexion->inTransaction()) {
                $this->conexion->rollBack();
            }
            return false;
        }
    }

}