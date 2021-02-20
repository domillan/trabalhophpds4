<?php
if( !isset($_SESSION["cliente"]) ){
	header('Location: '.root('cliente/cadastro'));
	exit();
}
require_once("view/checkout.php");
?>