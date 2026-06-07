<?php

namespace controllers;

use models\ProductoModel;
use Exception;

class ProductoApiController {
    private $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }

    /**
     * Punto de entrada principal para la API de productos
     * Soporta: 
     * - Listado completo
     * - Búsqueda por término (?buscar=...)
     * - Consulta por ID (?id=...)
     */
    public function index() {
        // Aseguramos que la respuesta sea JSON solo cuando se accede a la API
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = $_GET['id'] ?? null;
            $buscar = $_GET['buscar'] ?? null;

            if ($id) {
                $this->getOne($id);
            } elseif ($buscar) {
                $this->search($buscar);
            } else {
                $this->getAll();
            }
        } catch (Exception $e) {
            $this->respond(500, "Error interno del servidor", null, $e->getMessage());
        }
    }

    private function getAll() {
        $productos = $this->model->obtenerTodos(); 
        $this->respond(200, "Lista de productos obtenida con éxito", $productos);
    }

    private function getOne($id) {
        $producto = $this->model->obtenerPorId((int)$id);
        if ($producto) {
            $this->respond(200, "Producto encontrado", $producto);
        } else {
            $this->respond(404, "Producto no encontrado con el ID: $id");
        }
    }

    private function search($termino) {
        $productos = $this->model->buscarPublico($termino);
        $this->respond(200, "Resultados de búsqueda para: $termino", $productos);
    }

    /**
     * Función auxiliar para estandarizar las respuestas JSON
     */
    private function respond($status_code, $message, $data = null, $error = null) {
        http_response_code($status_code);
        $response = [
            "status" => $status_code < 400 ? "success" : "error",
            "code" => $status_code,
            "message" => $message
        ];

        if ($data !== null) $response["data"] = $data;
        if ($error !== null) $response["error"] = $error;

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }
}
