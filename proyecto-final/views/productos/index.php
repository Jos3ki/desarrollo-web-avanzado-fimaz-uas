<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Administración de productos</h2>
    <div>
        <a href="<?= BASE_URL ?>/productos/create" class="btn btn-success">Nuevo producto</a>
        <a href="<?= BASE_URL ?>/logout" class="btn btn-danger">Cerrar sesión</a>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>SKU</th>
            <th>Nombre</th>
            <th>Precio compra</th>
            <th>Precio venta</th>
            <th>Existencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= (int)$producto['id']; ?></td>
                <td>
                    <?php if (!empty($producto['imagen'])): ?>
                        <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($producto['imagen']); ?>"
                             alt="<?= htmlspecialchars($producto['nombre']); ?>"
                             class="img-thumbnail producto-thumb-img">
                    <?php else: ?>
                        <span class="text-muted">Sin imagen</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($producto['sku']); ?></td>
                <td><?= htmlspecialchars($producto['nombre']); ?></td>
                <td><?= number_format((float)$producto['precio_compra'], 2); ?></td>
                <td><?= number_format((float)$producto['precio_venta'], 2); ?></td>
                <td><?= (int)$producto['existencia']; ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/productos/edit/<?= (int)$producto['id']; ?>"
                       class="btn btn-primary btn-sm">Editar</a>

                    <form action="<?= BASE_URL ?>/productos/delete" method="POST" class="d-inline">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="id" value="<?= (int)$producto['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Deseas eliminar este producto?');">
                            Eliminar
                        </button>
                    </form>
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
                    <a class="page-link" href="<?= BASE_URL ?>/productos?page=<?= $i; ?>">
                        <?= $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>