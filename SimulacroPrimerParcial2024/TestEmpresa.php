
<?php

include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";


//instancias clase Cliente

$objCliente1 = new Cliente("Pablo","Juarez","activo","DNI",37456894);

//echo $objCliente1;

$objCliente2 = new Cliente("Martin","Perez","activo","DNI",35312456);

$colClientes = [$objCliente1,$objCliente2];
//echo $objCliente2;
// instancias clase moto

$objMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);

$objMoto2 = new Moto(12,584000, 2021 ,"Zanella Zr 150 Ohc ",70 ,true);

$objMoto3 = new Moto(13,999900, 2023 ,"Zanella Patagonian Eagle 250 ",55,false);
$colObjMotos = [$objMoto1,$objMoto2,$objMoto3];

$coleccionVentas = [];
//echo $objMoto1;
//echo $objMoto2;
//echo $objMoto3;

// instancia clase empresa

$objEmpresa = new Empresa("Alta Gama","Avenida Argentina 123",$colClientes, $colObjMotos,$coleccionVentas);


/**Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.*/
//echo "El valor total es: $" . $objEmpresa->registrarVenta([11,12,13], $objCliente2) . "\n";
/**Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.*/
//echo "El valor total es: $" .$objEmpresa->registrarVenta([11], $objCliente1);
/**Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.*/
//echo "El valor total es: $" . $objEmpresa->registrarVenta([2], $objCliente2);
/**8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.*/
$colCliente1 = $objEmpresa->retornarVentasXCliente("DNI", 40254658);
print_r($colCliente1);

/**Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2*/
$colCliente2 = $objEmpresa->retornarVentasXCliente("DNI", 30123456);
print_r($colCliente2);
//Realizar un echo de la variable Empresa creada en 2. */

//echo $objEmpresa;