<meta charset="utf-8">

<?php
      session_start();
       
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
         
		  
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
       
      }
       
       
?>
<!DOCTYPE html >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carrinho de Compras</title>
</head>
 
<body>
 <table border="2" align="center" bgcolor="grenn">
    <H2 align="center" >CARRINHO DE COMPRAS</H2>
    <thead>
          <tr bgcolor="blue">
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Preco</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          </tr>
    </thead>
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
            <tr>
            <td align ="right" colspan="5"><a href="menu.php">Continuar Comprando</a></td>
    </tfoot>
      
    <tbody>
               <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{
                        require("conexao.php");
                         $total = 0;
                         $sub = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produtos WHERE idCodigo = '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);
                               
                              $nome  = $ln['nome'];
                              $preco = $ln["preco"];
                              $sub   = $preco * $qtd;
                               
                               $total += $sub;
                            
                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                              </tr>';
                        }
                          
                           echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     
					
					 }
               ?>
    
     </tbody>
        </form>
<?php // finalizar pedido
		
		if (isset($_POST['enviar'])){
		$SqlInserirVenda = mysql_query("INSERT INTO venda(valor)  values('$total')");
		$idvenda= mysql_insert_id();
		foreach($_SESSION['carrinho'] as $id => $qtd){
		$SqlInserirItens=mysql_query("INSERT INTO itemvenda(idvenda,idprod,qtde) values('$idvenda','$id','$qtd')");
        }
		 echo" <script>alert('venda concluida')
		 window.open('menu.php','_self')</script>";
		}
		
		
?>
</table>
  
  <form action ="" align="center" enctype="multipart/form-data" method="post">
  <input type="submit" name="enviar"  value ="FINALIZAR PEDIDO">
  
  </form>
 
</body>
</html>