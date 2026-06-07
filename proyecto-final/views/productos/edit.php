<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <h2 class="mb-3">Editar producto</h2>

        <form action="<?= BASE_URL ?>/productos/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
            <input type="hidden" name="id" value="<?= (int)$producto['id']; ?>">

            <div class="mb-3">
                <label class="form-label">SKU</label>
                <input type="text" name="sku" class="form-control" value="<?= htmlspecialchars($producto['sku']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required><?= htmlspecialchars($producto['descripcion']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio compra</label>
                <input type="number" step="0.01" name="precio_compra" class="form-control" value="<?= htmlspecialchars((string)$producto['precio_compra']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio venta</label>
                <input type="number" step="0.01" name="precio_venta" class="form-control" value="<?= htmlspecialchars((string)$producto['precio_venta']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Existencia</label>
                <input type="number" name="existencia" class="form-control" value="<?= (int)$producto['existencia']; ?>" required>
            </div>

            <?php if (!empty($producto['imagen'])): ?>
                <div class="mb-3">
                    <label class="form-label">Imagen actual</label><br>
                    <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($producto['imagen']); ?>"
                         alt="Imagen del producto" class="img-thumbnail producto-preview-img">
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Cambiar imagen</label>
                <input type="file" name="imagen" class="form-control" accept="image/*">
                <div class="form-text">Formatos permitidos: JPG, PNG, WEBP. Máximo 2MB.</div>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="<?= BASE_URL ?>/productos" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
