<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tela Login Usuário</title>
	
</head>
<body>
	<form action="validaLoginUsuario.php" method="post">
		<table align="center" border="1">
			<tr>
				<th colspan="2">Tela de Login</th>
			</tr>
			<tr>
				<td>
					<label>Email:</label>
				</td>
				<td>
					<input type="email" name="txtLogin" id="login_id" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Senha:</label>
				</td>
				<td>
					<input type="password" name="txtSenha" id="senha_id" required>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Entrar">
				</td>
				<td >
					<input type="reset" value="Limpar">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="Cadastrar.php">Cadastre-se</a>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>