<?php

include ('ejecutar.php');

$ruta_factura= base64_encode('http://localhost/factura-ec/factura.xml');
$ruta_certificado= base64_encode('http://localhost/factura-ec/certificados/1003640511001.p12');
$contraseña= base64_encode('contaseña de certificado');  
$ruta_respuesta= base64_encode('http://localhost/factura-ec/recibe.php');

$ejecutar = new ejecutar();
$domain_dir = $_SERVER['SERVER_NAME'];

//ValidarContraseña
header ("Location: /factura-ec/app/validarContraseña.php?ruta_certificado=".$ruta_certificado."&contraseña=".$contraseña."&ruta_respuesta=".$ruta_respuesta); 

//validarVigencia
header ("Location: /factura-ec/app/validarVigencia.php?ruta_certificado=".$ruta_certificado."&contraseña=".$contraseña."&ruta_respuesta=".$ruta_respuesta); 

//firmarFactura
header ("Location: /factura-ec/app/firmarFactura.php?ruta_factura=".$ruta_factura."&ruta_certificado=".$ruta_certificado."&contraseña=".$contraseña."&ruta_respuesta=".$ruta_respuesta); 




