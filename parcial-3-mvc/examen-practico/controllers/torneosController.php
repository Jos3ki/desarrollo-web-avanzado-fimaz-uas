<?php

    require_once (__DIR__ . "/../models/torneosModel.php");

    class torneosController {

        private $model;

        public function __construct()
        {
            $this->model = new torneosModel();
        }

        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio, $usuario, $contrasena) {

            $id = $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
            $premio3,$otroPremio, $usuario, $contrasena);
            return ($id!=false) ? header("Location: admin.php") : header("Location: frmTorneos.php");
            
        }

        public function readTorneo() {
            $rows = $this->model->read();
            return $rows ? $rows : false;
        }

        public function readOneTorneo($id){
            $torneo = $this->model->readOne($id);
            return ($torneo != false) ? $torneo : header("Location: admin.php");
        }

        public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio){
            ($this->model->update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio)) !=false ? header("Location: readOneTorneo.php?id=".$id) : header("Location: readAllTorneos.php"); 

        }

        public function delete($id){
            return ($this->model->delete($id)) ? header("Location: readAllTorneos.php") : header("Location: readOneTorneo.php?id=".$id);
        }
    }

?>
