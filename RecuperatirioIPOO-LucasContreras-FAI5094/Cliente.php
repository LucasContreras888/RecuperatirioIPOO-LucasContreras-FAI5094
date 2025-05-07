<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $neto){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->neto = $neto;
    }

    //Getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    } 
    public function getDni(){
        return $this->dni;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getNeto(){
        return $this->neto;
    }

    //setters
    private function setNombre($nombre){
        $this->nombre = $nombre;
    }
    private function setApellido($apellido){
        $this->apellido = $apellido;
    }
    private function setDni($dni){
        $this->dni = $dni;
    }
    private function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    private function setMail($mail){
        $this->mail = $mail;
    }
    private function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    private function setNeto($neto){
        $this->neto = $neto;
    }

}
?>