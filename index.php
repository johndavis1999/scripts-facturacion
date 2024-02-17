<?php
header('Content-Type: text/html; charset=UTF-8');
echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16pt; color: #000000; margin-bottom: 10px;">';
echo 'SUNAT. Facturación electrónica Perú.<br>';
echo '<span style="color: #000099; font-size: 15pt;">Obtener archivos PEM para firmar facturas electrónicas.</span>';
echo '<hr width="100%"></div>';
//Contraseña del certificado
$contraseña = 'Renesan-02';
//Nombre del certificado con el formato .pfx
$nombreArchivo = 'certificados/1003640511001.p12';
//Devolvemos el el certificado como un string (cadena)
$pkcs12 = file_get_contents($nombreArchivo);
//Declaramos un arreglo para recuperar los certificados
$certificados = array();
//Pasamos los parámetros
$respuesta = openssl_pkcs12_read($pkcs12, $certificados, $contraseña);
//Si la respuesta es TRUE es porque se ha recuperado correctamente los certificados
if ($respuesta) {
    $publicKeyPem  = $certificados['cert']; //Archivo público
    $privateKeyPem = $certificados['pkey']; //Archivo privado
    //guardo la clave publica y privada en mi directorio en formato .pem
    file_put_contents('archivos_pem/private_key.pem', $privateKeyPem);
    file_put_contents('archivos_pem/public_key.pem', $publicKeyPem);
    chmod("archivos_pem/private_key.pem", 0777);
    chmod("archivos_pem/public_key.pem", 0777);
    echo '<span style="color: #015B01; font-size: 15pt;">Archivos .PEM creados correctamente.</span><br>';
    echo '<span style="color: #000000; font-size: 15pt;">private_key.pem</span><br>';
    echo '<span style="color: #000000; font-size: 15pt;">public_key.pem</span><br>';

echo '<hr width="100%"></div>';
        echo '<a href="crearxml.php">Crear XML</a>';
} else {
    echo '<span style="color: #A70202; font-size: 15pt;">';
    echo openssl_error_string();
    echo '</span>';
    echo '<a href="crearxml.php">Crear XML</a>';
}



if (!$almacén_cert = file_get_contents($nombreArchivo)) {
    echo "Error: No se puede leer el fichero del certificado\n";
    exit;
}

if (openssl_pkcs12_read($almacén_cert, $info_cert, $contraseña)) {
    echo "Información del certificado\n";
    print_r($info_cert);
} else {
    echo "Error: No se puede leer el almacén de certificados.\n";
    exit;
}
?>