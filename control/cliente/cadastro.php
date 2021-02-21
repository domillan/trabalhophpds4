<?php
if (isset($_GET['logout'])){
	unset($_SESSION['username']);
	header('Location: login.php');
}
if(!isset($_SESSION['username'])){
	$mensagem = null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nome = filter_var($_REQUEST['nome'], FILTER_SANITIZE_STRING);
		$cpf = filter_var($_REQUEST['cpf'], FILTER_SANITIZE_STRING);
		$senha = filter_var($_REQUEST['senha'], FILTER_SANITIZE_STRING);
		$email = $_REQUEST['email'];
		$cpfExists = Cliente::first("cpf='".$cpf."'");
		$emailExists = Cliente::first("email='".$email."'");
		echo var_dump($cpfExists);
		if($emailExists!=null){
			$mensagem="E-mail já cadastrado. ";
		}
		else if($cpfExists != null){
			$mensagem="CPF já cadastrado. ";
		}	
		else{
			$cliente = new Cliente();
			$cliente->nome = $nome;
			$cliente->cpf = $cpf;
			$cliente->email = $email;
			$cliente->senha = password_hash($senha, PASSWORD_DEFAULT);
			$cliente->save();
			$_SESSION['username'] = $cliente->email;
			header('Location: alteracao.php');
		}
	}
	include("view/cliente-cadastro.php");	
}
else {
	header('Location: alteracao.php');
}	
?>