<?php
//DB::debugOn();
$carrinho = $_SESSION["carrinho"];
$produtos = $carrinho->produtos()->get();
$total = 0;
require_once("view/carrinho.php");
?>