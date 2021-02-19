<?php

class Cliente extends DBClass{
	
	public const table = 'cliente';
    public const fields = ['id', 'nome', 'cpf', 'email', 'senha'];
    public const primary = 'id';

    public function compras()
    {
        return $this->oneToMany(Compra::class, 'cliente_id');
    }
}

?>