<?php

/**1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.*/
 



class Moto{

    private int $codigoMoto;
    private float $costoMoto;
    private int $anioFabricacionMoto;
    private string $descripcionMoto;
    private float $porcentajeIncrementoAnualMoto;
    private bool $disponibleParaVenta;


    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentajeAnual,$disponibilidad){
        $this->codigoMoto = $codigo;
        $this->costoMoto = $costo;
        $this->anioFabricacionMoto = $anioFabricacion;
        $this->descripcionMoto = $descripcion;
        $this->porcentajeIncrementoAnualMoto = $porcentajeAnual;
        $this->disponibleParaVenta = $disponibilidad;
    }
    


    /**
     * Get the value of codigoMoto
     */ 
    public function getCodigoMoto()
    {
        return $this->codigoMoto;
    }

    /**
     * Set the value of codigoMoto
     *
     * @return  self
     */ 
    public function setCodigoMoto($codigo)
    {
        $this->codigoMoto = $codigo;

    }

    /**
     * Get the value of costoMoto
     */ 
    public function getCostoMoto()
    {
        return $this->costoMoto;
    }

    /**
     * Set the value of costoMoto
     *
     * @return  self
     */ 
    public function setCostoMoto($costo)
    {
        $this->costoMoto = $costo;

    }

    /**
     * Get the value of anioFabricacionMoto
     */ 
    public function getAnioFabricacionMoto()
    {
        return $this->anioFabricacionMoto;
    }

    /**
     * Set the value of anioFabricacionMoto
     *
     * @return  self
     */ 
    public function setAnioFabricacionMoto($anioFabricacion)
    {
        $this->anioFabricacionMoto = $anioFabricacion;

    }

    /**
     * Get the value of descripcionMoto
     */ 
    public function getDescripcionMoto()
    {
        return $this->descripcionMoto;
    }

    /**
     * Set the value of descripcionMoto
     *
     * @return  self
     */ 
    public function setDescripcionMoto($descripcion)
    {
        $this->descripcionMoto = $descripcion;

    }

    /**
     * Get the value of porcentajeIncrementoAnualMoto
     */ 
    public function getPorcentajeIncrementoAnualMoto()
    {
        return $this->porcentajeIncrementoAnualMoto;
    }

    /**
     * Set the value of porcentajeIncrementoAnualMoto
     *
     * @return  self
     */ 
    public function setPorcentajeIncrementoAnualMoto($porcentajeAnual)
    {
        $this->porcentajeIncrementoAnualMoto = $porcentajeAnual;

    }

    /**
     * Get the value of disponibleParaVenta
     */ 
    public function getDisponibleParaVenta()
    {
        return $this->disponibleParaVenta;
    }

    /**
     * Set the value of disponibleParaVenta
     *
     * @return  self
     */ 
    public function setDisponibleParaVenta($disponibilidad)
    {
        $this->disponibleParaVenta = $disponibilidad;

    }

    public function __toString(){

        return "(".$this->getCodigoMoto()." ".$this->getCostoMoto()." ".$this->getAnioFabricacionMoto()." ".$this->getDescripcionMoto()." ".$this->getPorcentajeIncrementoAnualMoto()." ".$this->getDisponibleParaVenta().")\n";


    }


 /*   Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
      Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
      la venta, el método realiza el siguiente cálculo:
      $_venta = $_compra + $_compra * (anio * por_inc_anual)
      donde $_compra: es el costo de la moto.
      anio: cantidad de años transcurridos desde que se fabricó la moto.
      por_inc_anual: porcentaje de incremento anual de la moto. */

    public function  darPrecioVenta(){

        $venta = - 1;
        $anioActual = date("Y");
        $costo = $this->getCostoMoto();
        $porcentaje = $this->getPorcentajeIncrementoAnualMoto();
        $anioFabricacion = $this->getAnioFabricacionMoto();
        if ($this->getDisponibleParaVenta()!= false){

            $anio = $anioActual - $anioFabricacion;//cantidad de años transcurridos desde que se fabricó la moto

            $venta =  $costo +  $costo * ($anio * $porcentaje);

        }

        return $venta;


    }


    
}