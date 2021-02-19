<?php

//DB::debugOn();


$c = Cliente::create(['nome'=>'Eduarda Martins', 'cpf'=>'123456888', 'email'=>'ed@gm.com', 'senha'=>'12345678']);

$f = FormaPagamento::create(['descricao'=>'Dinheiro']);

$co = Compra::new(['horario'=>(new DateTime('NOW'))->format('Y-m-d H:i:s')]);

$co->formaPagamento()->set($f);

$co->cliente()->set($c);

$co->save();

print_r($c->compras()->all());

?>