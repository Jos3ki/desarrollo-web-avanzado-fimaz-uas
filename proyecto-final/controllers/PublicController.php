<?php
namespace Controllers;

use Models\ProductoModel;

/**
 * Controlador de acceso público al catálogo.
 *
 * Carga los productos visibles para visitantes y aplica búsqueda y paginación.
 *
 * @package Controllers
 */
class PublicController
{
    /**
     * Muestra el catálogo público de productos.
     *
     * @return void
     */
    public function catalogo(): void
    {
        $termino = trim($_GET['buscar'] ?? '');
        $porPagina = 6;
        $pagina = (int)($_GET['page'] ?? 1);

        if ($pagina < 1) {
            $pagina = 1;
        }

        $productoModel = new ProductoModel();
        $totalProductos = $productoModel->contarPublico($termino);
        $totalPaginas = (int)ceil($totalProductos / $porPagina);

        if ($totalPaginas > 0 && $pagina > $totalPaginas) {
            $pagina = $totalPaginas;
        }

        $offset = ($pagina - 1) * $porPagina;
        $productos = $productoModel->buscarPublicoPaginado($termino, $porPagina, $offset);
        require_once __DIR__ . '/../views/public/catalogo.php';
    }
}