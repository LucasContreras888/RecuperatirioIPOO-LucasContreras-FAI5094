<?php
class Cuota{
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada; //true o false

    //Constructor
    public function __construct($numero, $monto_cuota, $monto_interes){
        $this->numero = $numero;
        $this->monto_cuota = $monto_cuota;
        $this->monto_interes = $monto_interes;
        $this->cancelada = false; ;
    }
    //Getters
    public function getNumero(){
        return $this->numero;
    }
    public function getMontoCuota(){
        return $this->monto_cuota;
    }
    public function getMontoInteres(){
        return $this->monto_interes;
    }
    public function getCancelada(){
        return $this->cancelada;
    }
    //Setters
    private function setNumero($numero){
        $this->numero = $numero;
    }
    private function setMontoCuota($monto_cuota){
        $this->monto_cuota = $monto_cuota;
    }
    private function setMontoInteres($monto_interes){
        $this->monto_interes = $monto_interes;
    }
    private function setCancelada($cancelada){
        $this->cancelada = $cancelada;
    }
    //Metodos
    public function darMontoFinalCuota(){
        return $this->getMontoCuota() + $this->getMontoInteres();
    }
}
?>