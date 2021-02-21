<?php

if( !isset($_REQUEST["id"]) || $_SESSION["user"]->compras()->where(Compra::primary." = '$id'")){
	require_once('control/404.php');
}

$compra = Compra::find($_REQUEST['id']);
$pagamento = $compra->formaPagamento()->first();
$produtos = $compra->produtos()->get();
$total = $compra->total();
require_once('view/compra.php')

?>