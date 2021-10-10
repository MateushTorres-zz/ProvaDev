<?php
require_once 'vendor/autoload.php';

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\File\X509;



$key = PublicKeyLoader::load(file_get_contents('teste.pem'), $password = false);
$x509 = new X509();

$certData = $x509->loadX509(file_get_contents('teste.pem'));

$issuer = $x509->getIssuerDN();

//print_r($issuer['id-at-countryName']);

//print_r( $certData['tbsCertificate']['validity']['notAfter']);die;
print_r($x509->getDN());
die;

?>
