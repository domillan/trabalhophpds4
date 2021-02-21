<?php
if( !isset($_SESSION["cliente"]) ){
	header('Location: '.root('cliente/login'));
	exit();
}
require_once("view/checkout.php");
?>