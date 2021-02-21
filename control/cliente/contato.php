<?php
if(isset($_REQUEST["nome"]) && isset($_REQUEST["email"]) && isset($_REQUEST["mensagem"])){
	$nome=$_REQUEST["nome"];
	$email=$_REQUEST["email"];
	$mensagem=$_REQUEST["mensagem"];

	$mensagem = str_replace('script','', $mensagem)

	email('eduardam2002@gmail.com', "Mensagem de $nome", $mensagem, $email);
}
header('Location:'.root());
die();
?>