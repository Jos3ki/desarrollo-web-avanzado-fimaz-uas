<?php

namespace Controllers;

use Models\ProductoModel;
use Models\BitacoraModel;

/**
 * Controlador de administración de productos.
 *
 * Gestiona el listado, alta, edición y eliminación de productos, además de
 * validar sesiones, imágenes y bitácora de acciones.
 *
 * @package Controllers
 */
class ProductoController
{
    /**
     * Modelo de productos.
     *
     * @var ProductoModel
     */
    private ProductoModel $productoModel;

    /**
     * Inicializa el modelo de productos.
     */
    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    /**
     * Verifica que exista una sesión de administrador activa.
     *
     * @return void
     */
    private function verificarSesion(): void
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    /**
     * Registra una acción administrativa en la bitácora.
     *
     * @param string $accion Acción realizada.
     * @param int|null $entidadId Identificador del producto.
     * @param string $descripcion Descripción del evento.
     * @param string $resultado Resultado de la operación.
     *
     * @return void
     */
    private function registrarBitacora(string $accion, ?int $entidadId, string $descripcion, string $resultado): void
    {
        $admin = $_SESSION['admin'] ?? [];
        $bitacora = new BitacoraModel();
        $bitacora->registrar([
            'admin_id' => isset($admin['id']) ? (int)$admin['id'] : null,
            'username' => $admin['username'] ?? null,
            'accion' => $accion,
            'entidad' => 'producto',
            'entidad_id' => $entidadId,
            'descripcion' => $descripcion,
            'resultado' => $resultado,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
        ]);
    }

    /**
     * Procesa una imagen subida por formulario y devuelve su nombre guardado.
     *
     * @param array|null $archivo Datos de la imagen subida.
     * @param string $rutaError Ruta de redirección cuando ocurre un error.
     *
     * @return string|null
     */
    private function procesarImagen(?array $archivo, string $rutaError): ?string
    {
        if (empty($archivo) || $archivo['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if ($archivo['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Error al subir la imagen.';
            header('Location: ' . $rutaError);
            exit;
        }

        if ($archivo['size'] > 2 * 1024 * 1024) {
            $_SESSION['error'] = 'La imagen no debe superar 2MB.';
            header('Location: ' . $rutaError);
            exit;
        }

        $info = getimagesize($archivo['tmp_name']);
        $permitidos = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp'
        ];

        if ($info === false || !isset($permitidos[$info['mime']])) {
            $_SESSION['error'] = 'Formato de imagen no permitido. Usa JPG, PNG o WEBP.';
            header('Location: ' . $rutaError);
            exit;
        }

        $uploadDir = __DIR__ . '/../uploads';

        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
            $_SESSION['error'] = 'No se pudo crear la carpeta de imágenes.';
            header('Location: ' . $rutaError);
            exit;
        }

        $nombreArchivo = 'prod_' . uniqid() . '.' . $permitidos[$info['mime']];
        $destino = $uploadDir . DIRECTORY_SEPARATOR . $nombreArchivo;

        if (!move_uploaded_file($archivo['tmp_name'], $destino)) {
            $_SESSION['error'] = 'No se pudo guardar la imagen.';
            header('Location: ' . $rutaError);
            exit;
        }

