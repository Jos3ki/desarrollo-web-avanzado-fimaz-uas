<?php
if (!defined('BASE_URL')) {
    define('BASE_URL', '');
}
?>
    </div>

    <footer class="bg-dark text-light mt-5 pt-5">
        <div class="container pb-4">
            <div class="row g-4 align-items-start">
                <div class="col-12 col-lg-4">
                    <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
                        <img src="<?= BASE_URL ?>/views/img/UAS.png" alt="Universidad Autónoma de Sinaloa" class="footer-brand-img">
                        <img src="<?= BASE_URL ?>/views/img/FIMAZ.png" alt="Facultad de Informática y Matemáticas" class="footer-brand-img">
                    </div>
                    <h5 class="mb-2">Catálogo de tienda MVC</h5>
                    <p class="text-light text-opacity-75 mb-0">
                        Sistema académico de catálogo y administración de productos con enfoque en presentación clara,
                        búsqueda rápida y control de inventario.
                    </p>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <h6 class="text-uppercase text-warning fw-semibold mb-3">Sobre el proyecto</h6>
                    <ul class="list-unstyled text-light text-opacity-75 mb-0">
                        <li class="mb-2">Catálogo público de productos con imágenes, precio y existencia.</li>
                        <li class="mb-2">Panel administrativo para altas, ediciones y eliminaciones.</li>
                        <li class="mb-2">Búsqueda por nombre o descripción y paginación.</li>
                        <li class="mb-2">Validación de formularios, CSRF y bitácora de acciones.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <h6 class="text-uppercase text-warning fw-semibold mb-3">Entrega académica</h6>
                    <ul class="list-unstyled text-light text-opacity-75 mb-0">
                        <li class="mb-2">Desarrollo Web Avanzado.</li>
                        <li class="mb-2">Patrón MVC con PHP y PDO.</li>
                        <li class="mb-2">Bootstrap 5 para la interfaz.</li>
                        <li class="mb-2">Proyecto enfocado en un catálogo de tienda.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-top border-secondary">
            <div class="container py-3">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                    <small class="text-light text-opacity-75">
                        &copy; <?= date('Y'); ?> Catálogo de tienda MVC. Todos los derechos reservados.
                    </small>
                    <small class="text-light text-opacity-50">
                        Hecho para la entrega del proyecto académico.
                    </small>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
