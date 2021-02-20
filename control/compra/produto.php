<?php

if( !isset($_SESSION["carrinho"]) ){
	$_SESSION["carrinho"] = Compra::new();
}

$produto = Produto::find($_REQUEST['id']);

//filtrar quantidade
$quantidade = $_REQUEST['quantidade'];

$qtdAntigo = ($_SESSION["carrinho"])->produtos()->getPivotField($produto, 'quantidade');
if($qtdAntigo!=null){
	$quantidade += $qtdAntigo;
}

($_SESSION["carrinho"])->produtos()->addWithPivot($produto, ['quantidade'=>$quantidade]);

print_r(($_SESSION['carrinho'])->produtos()->getPivots());

header('Location: '.root('compra/carrinho'));


exit();
?>