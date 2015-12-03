<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo1.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo2.css">
     
	
	   </head>	  
 <body class="body2">
	  <h2 class="centro1"> TRABALHE CONOSCO</h2>
	  <form action="../cadTrabalheConosco.php" method="post"  enctype="multipart/form-data">
	  <table class= "tab1">
	 <tr><td>Nome:<input name="txtNome" type="text" class="formbutton" id="tx_nome" size="20" maxlength="150" required> </td> </tr> 
	  <tr><td>Email:<input  type="email" name="txtemail" id="tx_Email"  required></td></tr>
	  <tr><td>Telefone:<input  type="tel" name="txttelefone"  id="tx_Telefone" required pattern="[0-9]{2}[0-9]{4,5}-[0-9]{4}" placeholder="00 0000-0000"></td></tr>
	  <tr><td>Sexo:<input  type="radio" name="rdsexo" value="F" id="fem"  required>
	  <label for="fem">feminino</label><input type="radio" name="rdsexo" value="M" id="mas" required>
	  <label for="mas">masculino</label>
	  </td></tr>
	  <tr>
	  <td>Data de nascimento: <input type ="date" name="txtnascimento"
          placeholder="dd/mm/yyyy" title="dd/mm/yyyy"  id="txt_Nascimento"  required></td> </tr>
	  <tr>
	  <td>
	     <select name="escolaridade" required >
		 <option value="">Selecione</option>
		 <option value="1"> Ensino Fundamental</option>
	     <option value="2">Ensino medio </option>
	     <option value="3"> Ensino Superior completo</option>
		 <option value="4">Pos graduado </option>
		 <option value="2">Mestrado </option>
		 <option value="2">Doutorado </option>
		 </select>
		 </td>
	  </tr>
	  <tr><td>Curriculo doc ou pdf<input type="file" name="arquivo" id="file" required>
	  nenhum arquivo selecionado acima de 2M</td></tr>
	  
	  <tr><td>Ultima Experiencia Profissional</td></tr>
	   <tr><td>Empresa:<input  type="text" name="txtempresa" id="tx_Empresa"required></td></tr>
	   <tr><td>Cargo:<input  type="text" name="txtcargo" required id="tx_Cargo" required></td></tr>
	  <tr><td>Atribuições:<textarea name="txtcomentario" rows="4"  cols="50" placeholder="Deixe seu comentario..." id="tx_Comentario" required></textarea></td></tr>
	  </tr>
	  <td>Data de admissão: <input type ="date" name="txtdataadmissao"
          placeholder="dd/mm/yyyy" title="dd/mm/yyyy" required ></td> </tr>
	  </tr>
	  <tr>
	  <td>Data de demissão: <input type ="date" name="txtdemissao"
          placeholder="dd/mm/yyyy" title="dd/mm/yyyy" required ></td> </tr>
	  </tr>
	  </tr>
	  <tr>
	  <td> <input  type="submit" value="Enviar dados"> <input name="Reset" type="reset"  value="Redefinir"> 
	 </tr>
	  
	  
	  </table>
      
	   <a href="menu3.php"> Voltar</a>
	  

		
		
</body>
</html>