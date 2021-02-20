<?php
include("view/cliente-cadastro.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = filter_var($_REQUEST['nome'], FILTER_SANITIZE_STRING);
	$cpf = filter_var($_REQUEST['cpf'], FILTER_SANITIZE_STRING);
	$senha = filter_var($_REQUEST['senha'], FILTER_SANITIZE_STRING);
	$email = $_REQUEST['email'];
	if(filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
		$cliente = new Cliente();
		$cliente->nome = $nome;
		$cliente->cpf = $cpf;
		$cliente->email = $email;
		$cliente->senha = password_hash($senha, PASSWORD_DEFAULT);
		$cliente->save();
	}
}
?><a href="../compra/index.php">Compra</a>