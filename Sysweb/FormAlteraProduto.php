<?php
include("conexaoBd.php");
try{
	$conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$idProduto = $_POST["idProduto"];
	$codigo= $_POST['txtCodigo'];
	$descricao= $_POST['txtDescricao'];
	$categoria= $_POST['txtCategoria'];
	$preco= $_POST['txtPreco'];
	$nome=$_POST["txtNome"];
	


	

	$sql= "UPDATE produtos SET codigo = '$codigo', nome= '$nome', descricao='$descricao',CATEGORIA='$categoria', preco='$preco'
	WHERE  idCodigo = $idProduto";
	
	// executando sql
	$insere= $conn-> query($sql);
	
	// tratando msg
	
	if($insere){
		echo"<script>alert('alteração efetuada com sucesso!');
		window.open('../consultarproduto.php','_self')</script>";
		}
} catch(Exception $e){
	echo "Erro". $e->getMessage();
}

?>