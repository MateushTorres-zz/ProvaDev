<?php
require_once '../vendor/autoload.php';

include_once '../model/Conexao.php';
include_once '../model/Manager.php';
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\File\X509;

$x509 = new X509();

$manager = new Manager();

$data = $_POST;
$data['senha'] = md5($data['senha']);

$arquivo_Certificado = '../' . basename($data['Certificado']);

$certData = $x509->loadX509(file_get_contents($arquivo_Certificado));

$certificado = json_encode($x509->getIssuerDN());
$certificado = $certificado . json_encode($x509->getDN());
$certificado = $certificado . json_encode($certData['tbsCertificate']['validity']['notAfter']);

$data['Certificado'] = $certificado;

if(isset($data) && !empty($data)){
    $manager->insertUser("users", $data);

    header("Location: ../index.php?user_add_success");
}

