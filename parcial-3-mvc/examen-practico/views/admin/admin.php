<?php
    require_once("../admin/template/header.php");
?>

<div class="mx-auto p-5">


<div class="card text-center">
  <div class="card-header">
    MENÚ.
  </div>
  <div class="card-body">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="card text-center h-100">
                    <div class="card-header">
                        CREAR TORNEO
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="frmTorneos.php" class="btn btn-primary">
                            <img src="../img/torneo-admin.png" alt="Crear un torneo." width="180" height="180">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card text-center h-100">
                    <div class="card-header">
                        LISTA DE TORNEOS
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="readAllTorneos.php" class="btn btn-primary">
                            <img src="../img/lista-torneo-admin.png" alt="Ver lista de torneos." width="180" height="180">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card text-center h-100">
                    <div class="card-header">
                        ESTADISTICAS
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <span class="text-muted"></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card text-center h-100">
                    <div class="card-header">
                        ANUNCIOS
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <span class="text-muted"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="card-footer text-body-secondary">
    Configuracion de torneos. Web App Basket-ball
  </div>
</div>
</div>
<?php
    require_once("../admin/template/footer.php");
?>
