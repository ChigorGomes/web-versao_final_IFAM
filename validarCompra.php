<?php
include("Sysweb/conexaoBD.php");
try{
	session_start();
	
	$login=$_POST["txtLogin"];
	$senha=$_POST["txtSenha"];
	
	$sql="SELECT * FROM usuario WHERE email='$login' AND senha='$senha'";
	$result = $conn-> query($sql);
	
	
	
	if($result->rowCount()> 0){
		$_SESSION["logado"]= true ;
	 
		echo "<script>
			alert('Finalização de compra!');
			window.open('menu.php','_self');
		 </script>";
		
	

	}else{
		session_destroy();
		
		echo"<script> 
		alert('Dados invalidos');
		window.open('LoginCompraFinalizada.php','_self');
		</script>";
		
	}
  }catch(Exception $e){
	  echo "Erro" .$e->getMessage();
  
	
}

?>