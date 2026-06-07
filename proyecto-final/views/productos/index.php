<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Administración de productos</h2>
    <div>
        <a href="<?= BASE_URL ?>/productos/create" class="btn btn-success">Nuevo producto</a>
        <a href="<?= BASE_URL ?>/logout" class="btn btn-danger">Cerrar sesión</a>
    </div>
</div>

<table class="table table-hover align-middle border">
    <thead class="table-dark">
        <tr>
            <th class="text-center">ID</th>
            <th>Imagen</th>
            <th>SKU</th>
            <th>Nombre</th>
            <th class="text-end">Precio Compra</th>
            <th class="text-end">Precio Venta</th>
            <th class="text-center">Stock</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td class="text-center text-muted small"><?= (int)$producto['id']; ?></td>
                <td>
                    <?php if (!empty($producto['imagen'])): ?>
                        <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($producto['imagen']); ?>"
                             alt="<?= htmlspecialchars($producto['nombre']); ?>"
                             class="producto-thumb-img shadow-sm">
                    <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center producto-thumb-img text-muted small italic">
                            N/A
                        </div>
                    <?php endif; ?>
                </td>
                <td class="fw-semibold small"><?= htmlspecialchars($producto['sku']); ?></td>
                <td><?= htmlspecialchars($producto['nombre']); ?></td>
                <td class="text-end">$<?= number_format((float)$producto['precio_compra'], 2); ?></td>
                <td class="text-end fw-bold text-success">$<?= number_format((float)$producto['precio_venta'], 2); ?></td>
                <td class="text-center">
                    <span class="badge <?= (int)$producto['existencia'] > 0 ? 'bg-light text-dark border' : 'bg-danger'; ?>">
                        <?= (int)$producto['existencia']; ?>
                    </span>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="<?= BASE_URL ?>/productos/edit/<?= (int)$producto['id']; ?>"
                           class="btn btn-outline-primary btn-sm">
                           Editar
                        </a>

                        <form action="<?= BASE_URL ?>/productos/delete" method="POST" class="d-inline">
                            <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="id" value="<?= (int)$producto['id']; ?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('¿Deseas eliminar este producto?');">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (!empty($totalPaginas) && $totalPaginas > 1): ?>
    <nav aria-label="Paginación de productos">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= $i === $pagina ? 'active' : ''; ?>">
                    <a class="page-link" href="<?= BASE_URL ?>/productos/page/<?= $i; ?>">
                        <?= $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>