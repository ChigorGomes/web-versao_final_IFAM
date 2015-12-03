<?php
include ("conexaoBd.php");
$idcliente= $_GET["CODUSUARIO"];
$sql= "SELECT * FROM USUARIO WHERE CODUSUARIO= $idcliente";
$results = $conn-> query($sql);
$nome=""; $email=""; $data=""; $estadoCivil=""; $sexo="";$rua=""; $numero="";
$bairro="";$cidade="";$cep="";$telefone="";
if($results){
   foreach($results as $usr){
   $nome=$usr["NOME"];
   $email=$usr["EMAIL"];
   $data=$usr["DATANASCIMENTO"];
   $estadoCivil=$usr["ESTADOCIVIL"];
   $sexo=$usr["SEXO"];
   $rua=$usr["RUA"];
   $numero=$usr["NUMERO"];
   $bairro=$usr["BAIRRO"];
   $cidade=$usr["CIDADE"];
   $cep=$usr["CEP"];
   $telefone=$usr["TELEFONE"];
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Alteração</title>
	<meta charset="utf-8">
</head>
<body>
	<a href="../administrador/area_Administrador.php">Voltar página anterior</a>
	<form action="editaCliente.php" method="post" name="dados">
<table>
	<tr>
		<td colspan="2">Formulario de alteraçao de cliente </td>
	</tr>
	<tr>
				<td>
					<label for="txtNome">Nome:</label>
				</td>
				<td>
					<input name="txtNome" id="txtNome" type="text"  class="formbutton" placeholder="fulano de tal" size="50" maxlength="150" value="<?=$nome?>" required>
				</td>
			<tr>
				<td>
					<label for="txtEmail">Email:</label>
				</td>
				<td>
					<input name="txtEmail" id="txtEmail" type="email" placeholder="fulano@.com" size="50" value="<?=$email?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Data de Nascimento:</label>
				</td>
				<td>
					<input type="date" name="txt_Nascimento" id="id_nascimento"  size="50" value="<?=$data?>" requireed>
				</td>
			</tr>
			<tr>
				<td>
					<label>Estado Civil:</label>
				</td>
				<td>
					<input type="text" name="txt_estadoC" id="id_estadoC"  size="50" value="<?=$estadoCivil?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Sexo:</label>
				</td>
				<td>
					<input type="text" name="txt_Sexo" id="id_sexo" size="50" value="<?=$sexo?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Rua:</label>
				</td>
				<td>
					<input type="text" name="txt_Rua" id="id_rua"  size="50" value="<?=$rua?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Número:</label>
				</td>
				<td>
					<input type="text" name="txt_Numero" id="id_Numero" size="50" value="<?=$numero?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Bairro:</label>
				</td>
				<td>
					<input type="text" name="txt_Bairro" id="id_bairro"  size="50" value="<?=$bairro?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Cidade:</label>
				</td>
				<td>
					<input type="text" name="txt_Cidade" id="id_Cidade"  size="50" value="<?=$cidade?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Cep:</label>
				</td>
				<td>
					<input type="text" name="txt_Cep" id="id_cep"  size="50" value="<?=$cep?>" pattern="[0-9]{5}-[0-9]{3}" placeholder="00000-000" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Telefone:</label>
				</td>
				<td>
					<input type="tel" name="txt_Telefone" id="id_Telefone"  size="50" value="<?=$telefone?>" required>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Alterar">
					<input type="button" value="Voltar" onclick="history.back()">
				</td>
			</tr>
		</table>
	<input type="hidden" name="idcliente" value="<?=$idcliente?>">
</form>

</body>
</html>





