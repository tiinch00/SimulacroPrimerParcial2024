<?php

/**1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase. */


include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";

class Empresa{

    private $denominacionEmpresa;
    private $direccionEmpresa;
    private array $colClientesEmpresa;
	private array $coleccionMotos;
    private array $colVentasRealizadasEmpresa;

	public function __construct($denominacion, $direccion, array $colClientes,array $colMotos, array $colVentasRealizadas) {


		$this->denominacionEmpresa = $denominacion;
		$this->direccionEmpresa = $direccion;
		$this->colClientesEmpresa = $colClientes;
		$this->coleccionMotos = $colMotos;
		$this->colVentasRealizadasEmpresa = $colVentasRealizadas;
	}

	public function getDenominacionEmpresa() {
		return $this->denominacionEmpresa;
	}

	public function setDenominacionEmpresa($denominacion) {
		$this->denominacionEmpresa = $denominacion;
	}

	public function getDireccionEmpresa() {
		return $this->direccionEmpresa;
	}

	public function setDireccionEmpresa($direccion) {
		$this->direccionEmpresa = $direccion;
	}

	public function getColClientesEmpresa(){
		return $this->colClientesEmpresa;
	}

	public function setColClientesEmpresa(array $colClientes) {
		$this->colClientesEmpresa = $colClientes;
	}
	/**
	 * Get the value of objVentas
	 */ 
	public function getColeccionMotos()
	{
		return $this->coleccionMotos;
	}

	/**
	 * Set the value of objVentas
	 *
	 * @return  self
	 */ 
	public function setColeccionMotos($colMotos)
	{
		$this->coleccionMotos = $colMotos;

	}

	public function getColVentasRealizadasEmpresa() {
		return $this->colVentasRealizadasEmpresa;
	}

	public function setColVentasRealizadasEmpresa(array $colVentasRealizadas) {
		$this->colVentasRealizadasEmpresa = $colVentasRealizadas;
	}

	public function toString(){

		$cadena =  "Denominacio: ".$this->getDenominacionEmpresa()."\n";
		$cadena .= "Direccion: ".$this->getDireccionEmpresa()."\n";
		$cadena .= print_r($this->getColClientesEmpresa())."\n";
		$cadena .= print_r($this->getColVentasRealizadasEmpresa())."\n";
		return $cadena;
	}

    /**. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
     retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
    */

	public function retornarMoto($codigoMoto) {
		$objRetorno = null;
		$coleccion =$this->getColeccionMotos();

		foreach($coleccion  as $moto){
			if($moto->getCodigoMoto()== $codigoMoto){
				$objRetorno = $moto;
			}

		}
		return $objRetorno;

	}

	/**Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
     parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
     se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
     Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
     para registrar una venta en un momento determinado.
     El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
     venta */

	public function registrarVenta($colCodigosMoto, $objCliente){
    $precioFinal = 0;
    $contadorVentas = 0;
    $ventaExitosa = false;
    $coleccionMotos = [];

    foreach ($colCodigosMoto as $codigoMoto) {
        $objMoto = $this->retornarMoto($codigoMoto);
        if ($objMoto != null && $objCliente->getEstadoCliente() == "activo") {
            $coleccionMotos[] = $objMoto;
            $ventaExitosa = true;
        }
    }

    if ($ventaExitosa) {
        $contadorVentas++;
        $precioFinal += $objMoto->getPrecioVenta(); 
        $objVenta = new Venta($contadorVentas, date("Y"), $objCliente, $coleccionMotos, $precioFinal);
        $objVenta->incorporarMoto($objMoto);
        
        // Agregar la venta a la colección existente
        $this->setColVentasRealizadasEmpresa([$this->getColVentasRealizadasEmpresa(), $objVenta]);
    }

    return $precioFinal;
}

	/**Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
     número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */

	 public function retornarVentasXCliente($tipo,$numDoc){
		$ventasCliente = [];
		$coleccionDeVentas =$this->getColVentasRealizadasEmpresa();
		foreach($coleccionDeVentas  as $venta ){
			$clienteVenta = $venta->getObjetoCliente();
			if($clienteVenta->getTipoDocumento()== $tipo && $clienteVenta->getNroDocumento() === $numDoc){

				$ventasCliente[] = $venta;
			}

			}
			return $ventasCliente;
		}



	 }
	

	
