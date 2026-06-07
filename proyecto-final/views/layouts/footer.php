<?php
if (!defined('BASE_URL')) {
    define('BASE_URL', '');
}
?>
    </div><!-- .container (opened in header) -->

    <footer class="bg-dark text-white pt-5 pb-4 mt-auto">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <!-- Columna: Logos y Nombre -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <div class="mb-4">
                        <img src="<?= BASE_URL ?>/views/img/UAS.png" alt="UAS" class="footer-brand-img me-2">
                        <img src="<?= BASE_URL ?>/views/img/FIMAZ.png" alt="FIMAZ" class="footer-brand-img">
                    </div>
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Tienda MVC</h5>
                    <p>Proyecto final de Desarrollo Web Avanzado. Sistema de catálogo y administración de productos.</p>
                </div>

                <!-- Columna: Enlaces rápidos o Info -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Tecnologías</h5>
                    <ul class="list-unstyled">
                        <li><p>PHP 8+ (POO & PDO)</p></li>
                        <li><p>Arquitectura MVC</p></li>
                        <li><p>MySQL (Transacciones)</p></li>
                        <li><p>Bootstrap 5.3</p></li>
                    </ul>
                </div>

                <!-- Columna: Contacto/Ubicación -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contacto Académico</h5>
                    <p>Universidad Autónoma de Sinaloa</p>
                    <p>Facultad de Informática Mazatlán</p>
                    <p>Junio, 2026</p>
                </div>
            </div>

            <hr class="mb-4">

            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p> <?= date('Y'); ?> Facultad de Informatica Mazatlan
                        <strong class="text-warning">Desarrollo Web Avanzado - UAS</strong>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <p class="text-md-end text-muted">Versión 1.0.0</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
