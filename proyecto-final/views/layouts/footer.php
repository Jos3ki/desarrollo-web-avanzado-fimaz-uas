<?php
if (!defined('BASE_URL')) {
    define('BASE_URL', '');
}
?>
    </div><!-- .container (opened in header) -->

    <footer class="bg-dark text-white pt-4 pb-2 mt-auto border-top border-secondary">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Columna: Logos y Nombre -->
                <div class="col-md-4 col-lg-4 mx-auto mt-2">
                    <div class="mb-2">
                        <img src="<?= BASE_URL ?>/views/img/UAS.png" alt="UAS" class="footer-brand-img me-2" style="max-height: 40px;">
                        <img src="<?= BASE_URL ?>/views/img/FIMAZ.png" alt="FIMAZ" class="footer-brand-img" style="max-height: 40px;">
                    </div>
                    <h6 class="text-uppercase mb-2 fw-bold text-warning small">Tienda MVC</h6>
                    <p class="small text-white-50">Sistema académico de catálogo y administración de productos.</p>
                </div>

                <!-- Columna: Info -->
                <div class="col-md-4 col-lg-4 mx-auto mt-2">
                    <h6 class="text-uppercase mb-2 fw-bold text-warning small">Tecnologías</h6>
                    <p class="small mb-1 text-white-50">PHP 8 (MVC) & MySQL</p>
                    <p class="small mb-1 text-white-50">Bootstrap 5.3 & PDO</p>
                </div>

                <!-- Columna: Ubicación -->
                <div class="col-md-4 col-lg-4 mx-auto mt-2">
                    <h6 class="text-uppercase mb-2 fw-bold text-warning small">Institución</h6>
                    <p class="small mb-1 text-white-50">Universidad Autónoma de Sinaloa</p>
                    <p class="small mb-1 text-white-50">Facultad de Informática Mazatlán</p>
                </div>
            </div>

            <hr class="my-3 opacity-25">

            <div class="row align-items-center pb-2">
                <div class="col-md-8">
                    <p class="small mb-0 text-white-50">
                        © <?= date('Y'); ?> <span class="text-warning">Desarrollo Web Avanzado</span> - Proyecto Académico.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <p class="small mb-0 text-muted" style="font-size: 0.75rem;">Versión 1.0.0</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
