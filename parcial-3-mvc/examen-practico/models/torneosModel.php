<?php

    require_once("../../config/DataBase.php");

    class torneosModel {
        public $PDO;

        public function __construct()
        {
            $conecction = new DataBase();
            $this->PDO = $conecction->connect();
        }

        public function insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio, $usuario, $contrasena) {

            $contrasena = $this->passwordEncrypt($contrasena);

            $stmt = $this->PDO->prepare("INSERT INTO torneos VALUES(null, :nombreTorneo, :organizador, :patrocinadores, :sede, :categoria, 
            :premio1, :premio2, :premio3, :otroPremio, :usuario, :contrasena )");

            $stmt->bindParam(":nombreTorneo", $nombreTorneo);
            $stmt->bindParam(":organizador", $organizador);
            $stmt->bindParam(":patrocinadores", $patrocinadores);
            $stmt->bindParam(":sede", $sede);
            $stmt->bindParam(":categoria", $categoria);
            $stmt->bindParam(":premio1", $premio1);
            $stmt->bindParam(":premio2", $premio2);
            $stmt->bindParam(":premio3", $premio3);
            $stmt->bindParam(":otroPremio", $otroPremio);
            $stmt->bindParam(":usuario", $usuario);
            $stmt->bindParam(":contrasena", $contrasena);

            return $stmt->execute() ? $this->PDO->lastInsertId() : false ;
        }

        public function passwordEncrypt($password) {
            $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
            return $passwordEncrypted;
        }
        

        public function passwordDencrypted($passwordEncrypted, $passwordCandidate) {
            (password_verify($passwordCandidate, $passwordEncrypted)) ? true : false ;
        }

        public function read() {
            $stmt = $this->PDO->prepare("SELECT * FROM torneos");
            return ($stmt->execute()) ? $stmt->fetchAll() : false;
        }
    }
?>