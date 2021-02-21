<?php
if(isset($_SESSION['username'])){
	$mensagem = null;
	$cliente = Cliente::first("email='".$_SESSION['username']."'");
	if(isset($_POST['alterar_cliente'])){
		$nome = filter_var($_REQUEST['nome'], FILTER_SANITIZE_STRING);
		$cpf = filter_var($_REQUEST['cpf'], FILTER_SANITIZE_STRING);
		$senha = filter_var($_REQUEST['senha'], FILTER_SANITIZE_STRING);
		$email = $_REQUEST['email'];
		$cpfExists = Cliente::first("cpf='".$cpf."'");
		$emailExists = Cliente::first("email='".$email."'");
		echo var_dump($cpfExists);
		if($emailExists!=null&&$emailExists->email!=$cliente->email){
			$mensagem="E-mail já cadastrado. ";
		}
		else if($cpfExists != null&&$cpfExists->cpf!=$cliente->cpf){
			$mensagem="CPF já cadastrado. ";
		}	
		else{
			$cliente->nome = $nome;
			$cliente->cpf = $cpf;
			$cliente->email = $email;
			$cliente->senha = password_hash($senha, PASSWORD_DEFAULT);
			$cliente->save();
		}
	}
	include("view/cliente-alteracao.php");
}
else{
	include("view/404.php");
}
?>