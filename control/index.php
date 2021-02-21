<?php

$categoria = (isset($_REQUEST['categoria'])) ? $_REQUEST['categoria']: 1;
$busca = $_REQUEST['busca'] ?? null;
if($categoria!=0){
	$c = Categoria::find($categoria);
	$produtos = $c->produtos()->where("produto.nome like '%$busca%'");
}
else
{
	$produtos = Produto::where("produto.nome like '%$busca%'");
}
include("view/home.php");
?>