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
$arquivo_Certificado = '/opt/lampp/htdocs/provadev/' . basename($data['Certificado']);

$certData = $x509->loadX509(file_get_contents($arquivo_Certificado));

$issuer = $x509->getIssuerDN();

print_r(json_encode($issuer));die;

$data['issuer'] = json_encode($issuer);


if(isset($data) && !empty($data)){
    $manager->insertUser("users", $data);

    header("Location: ../index.php?user_add_success");
}

