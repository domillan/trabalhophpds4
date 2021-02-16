<?php
include("../tools/DBClass.php");

class Compra extends DBClass{
	
	public const table = 'usuario';
    public const fields = ['id', 'pagamento_id', 'cliente_id'];
    public const primary = 'id';
	
}

?>