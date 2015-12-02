<script>
function deletaCliente(){
	return confirm("deseja realmente excluir");
}
</script>
<meta charset="utf-8">
<a href="../administrador/area_Administrador.php">Voltar página anterior</a>
	  

   <form action ="FormConsultarItemVenda.php" method="post">
<table align="center">
<tr> <td colspan="3"> <strong>Formulario de Consulta de Clientes</strong> </td> </tr>
<tr>
<td>IdVneda:</td> <td> <input type="text" name="idvenda" size="50"></td>
<td> <input type="submit" value="Buscar"> </td>
</tr>
</table>
<br><br>
<table width="80%" border="2px">
	<tr>
		<td>id</td>
		<td>idvenda</td>
		<td>idproduto</td>
		<td>Quantidade</td>
		
</tr>

<?php
Include("conexaoBD.php");
try{
	 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 $idvenda="";
	 if(isset($_POST) && !empty($_POST)){
		$idvenda = $_POST["idvenda"];
	 }
	 $sql="SELECT * FROM itemvenda WHERE idvenda LIKE? ORDER BY idvenda";
	 $stmt=$conn->prepare($sql);
	 $stmt->bindValue(1,'%'.$idvenda.'%');
	 $stmt-> execute();
	
	 if ($stmt){
		foreach ($stmt as $usr){
			echo"<tr>";
			echo "<td>".$usr["id"]."</td>";
			echo "<td>".$usr["idvenda"]."</td>";
			echo "<td>".$usr["idprod"]. "</td>";
			echo "<td>".$usr["qtde"]. "</td>";
			echo "<td>";
			echo"<a href='FormAlteraCliente.php?id=".$usr["id"]."'>Alterar</a>";
			echo"<a href='FormDeletaCliente.php?id=".$usr["id"]."'onclick=' return 
			deletaCliente(".$usr["id"].")'>Excluir</a>";
			echo "</td>";
			echo"</tr>";
			
		 }
	  }
     }catch(Exception $e){
	  echo "Erro: ".$e->getMessage();
	
    }

?>

