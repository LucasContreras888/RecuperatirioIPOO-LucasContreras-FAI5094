<?php
class Prestamo{
    private static $contador = 1;
    private $identificacion;
    private $CodigoElectrodoméstico;
    private $fecha;
    private $monto;
    private $cantidad_de_cuotas;
    private $taza_interes;
    private $coleccionCuotas;
    private $referenciaPersona;

    //Contructor
    public function __construct($monto, $cantidad_de_cuotas, $taza_interes, $referenciaPersona){
        $this->monto = $monto;
        $this->cantidad_de_cuotas = $cantidad_de_cuotas;
        $this->taza_interes = $taza_interes;
        $this->referenciaPersona = $referenciaPersona;
        $this->identificacion = self::$contador++;
        $this->CodigoElectrodoméstico = "PREST-" . date('Ymd') . "-" . str_pad($this->identificacion, 4, '0', STR_PAD_LEFT);
        $this->fecha = new DateTime();
        $this->coleccionCuotas = [];
    }

    //geters
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getCodigoElectrodomestico(){
        return $this->CodigoElectrodoméstico;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getMonto(){
        return $this->monto;
    }
    public function getCantidadDeCuotas(){
        return $this->cantidad_de_cuotas;
    }
    public function getTazaInteres(){
        return $this->taza_interes;
    }
    public function getColeccionCuotas(){
        return $this->coleccionCuotas;
    }
    public function getReferenciaPersona(){
        return $this->referenciaPersona;
    }

    //setters
    private function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }
    private function setCodigoElectrodomestico($CodigoElectrodoméstico){
        $this->CodigoElectrodoméstico = $CodigoElectrodoméstico;
    }
    private function setFecha($fecha){
        $this->fecha = $fecha;
    }
    private function setMonto($monto){
        $this->monto = $monto;
    }
    private function setCantidadDeCuotas($cantidad_de_cuotas){
        $this->cantidad_de_cuotas = $cantidad_de_cuotas;
    }
    private function setTazaInteres($taza_interes){
        $this->taza_interes = $taza_interes;
    }
    private function setColeccionCuotas($coleccionCuotas){
        $this->coleccionCuotas = $coleccionCuotas;
    }
    private function setReferenciaPersona($referenciaPersona) {
        $this->referenciaPersona = $referenciaPersona;
    }

    //Metodos
    private function calcularInteresPrestamo($numCuota){
        if($numCuota < 1 || $numCuota > $this->getCantidadDeCuotas()){
            throw new Exception("El numero de cuota no es valido");
        }

        //calcular
        $capitalPorCuota = $this->getMonto() / $this->getCantidadDeCuotas();
        $capitalPagado = $capitalPorCuota * ($numCuota - 1);
        $saldoDeuda = $this->getMonto() - $capitalPagado;
        $interes = $saldoDeuda * ($this->getTazaInteres() / 100);

        return $interes;
    }

    public function otorgarPrestamo(){
        //Setemaos la fecha de otorgamiento.
        $this->setFecha(new DateTime());

        $montoBaseCuota = $this->getMonto() / $this->getCantidadDeCuotas();
        $cuotas = [];

        for($i = 1; $i <= $this->getCantidadDeCuotas(); $i++){
            $interes = $this->calcularInteresPrestamo($i);
            $cuota[] = new Cuota($i, $montoBaseCuota, $interes, false);
        }
        $this->setColeccionCuotas($cuotas);
    }

    public function darSiguienteCuotaPagar(){
        $cuotas = $this->getColeccionCuotas();
        foreach($cuotas as $cuota){
            if(!$cuota->getCancelada()){
                return $cuota;
            }
        }
        return null;
    }

}
?>