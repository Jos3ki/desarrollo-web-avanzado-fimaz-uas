<?php

    require_once ("../../models/torneosModel.php");

    class tornesoController {

        private $model;

        public function __construct()
        {
            $this->model = new torneoModel();
        }

        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio, $usuario, $contrasena) {

            $id = $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
            $premio3,$otroPremio, $usuario, $contrasena);
            return ($id!=false) ? header("Location: mainTorneos.php") : header("Location: frmTorneos.php");
            
        }
    }

?>