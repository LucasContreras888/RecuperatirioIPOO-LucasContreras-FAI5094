<?php
class Financiera {
    private $denominacion;
    private $direccion;
    private $colPrestamosOtorgados;

    public function __construct($denominacion, $direccion) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colPrestamosOtorgados = [];
    }

    //Getters
    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColPrestamosOtorgados() {
        return $this->colPrestamosOtorgados;
    }

    //setters
    private function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    private function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    private function setColPrestamosOtorgados($colPrestamosOtorgados) {
        $this->colPrestamosOtorgados = $colPrestamosOtorgados;
    }
    //tostring
    public function __toString(){
        return "Denominacion: " . $this->getDenominacion() . "\n" .
               "Direccion: " . $this->getDireccion() . "\n" .
               "ColPrestamosOtorgados: " . $this->getColPrestamosOtorgados() . "\n";
    }
    public function otorgarPrestamo($monto, $cantidad_de_cuotas, $interes, $OBJCliente){
        $nuevoPrestamo = new Prestamo($monto, $cantidad_de_cuotas, $interes, $OBJCliente);
        $this->colPrestamosOtorgados[] = $nuevoPrestamo;
        return $nuevoPrestamo;
    }

    public function otorgarPrestamoSiCalifica() {
        $prestamosAprobados = [];
        
        foreach ($this->colPrestamosOtorgados as $prestamo) {
            if (empty($prestamo->getColeccionCuotas())) {
                $cliente = $prestamo->getReferenciaPersona();
                
                $cuotaMensual = $prestamo->getMonto() / $prestamo->getCantidadDeCuotas();
                $maximoPermitido = $cliente->getNeto() * 0.4; // 40%
                
                if ($cuotaMensual <= $maximoPermitido) {
                    $prestamo->otorgarPrestamo();
                    $prestamosAprobados[] = $prestamo;
                }
            }
        }
        
        return $prestamosAprobados;
    }

    public function informarCuotaPagada($idPrestamo){
        foreach($this->colPrestamosOtorgados as $prestamo){
            if($prestamo->getIdentificacion() == $idPrestamo){
                return $prestamo->darSiguienteCuotaPagar();
            }
        }
        return null;

    }
}


?>