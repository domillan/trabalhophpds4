<!DOCTYPE html>
<html>
<head>
	<title>Bem vindo <?=  $usuario->nome;?></title>
</head>
<body>
<form method="POST" action="cadastro.php">
<label>Nome: <input type='text' name='nome'></label><br>
<label>E-mail: <input type='email' name='email'></label><br>
<label>CPF:  <input type='text' name='cpf'></label><br>
<label>Senha: <input type='password' name='senha'></label><br>
<input type='submit'>
</form>
</body>
</html>