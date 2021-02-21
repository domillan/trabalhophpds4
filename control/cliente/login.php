<?php
if (isset($_GET['logout'])){
	unset($_SESSION['username']);
	header('Location: login.php');
}
if(!isset($_SESSION['username'])){
	$mensagem = null;	
	if (isset($_POST['logar'])){
		$senha = $_REQUEST['senha'];
		$email = $_REQUEST['email'];
		if(filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
			$cliente = Cliente::first("email='".$email."'");
			if($cliente == null){
				$mensagem = "E-mail não cadastrado.";
			}
			else{
				if(password_verify($senha, $cliente->senha)){
					$_SESSION['username'] = $cliente->email;
					header('Location: menu.php');
				
				}
				else {
					$mensagem = "Senha incorreta.";
				}	
			}		
		}
	}
	include("view/cliente-login.php");
}
else {
	header('Location: alteracao.php');
}		
?>