<?php

class Producto {

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $existencia;


    public function __construct($id = null, $nombre = "", $descripcion = "", $precio = 0.0, $existencia = 0)
    {
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->id = $id;
    }


    public function getid(){
        return $this->id;
    }


    public function getnombre() {
    return $this->nombre;

    }


    public function getdescripcion() {
    return $this->descripcion;
    }

    public function getprecio() {
    return $this->precio;

    }

    public function getexistencia(){
    return $this->existencia;
    }

    public function setid($nuevoid) {
        $this->id = $nuevoid;
    }

    public function setnombre($nuevonombre){
        $this->nombre = $nuevonombre;

    }

    public function setdescripcion($nuevadescripcion) {
    $this->descripcion = $nuevadescripcion;
    }

    public function setprecio($nuevoprecio) {
    $this->precio = $nuevoprecio;
    }

    public function setexistencia($nuevaexistencia) {
    $this->existencia = $nuevaexistencia;

    }
}   