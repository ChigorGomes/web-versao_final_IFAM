<?php
include ("conexaoBd.php");
$idproduto= $_GET["idCodigo"];
$sql= "SELECT * FROM produtos WHERE idCodigo= $idproduto";
$results = $conn-> query($sql);
$codigo="";$nome="";$descricao="";$preco="";
if($results){
   foreach($results as $usr){
   	$codigo=$usr['codigo'];
   $nome=$usr["nome"];
   $preco=$usr["preco"];
   $descricao=$usr['descricao'];
   
  
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Alteração de Produto</title>
	<meta charset="utf-8">
</head>
<body>
	<a href="../consultarproduto.php">Voltar página anterior</a>
	<form action="FormAlteraProduto.php" method="post" name="dados" onSubmit="return enviardados();">
<table>
	<tr>
		<td colspan="2">
		<th>Formulario de alteraçao do produto</th>  </td>
	</tr>
	<tr>
			 <table align="center">
                <tr>
                    <td class="campo"> Código: </td>
                    <td colspan="3"> <input class="campo" type="text" name="txtCodigo" id="txtCodigo" value="<?=$codigo?>" required> </td>
                </tr>
            <tr>
                <td class="campo"> Produto: </td>
                <td colspan="3"> <input class="campo" type="text" name="txtNome" id="txtNome" value="<?=$nome?>" required> </td>
            </tr>
            <tr>
                <td class="campo"> Descrição: </td>
                <td colspan="3"><textarea class="campo" id="txtDescricao" name = "txtDescricao"  rows="3" value="<?=$descricao?>"  required></textarea> </td>
            </tr>
            <tr>
                <td class="campo"> Categoria: </td>
                <td>
                     <select  name="txtCategoria" id="txtCategoria" required>
                        <?php
                            include ("conexaoBd.php");
                            try {
                                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                $nome = "";

                                if(isset($_POST)&&!empty($_POST)){
                                    $nome = $_POST["txtCategoria"];
                                }
                                $sql = "SELECT * FROM categoria ORDER BY CATEGORIA";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindValue(1, '%' .$nome. '%');
                                $stmt->execute();
                                 if($stmt){
                                    foreach($stmt as $usr){
                                        echo "<option>".$usr['CATEGORIA']."</option>";
                                    }
                                 }
                            }catch(Exception $e){
                                echo "Erro: ".$e->getMessage();
                            }
                        ?>
                    </select>
                   </td> 
			</tr>
			 <tr>
                    <td class="campo"> Preço: </td>
                    <td colspan="3"> <input class="campo" type="text" name="txtPreco" id="txtPreco" value="<?=$preco?>" required> </td>
             </tr>
             <tr>

				<td colspan="2" align="center">
					<input type="submit" value="Alterar">
					<input type="button" value="Voltar" onclick="history.back()">
				</td>
			</tr>
		</table>
	<input type="hidden" name="idProduto" value="<?=$idproduto?>">
</form>

</body>
</html>





