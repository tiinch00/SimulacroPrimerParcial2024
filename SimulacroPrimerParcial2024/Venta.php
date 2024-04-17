<?php
/**1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */

class Venta {

    private  $numeroVenta;
    private $fechaDeVenta;
    private object $objetoCliente;
    private array $coleccionMotos ;
    private  $precioFinalVenta;

	public function __construct($nroVenta, $fechaDeVenta, $objCliente, $colMotos, $precioFinal) {

		$this->numeroVenta = $nroVenta;
		$this->fechaDeVenta = $fechaDeVenta;
		$this->objetoCliente = $objCliente;
		$this->coleccionMotos = $colMotos;
		$this->precioFinalVenta = $precioFinal;
	}

	public function getNumeroVenta(){
		return $this->numeroVenta;
	}

	public function setNumeroVenta($nroVenta) {
		$this->numeroVenta = $nroVenta;
	}

	public function getFechaDeVenta() {
		return $this->fechaDeVenta;
	}

	public function setFechaDeVenta($fechaDeVenta) {
		$this->fechaDeVenta = $fechaDeVenta;
	}

	public function getObjetoCliente() {
		return $this->objetoCliente;
	}

	public function setObjetoCliente($objCliente) {
		$this->objetoCliente = $objCliente;
	}

	public function getColeccionMotos() {
		return $this->coleccionMotos;
	}

	public function setColeccionMotos($colMotos) {
		$this->coleccionMotos = $colMotos;
	}

	public function getPrecioFinalVenta() {
		return $this->precioFinalVenta;
	}

	public function setPrecioFinalVenta( $precioFinal) {
		$this->precioFinalVenta = $precioFinal;
	}
    //4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
    public function toString(){
		$motos = $this->getColeccionMotos();

		$cadena = "Numero de venta: ". $this->getNumeroVenta() ."\n";
		$cadena .= "Fecha de la venta: ".$this-> getFechaDeVenta() ."\n";
		$cadena .= "Info del Cliente: " .$this->getObjetoCliente() . "\n";
		$cadena .= "Coleccion de motos " .print_r($motos). "\n";
		$cadena .= "Precion final $" .$this->getPrecioFinalVenta() . "\n";

		return $cadena;

    }

    /**Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
     incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
     vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
     Utilizar el método que calcula el precio de venta de la moto donde crea necesario  */

     public function incorporarMoto($objMoto){
         // Calcula el precio de venta de la moto
		 
         $precioVentaMoto = $objMoto->darPrecioVenta();
		 $disponible = $objMoto->getDisponibleParaVenta();

		    if ($precioVentaMoto!= -1 && $disponible){ // una vez que verifico la vente, lo agrego a la coleccion
             // Agrega la moto a la colección de motos vendidas
			 $coleccionMotos = $this->getColeccionMotos();
             $coleccionMotos[] = $objMoto;
             $this->setColeccionMotos($coleccionMotos);

            

              $this->setPrecioFinalVenta($this->getPrecioFinalVenta() + $precioVentaMoto);

        }

     }


}