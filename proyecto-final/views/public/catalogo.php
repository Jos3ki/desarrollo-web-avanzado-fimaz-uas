<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row mb-4">
    <div class="col-md-8">
        <h2>Catálogo público de productos</h2>
        <p>Consulta los productos disponibles y realiza búsquedas por nombre o descripción.</p>
    </div>
</div>

<form method="GET" action="<?= BASE_URL ?>/catalogo" class="row g-2 mb-4">

    <div class="col-md-10">
        <input type="text" name="buscar" class="form-control"
               placeholder="Buscar por nombre o descripción"
               value="<?= htmlspecialchars($termino ?? ''); ?>">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Buscar</button>
    </div>
</form>

<div class="row">
    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Contenedor de Imagen con Badge de Precio -->
                    <div class="position-relative bg-light d-flex align-items-center justify-content-center p-3" style="height: 220px;">
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($producto['imagen']); ?>"
                                 class="img-fluid" alt="<?= htmlspecialchars($producto['nombre']); ?>"
                                 style="max-height: 100%; object-fit: contain;">
                        <?php else: ?>
                            <div class="text-muted small italic">Sin imagen</div>
                        <?php endif; ?>
                        
                        <!-- Badge de Precio Flotante -->
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-success fs-6 shadow-sm">
                                $<?= number_format((float)$producto['precio_venta'], 2); ?>
                            </span>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">
                                SKU: <?= htmlspecialchars($producto['sku']); ?>
                            </small>
                            <h5 class="card-title mb-1 fw-bold"><?= htmlspecialchars($producto['nombre']); ?></h5>
                        </div>
                        
                        <p class="card-text text-muted small flex-grow-1">
                            <?= mb_strimwidth(htmlspecialchars($producto['descripcion']), 0, 100, "..."); ?>
                        </p>
                        
                        <div class="mt-3 pt-2 border-top">
                            <small class="d-block text-muted" style="font-size: 0.75rem;">Existencia</small>
                            <span class="fw-bold <?= (int)$producto['existencia'] > 0 ? 'text-dark' : 'text-danger'; ?>">
                                <?= (int)$producto['existencia']; ?> unidades disponibles
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-warning">No se encontraron productos.</div>
        </div>
    <?php endif; ?>
</div>

<?php if (!empty($totalPaginas) && $totalPaginas > 1): ?>
    <?php $terminoUrl = $termino !== '' ? '?buscar=' . urlencode($termino) : ''; ?>
    <nav aria-label="Paginación del catálogo">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= $i === $pagina ? 'active' : ''; ?>">
                    <a class="page-link" href="<?= BASE_URL ?>/catalogo/page/<?= $i; ?><?= $terminoUrl; ?>">
                        <?= $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>