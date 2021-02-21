<?php
if(isset($_SESSION['username'])){
	$cliente = Cliente::first("email='".$_SESSION['username']."'");
	include("view/cliente-menu.php");
}
else{
	include("view/404.php");
}
?>