<?php

/**
 * Entidad Producto.
 *
 * Representa la estructura de datos de un producto dentro del sistema.
 * Esta clase se utiliza para transportar datos entre la base de datos y la vista.
 *
 * @category   Model
 * @package    App\Models
 * @author     Jose Carlos Castillo Padilla
 * @version    1.0.0
 */
namespace App\Models;
class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $existencia;
    private $precio;

    /**
     * Constructor de la clase Producto.
     *
     * @param int|null $id
     * @param string $nombre
     * @param string $descripcion
     * @param int $existencia
     * @param float $precio
     */
    public function __construct($id = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = 0.00) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getExistencia() {
        return $this->existencia;
    }

    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>