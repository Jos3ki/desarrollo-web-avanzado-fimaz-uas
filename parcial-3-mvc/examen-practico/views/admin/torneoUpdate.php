<?php
    require_once("../../controllers/torneosController.php");


    $id = $_POST['txtid'] ?? '';
    $nombreTorneo = $_POST['txtnombreTorneo'] ?? '';
    $organizador = $_POST['txtOrganizador'] ?? '';
    $patrocinadores = $_POST['txtPatrocinador'] ?? '';
    $sede = $_POST['txtSede'] ?? '';
    $categoria = $_POST['txtCategoria'] ?? '';
    $premio1 = $_POST['txtPremio1'] ?? '';
    $premio2 = $_POST['txtPremio2'] ?? '';
    $premio3 = $_POST['txtPremio3'] ?? '';
    $otroPremio = $_POST['txtOtroPremio'] ?? '';
    
 $objController = new torneosController();
    $objController->updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio);



?>
