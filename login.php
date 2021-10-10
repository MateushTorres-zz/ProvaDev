<?php


session_start();
include('model/Conexao.php');

$conexao = Conexao::get_instance();

$cpf = $_POST['cpf'];
$senha =$_POST['senha'];
$query = "select cpf from users where cpf = '{$cpf}' and Senha = md5('{$senha}')";

$statement = $conexao->query($query);
$statement->execute();
$row = $statement->fetchAll();

if(count($row) == 1) {
	$_SESSION['cpf'] = $cpf;
	header('Location: listuser.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
