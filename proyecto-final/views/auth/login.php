<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-12 col-md-8 col-lg-5 col-xl-4">
        <!-- Logo o Título Superior -->
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary" style="letter-spacing: -1px;">
                <span class="text-warning text-opacity-75">TIENDA</span>MVC
            </h3>
            <p class="text-muted small">Panel de Administración</p>
        </div>

        <div class="card shadow border-0 overflow-hidden">
            <div class="card-body p-4 p-md-5">
                <div class="mb-4">
                    <h4 class="fw-bold mb-1">Bienvenido</h4>
                    <p class="text-muted small">Ingresa tus credenciales para continuar</p>
                </div>

                <form action="<?= BASE_URL ?>/auth/login" method="POST">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary text-uppercase">Usuario</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="username" class="form-control bg-light border-start-0 ps-0" 
                                   placeholder="" required autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary text-uppercase">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input type="password" name="password" class="form-control bg-light border-start-0 ps-0" 
                                   placeholder="" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm" style="background-color: #0f172a; border: none;">
                        Iniciar Sesión
                    </button>
                </form>
            </div>
            <div class="card-footer bg-light border-0 py-3 text-center">
                <a href="<?= BASE_URL ?>/catalogo" class="text-decoration-none small text-muted">
                    <i class="bi bi-arrow-left"></i> Volver al catálogo
                </a>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <p class="small text-muted opacity-50">© <?= date('Y'); ?> UAS - Facultad de Informática</p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
