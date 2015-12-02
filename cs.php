<html>
<head>
    <meta charset = "utf-8">
    <title> Consulta de Produtos </title>
    <style>
        #image{
            width: 100px;
            height: 90px;
        }

    </style>
</head>

<body>
<form method = "post" action = "cs.php">
    <a href="administrador/area_Administrador.php" class="menu"> <b> Voltar a página Anterior </b> </a>
    <table class = "tableforma">
        <tr>
            <p class = "tabela" align="center"> <strong > <h2>Consultar por Curriculo </h2> </strong> </p>
        </tr>
        <tr>
            <td> <b> <h1>Curriculo:</h1> </b> </td>
            <td> <input  class = "campoBusca" type = "text" name = "txtNome" size = "30" autofocus> </td>
            <td> <input class = "buscar" type = "submit" value = "Buscar" > </td>
        </tr>
    </table>
    <br><br>
    <p class = "tabela"> <strong ><h2>Produtos Cadastrados</h2> </strong> </p>
    <table  class = "tableconsulta">
        <tr>
           <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Telefone</td>
                <td>Sexo</td>
                <td>Data de Nascimento</td>
                <td>Escolaridade</td>
                <td>Curriculo</td>
                <td>Empresa</td>
                <td>Cargo</td>
                <td>Atribuições</td>
                <td>Data de admissão</td>
                <td>Data demissão</td>
                <td>Acao</td>
</tr>

        </tr>
        
        <?php

        include ("Sysweb/conexaoBd.php");
        try{
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $nome = "";

            if(isset($_POST)&&!empty($_POST)){
                $nome = $_POST["txtNome"];
            }

            $sql="SELECT * FROM CURRICULO WHERE nome LIKE? ORDER BY nome";
             $stmt=$conn->prepare($sql);
                 $stmt->bindValue(1,'%'.$nome.'%');
             $stmt-> execute();
            if($stmt){
                foreach($stmt as $usr){
                   echo"<tr>";
                     echo"<td>".$usr["NOME"]." </td>"; 
                    echo "<td>".$usr["EMAIL"]."</td>";
                 echo "<td>".$usr["TELEFONE"]."</td>";
                    echo "<td>".$usr["SEXO"]."</td>";
                 echo "<td>".$usr["NASCIMENTO"]."</td>";
                    echo "<td>".$usr["ESCOLARIDADE"]."</td>";
                    

                        echo "<td>";
                    echo "<a href=".$usr["CURRICULO"]."  target='_blank' id ='image'>Ver Curriculo</a>";
                    echo  "</td>";

                    echo "<td>".$usr["EMPRESA"]."</td>";
                     echo "<td>".$usr["CARGO"]."</td>";
            echo "<td>".$usr["COMENTARIO"]."</td>";
            echo "<td>".$usr["DATAADMISSAO"]."</td>";
            echo "<td>".$usr["DATADEMISSAO"]."</td>";
                   echo "<td>";

            #echo"<a href='FormEditaAdministrador.php?id_administrador=".$usr["id_administrador"]."'>Alterar</a>";
            echo"<a href='Sysweb/deletaCurriculo.php?idCURRICULO=".$usr["idCURRICULO"]."'onclick=' return 
            deletaUsuario(".$usr["idCURRICULO"].")'>Excluir</a>";
            echo "</td>";
            echo"</tr>";
                }
            }

        }catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
        ?>
    </table>
</form>
</body>
</html>