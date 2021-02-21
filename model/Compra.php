<?php

class Compra extends DBClass{
	
	public const table = 'compra';
    public const fields = ['id', 'pagamento_id', 'cliente_id', 'horario'];
    public const primary = 'id';
	
	public function cliente()
    {
        return $this->manyToOne(Compra::class, 'cliente_id');
    }
	
	public function produtos()
    {
		return $this->manyToMany(Produto::class, 'produto_compra', 'produto_id', 'compra_id', ['quantidade'=>1]);
    }
	
	public function formaPagamento()
    {
        return $this->manyToOne(FormaPagamento::class, 'pagamento_id');
    }
	
	public function total()
	{
		$total=0;
		foreach($this->produtos()->get() as $prod)
		{
			$total+= ($this->produtos()->getPivotField($prod, 'quantidade')*$prod->preco);
		}
		return $total;
	}
	
	public function subtotal($produto)
	{
		return $this->produtos()->getPivotField($produto, 'quantidade') * $produto->preco;
	}
	
	public function quantidade($produto)
	{
		return $this->produtos()->getPivotField($produto, 'quantidade');
	}
	
}

?>