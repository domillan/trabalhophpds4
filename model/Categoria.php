<?php

class Categoria extends DBClass{

	public const table = 'categoria';
    public const fields = ['id', 'descricao'];
    public const primary = 'id';

	public function produtos()
    {
		return $this->manyToMany(Produto::class, 'produto_categoria', 'produto_id', 'categoria_id');
    }
}

?>