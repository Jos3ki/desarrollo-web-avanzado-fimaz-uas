<?php
    require_once("../admin/template/header.php");
    require_once("../../controllers/torneosController.php");

    $objTorneosController = new torneosController();

    $rows = $objTorneosController->readTorneo();

?>
<div class="card text-center">
        <div class="card-header">
            LISTADO DE TORNEOS
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TORNEO</th>
                        <th scope="col">ORGANIZADOR</th>
                        <th scope="col">ACCION</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if($rows): ?>
                        <?php foreach($rows as $row): ?>
                            <tr>
                                <th><?= $row['id'] ?></th>
                                <th><?= $row['nombreTorneo'] ?></th>
                                <th><?= $row['organizador'] ?></th>
                                <th>
                                    ACCIONES: LEER UNO, EDITAR, ELIMINAR.
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">
                               No hay torneos aún. 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    require_once("../admin/template/footer.php");
?>