<?php

if( !isset($_SESSION["carrinho"]) ){
	$_SESSION["carrinho"] = Compra::new();
}

$produto = Produto::find($_REQUEST['id']);

//filtrar
$quantidade = $_REQUEST['quantidade'];

if($quantidade <=0)
	($_SESSION["carrinho"])->produtos()->remove($produto);
else
($_SESSION["carrinho"])->produtos()->addWithPivot($produto, ['quantidade'=>$quantidade]);

header('Location: '.root('compra/carrinho'));
?>