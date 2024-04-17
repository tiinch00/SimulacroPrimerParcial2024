<?php

//Getters: sin parámetro y con retorno
//Setters: con parámetro y sin retorno
/**0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */


class Cliente{

    private string $nombreCliente;
    private string $apellidoCliente;
    private string $estadoCliente;
    private string $tipoDocumento;
    private int $numeroDocumento;

    public function __construct($nombre,$apellido,$estado,$tipoDoc,$nroDoc){

        $this->nombreCliente = $nombre;
        $this->apellidoCliente =$apellido;
        $this->estadoCliente = $estado;
        $this->tipoDocumento = $tipoDoc;
        $this->numeroDocumento = $nroDoc;
    }

    


    /**
     * Get the value of nombreCliente
     */ 
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * Set the value of nombreCliente
     *
     * @return  self
     */ 
    public function setNombreCliente($nombre)
    {
        $this->nombreCliente = $nombre;

    }

    /**
     * Get the value of apellidoCliente
     */ 
    public function getApellidoCliente()
    {
        return $this->apellidoCliente;
    }

    /**
     * Set the value of apellidoCliente
     *
     * @return  self
     */ 
    public function setApellidoCliente($apellido)
    {
        $this->apellidoCliente = $apellido;

    }

    /**
     * Get the value of dadoDeBaja
     */ 
    public function getEstadoCliente()
    {
        return $this->estadoCliente;
    }

    /**
     * Set the value of dadoDeBaja
     *
     * @return  self
     */ 
    public function setEstadoCliente($estado)
    
    {
        $this->estadoCliente = $estado;

        
    }

    /**
     * Get the value of tipoDocumento
     */ 
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set the value of tipoDocumento
     *
     * @return  self
     */ 
    public function setTipoDocumento($tipoDoc)
    {
        $this->tipoDocumento = $tipoDoc;

        
    }

    /**
     * Get the value of nueroDocumento
     */ 
    public function getNueroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set the value of nueroDocumento
     *
     * @return  self
     */ 
    public function setNueroDocumento($nroDoc)
    {
        $this->numeroDocumento = $nroDoc;

    }

    public function __toString(){

        $cadena = "El nombre y apellido del cliente es: " .$this->getNombreCliente()." ".$this->getApellidoCliente()."\n";
        $cadena .= "El estado es: " . $this->getEstadoCliente()."\n";
        $cadena .= "El tipo y numero de documento es: " . $this->getTipoDocumento()." ". $this->getNueroDocumento()."\n";

        return $cadena;

    }
}