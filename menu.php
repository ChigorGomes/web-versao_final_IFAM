<!DOCTYPE html  >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Carrinho de Compras</title>
 <link rel="stylesheet" type="text/css" href="css/estilo1.css">
       <link rel="stylesheet" type="text/css" href="css/estilo2.css">
</head>
     <table class="tabela1">
    <tr><td> <img src="figura/logo381.png" >  </td>
    <tr><td> <img src="figura/logo391.png" >  </td>
    
    </table>

   
    
    
<body>
<p><img src="figura/logo23.png" ></p>
<?php
      require("conexao.php");
       
      $sql = "SELECT * FROM promocao where CATEGORIA ='Promocao'";
      $qr = mysql_query($sql) or die(mysql_error());
      while($ln = mysql_fetch_assoc($qr)){
         echo '<h2 align="center">'.$ln['nome'].'</h2> <br />';
         echo '<h4 align="center">PRECO :  '.$ln['preco']. '.'.'<br />';
	 		 echo '<img src='.$ln["imagem"].' >';
         echo '<br><a href="carrinho1.php?acao=add&id='.$ln['idCodigo'].'">COMPRAR BRINQUEDO</a>';
         echo '<br /><hr />';
      }
?>
 
</body>
 
</html>