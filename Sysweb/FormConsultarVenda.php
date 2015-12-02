<script>
function deletaCliente(){
	return confirm("deseja realmente excluir");
}
</script>
<meta charset="utf-8">
<a href="../administrador/area_Administrador.php">Voltar página anterior</a>
	  

   <form action ="ForConsultaCliente.php" method="post">
<table align="center">
<tr> <td colspan="3"> <strong>Formulario de Consulta venda</strong> </td> </tr>
<tr>
<td>valor:</td> <td> <input type="text" name="valor" size="50"></td>
<td> <input type="submit" value="Buscar"> </td>
</tr>
</table>
<br><br>
<table width="80%" border="2px">
	<tr>
		<td>idVenda</td>
		<td>Valor</td>
		
		
</tr>

<?php
Include("conexaoBD.php");
try{
	 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 $valor="";
	 if(isset($_POST) && !empty($_POST)){
		$valor = $_POST["valor"];
	 }
	 $sql="SELECT * FROM venda WHERE valor LIKE? ORDER BY valor";
	 $stmt=$conn->prepare($sql);
	 $stmt->bindValue(1,'%'.$valor.'%');
	 $stmt-> execute();
	
	 if ($stmt){
		foreach ($stmt as $usr){
			echo"<tr>";
			echo "<td>".$usr["id"]."</td>";
			echo "<td>".$usr["valor"]."</td>";
			
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