        return $nombreArchivo;
    }

    /**
     * Muestra el listado paginado de productos del panel administrativo.
     *
     * @return void
     */
    public function index(): void
    {
        $this->verificarSesion();
        $porPagina = 13;
        $pagina = (int)($_GET['page'] ?? 1);

        if ($pagina < 1) {
            $pagina = 1;
        }

        $totalProductos = $this->productoModel->contarTodos();
        $totalPaginas = (int)ceil($totalProductos / $porPagina);

        if ($totalPaginas > 0 && $pagina > $totalPaginas) {
            $pagina = $totalPaginas;
        }

        $offset = ($pagina - 1) * $porPagina;
        $productos = $this->productoModel->obtenerPaginados($porPagina, $offset);
        require_once __DIR__ . '/../views/productos/index.php';
    }

    /**
     * Muestra el formulario de creación de productos.
     *
     * @return void
     */
    public function create(): void
    {
        $this->verificarSesion();
        require_once __DIR__. '/../views/productos/create.php';
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     *
     * @return void
     */
    public function store(): void
    {
        $this->verificarSesion();

        if (!csrf_valid($_POST['csrf_token'] ?? null)) {
            $_SESSION['error'] = 'Token CSRF inválido.';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        $data = [
            'sku' => trim($_POST['sku'] ?? ''),
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio_compra' => trim($_POST['precio_compra'] ?? ''),
            'precio_venta' => trim($_POST['precio_venta'] ?? ''),
            'existencia' => trim($_POST['existencia'] ?? '')
        ];

        if (
            $data['sku'] === '' ||
            $data['nombre'] === '' ||
            $data['descripcion'] === '' ||
            $data['precio_compra'] === '' ||
            $data['precio_venta'] === '' ||
            $data['existencia'] === ''
        ) {
            $_SESSION['error'] = 'Todos los campos son obligatorios.';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        if (!is_numeric($data['precio_compra']) || !is_numeric($data['precio_venta'])
            || !is_numeric($data['existencia'])) {
            $_SESSION['error'] = 'Precio de compra, precio de venta y existencia deben ser numericos';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        if ((float)$data['precio_compra'] < 0 || (float)$data['precio_venta'] < 0) {
            $_SESSION['error'] = 'Precio de compra y precio de venta deben ser mayores o iguales a 0.';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        if ((int)$data['existencia'] < 0) {
            $_SESSION['error'] = 'La existencia debe ser mayor o igual a 0.';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        if ((float)$data['precio_venta'] < (float)$data['precio_compra']) {
            $_SESSION['error'] = 'El precio de venta no puede ser menor al precio de compra.';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        if ($this->productoModel->skuExiste($data['sku'])) {
            $_SESSION['error'] = 'El SKU ya existe, utiliza uno diferente.';
            header('Location: ' . BASE_URL . '/productos/create');
            exit;
        }

        $imagenNombre = $this->procesarImagen($_FILES['imagen'] ?? null, BASE_URL . '/productos/create');
        $data['imagen'] = $imagenNombre;

        if ($this->productoModel->crear($data)) {
            $_SESSION['success'] = 'producto registrado correctamente.';
            $this->registrarBitacora(
                'crear',
                null,
                'Producto creado. SKU: ' . $data['sku'] . ' | Nombre: ' . $data['nombre'],
                'exito'
            );
        } else {
            $_SESSION['error'] = 'No fue posible registrar el producto.';
            $this->registrarBitacora(
                'crear',
                null,
                'Fallo al crear producto. SKU: ' . $data['sku'] . ' | Nombre: ' . $data['nombre'],
                'fallido'
            );
        }
        
        header('Location: ' . BASE_URL . '/productos');
        exit;
    }

     /**
      * Muestra el formulario de edición de un producto existente.
      *
      * @return void
      */
     public function edit(): void
     {
         $this->verificarSesion();

         $id = (int)($_GET['id'] ?? 0);
         $producto = $this->productoModel->obtenerPorId($id);

         if (!$producto) {
           $_SESSION['error'] = 'Producto no encontrado.';
           header('Location: ' . BASE_URL . '/productos');
           exit;
         }

         require_once __DIR__ . '/../views/productos/edit.php';
     }

     /**
      * Actualiza un producto existente.
      *
      * @return void
      */
     public function update(): void
    {
        $this->verificarSesion();
         $id = (int)($_POST['id'] ?? 0);

         if (!csrf_valid($_POST['csrf_token'] ?? null)) {
           $_SESSION['error'] = 'Token CSRF inválido.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

        $data = [
            'sku' => trim($_POST['sku'] ?? ''),
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio_compra' => trim($_POST['precio_compra'] ?? ''),
            'precio_venta' => trim($_POST['precio_venta'] ?? ''),
            'existencia' => trim($_POST['existencia'] ?? '')
        ];

        if ($id <= 0) {
           $_SESSION['error'] = 'ID inválido.';
            header('Location: ' . BASE_URL . '/productos');
           exit;
         }

         $productoActual = $this->productoModel->obtenerPorId($id);
         if (!$productoActual) {
           $_SESSION['error'] = 'Producto no encontrado.';
           header('Location: ' . BASE_URL . '/productos');
           exit;
         }

         if (
           $data['sku'] === '' ||
           $data['nombre'] === '' ||
           $data['descripcion'] === '' ||
           $data['precio_compra'] === '' ||
           $data['precio_venta'] === '' ||
           $data['existencia'] === ''
         ) {
           $_SESSION['error'] = 'Todos los campos son obligatorios.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

         if (!is_numeric($data['precio_compra']) || !is_numeric($data['precio_venta'])
           || !is_numeric($data['existencia'])) {
           $_SESSION['error'] = 'Precio de compra, precio de venta y existencia deben ser numéricos.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

         if ((float)$data['precio_compra'] < 0 || (float)$data['precio_venta'] < 0) {
           $_SESSION['error'] = 'Precio de compra y precio de venta deben ser mayores o iguales a 0.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

         if ((int)$data['existencia'] < 0) {
           $_SESSION['error'] = 'La existencia debe ser mayor o igual a 0.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

         if ((float)$data['precio_venta'] < (float)$data['precio_compra']) {
           $_SESSION['error'] = 'El precio de venta no puede ser menor al precio de compra.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

         if ($this->productoModel->skuExiste($data['sku'], $id)) {
           $_SESSION['error'] = 'El SKU ya existe, utiliza uno diferente.';
           header('Location: ' . BASE_URL . '/productos/edit/' . $id);
           exit;
         }

         $imagenNombre = $productoActual['imagen'] ?? null;
         $imagenNueva = $this->procesarImagen($_FILES['imagen'] ?? null, BASE_URL . '/productos/edit/' . $id);
         if ($imagenNueva !== null) {
           $imagenNombre = $imagenNueva;
         }

         $data['imagen'] = $imagenNombre;

         if ($this->productoModel->actualizar($id, $data)) {
           $_SESSION['success'] = 'Producto actualizado correctamente.';
           $this->registrarBitacora(
               'actualizar',
               $id,
               'Producto actualizado. SKU: ' . $data['sku'] . ' | Nombre: ' . $data['nombre'],
               'exito'
           );
         } else {
           $_SESSION['error'] = 'No fue posible actualizar el producto.';
           $this->registrarBitacora(
               'actualizar',
               $id,
               'Fallo al actualizar producto. SKU: ' . $data['sku'] . ' | Nombre: ' . $data['nombre'],
               'fallido'
           );
         }

         header('Location: ' . BASE_URL . '/productos');
         exit;
     }

        /**
         * Elimina un producto del sistema.
         *
         * @return void
         */
        public function delete(): void
        {
            $this->verificarSesion();

            if (!csrf_valid($_POST['csrf_token'] ?? null)) {
                $_SESSION['error'] = 'Token CSRF inválido.';
                header('Location: ' . BASE_URL . '/productos');
                exit;
            }

            $id = (int)($_POST['id'] ?? 0);

            if ($id <= 0) {
                $_SESSION['error'] = 'ID inválido.';
                header('Location: ' . BASE_URL . '/productos');
                exit;
            }

            $productoActual = $this->productoModel->obtenerPorId((int)$id);
            if (!$productoActual) {
                $_SESSION['error'] = 'Producto no encontrado.';
                header('Location: ' . BASE_URL . '/productos');
                exit;
            }

            if ($this->productoModel->eliminar($id)) {
                $_SESSION['success'] = 'Producto eliminado correctamente.';
                $nombre = $productoActual['nombre'] ?? '';
                $sku = $productoActual['sku'] ?? '';
                $this->registrarBitacora(
                    'eliminar',
                    $id,
                    'Producto eliminado. SKU: ' . $sku . ' | Nombre: ' . $nombre,
                    'exito'
                );
            } else {
                $_SESSION['error'] = 'No fue posible eliminar el producto.';
                $nombre = $productoActual['nombre'] ?? '';
                $sku = $productoActual['sku'] ?? '';
                $this->registrarBitacora(
                    'eliminar',
                    $id,
                    'Fallo al eliminar producto. SKU: ' . $sku . ' | Nombre: ' . $nombre,
                    'fallido'
                );
            }

            header('Location: ' . BASE_URL . '/productos');
            exit;
        }   


}