<!DOCTYPE html  >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Carrinho de Compras</title>
</head>
      <table align ="center">
	 <tr ><td ><label for ="pesquisa_id" > buscar: </label></td>
	 <td ><input  id="pesquisa_id" type="search" size="100" name="txtPesquisa" 
	  placeholder="Digite sua busca">  <input name="Submit" type="submit" value="Pesquisar"></td></tr>
	  
	  </table>
<body>
<?php
      require("conexao.php");
       
      $sql = "SELECT * FROM produtos where CATEGORIA ='Brinquedos Femininos'";
      $qr = mysql_query($sql) or die(mysql_error());
      while($ln = mysql_fetch_assoc($qr)){
         echo '<h2 align="center">'.$ln['nome'].'</h2> <br />';
         echo '<h4 align="center"> PRECO :  '.$ln['preco']. '.'.'<br />';
         echo 'Descricao:'.$ln['descricao'].'<br />';
		 echo 'CATEGORIA:'.$ln['CATEGORIA'].'<br />';
		 echo '<img src='.$ln["imagem"].' >';
         echo '	<br><a href="carrinho1.php?acao=add&id='.$ln['idCodigo'].'">COMPRAR BRINQUEDO</a>';
         echo '<br /><hr />';
      }
?>
 
</body>
 
</html>