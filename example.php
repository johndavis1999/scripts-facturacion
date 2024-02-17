<?php

include ('ejecutar.php');


$firmaFactura = $_POST['respuestaFirmarFactura'];
$validarContraseña = $_POST['respuestaValidarContraseña'];
$validarVigencia = $_POST['respuestaValidarVigencia'];


if(!empty($validarContraseña)){
      //Put Code
    
    $file = fopen("recibe.txt", "a+");
    fwrite($file, $validarContraseña .PHP_EOL);
    var_dump($validarContraseña);
    
      
}
if(!empty($validarVigencia)){

  //Put Code
    
    $file = fopen("recibe.txt", "w+");
    fwrite($file,$validarVigencia[0] .PHP_EOL);
    fwrite($file, $validarVigencia[1] .PHP_EOL);
    fwrite($file, $validarVigencia[2].PHP_EOL);
    var_dump($validarVigencia);
  
  //Put Code  
}

if (!empty($firmaFactura)) {
    
    $validarComprobante = $firmaFactura[0];
    $autorizacionComprobante = $firmaFactura[1];
    
    var_dump($validarComprobante);
    var_dump($autorizacionComprobante);
    
    //Put Code
    
}




$ruta_factura= 'http://localhost/factura-ec/factura.xml';
$ruta_certificado= 'http://localhost/factura-ec/certificados/1003640511001.p12';
$contraseña= 'Renesan-02';
$ruta_respuesta= 'http://localhost/factura-ec/example.php';


$ejecutar = new ejecutar();
$domain_dir = $_SERVER['SERVER_NAME'];

//Validar Contraseña del certificado
    //$ejecutar->validarContraseña($ruta_certificado,$contraseña,$ruta_respuesta);


//Validar Vigencia del certificado
    //$ejecutar->validarVigencia($ruta_certificado,$contraseña,$ruta_respuesta);


//Firmar Factura y enviar a SRI
    $ejecutar->firmarFactura($ruta_factura,$ruta_certificado,$contraseña,$ruta_respuesta);





