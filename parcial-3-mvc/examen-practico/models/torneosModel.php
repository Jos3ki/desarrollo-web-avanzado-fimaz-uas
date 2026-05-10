<?php

    require_once(__DIR__ . "/../config/DataBase.php");

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
            return password_verify($passwordCandidate, $passwordEncrypted);
        }

        public function read() {
            $stmt = $this->PDO->prepare("SELECT * FROM torneos");
            return ($stmt->execute()) ? $stmt->fetchAll() : false;
        }

        public function readOne($id){
            $statement = $this->PDO->prepare("SELECT * FROM torneos WHERE id= :id limit 1");
            $statement->bindParam(":id", $id );
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2,
         $premio3, $otroPremio){

             $stmt = $this->PDO->prepare("UPDATE torneos SET nombreTorneo = :nombreTorneo, organizador = :organizador, patrocinadores = :patrocinadores, sede = :sede, categoria = :categoria, 
            premio1 = :premio1, premio2 = :premio2, premio3 = :premio3, otroPremio = :otroPremio WHERE id = :id");
            
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nombreTorneo", $nombreTorneo);
            $stmt->bindParam(":organizador", $organizador);
            $stmt->bindParam(":patrocinadores", $patrocinadores);
            $stmt->bindParam(":sede", $sede);
            $stmt->bindParam(":categoria", $categoria); 
            $stmt->bindParam(":premio1", $premio1);
            $stmt->bindParam(":premio2", $premio2);
            $stmt->bindParam(":premio3", $premio3);
            $stmt->bindParam(":otroPremio", $otroPremio);

            return ($stmt->execute()) ? $id : false;
            
        }

            public function delete($id){
            $statement = $this->PDO->prepare("DELETE FROM torneos WHERE id= :id");
            $statement->bindParam(":id", $id );
            return ($statement->execute()) ? true : false;
        }
    }
?> 
