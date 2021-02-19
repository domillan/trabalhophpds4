<!DOCTYPE html>
<html>
<head>
	<title>Bem vindo <?=  $usuario->nome;?></title>
</head>
<body>
<form enctype="multipart/form-data" method="POST" action="cadastro.php">
<label>Nome: <input type='text' name='nome'></label><br>
<label>Descrição: <input type='text' name='descricao'></label><br>
<label>Preço: <input type='number' name='preco'></label><br>
<input type="hidden" name="MAX_FILE_SIZE" value="50000000">
<label>Foto: <input type='file' name='arquivo'></label><br>
<input type='submit'>
</form>
</body>
</html>