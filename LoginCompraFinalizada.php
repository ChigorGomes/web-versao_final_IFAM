<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tela Login Usuário</title>
</head>
<body>
	<form action="validarCompra.php" method="post">
		<table align="center" border="1">
			<tr>
				<th colspan="3">Tela de Login Finalização da Compra</th>
			</tr>
			<tr>
				<td>
					<label>Email:</label>
				</td>
				<td colspan="3">
					<input type="email" name="txtLogin" id="login_id" required>
				</td>
			</tr>
			<tr>
				<td>
					<label >Senha:</label>
				</td>
				<td colspan="3">
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
				<td>
					<input type="button" value="voltar" onclick="history.back()">
				</td>
			</tr>
				
		</table>
	</form>

</body>
</html>