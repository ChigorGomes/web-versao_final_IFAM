<!DOCTYPE>
<html>
<head>
    <meta charset='utf-8'>
    <title>Upload</title>
	<script src="java/validacaoJava.js"></script>
</head>

<body>


<?php
include ("Sysweb/conexaoBd.php");
// verifica se foi enviado um arquivo
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
{

    echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
    echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
    echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
    echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome = $_FILES['arquivo']['name'];


    // Pega a extensao
    $extensao = strrchr($nome, '.');

    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);

    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if(strstr('.pdf', $extensao))
    {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome = md5(microtime()) . $extensao;

        // Concatena a pasta com o nome
        $destino = 'curriculo/pasta/' . $novoNome;

        // tenta mover o arquivo para o destino
        if( @move_uploaded_file( $arquivo_tmp, $destino  ))
        {
            echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
            echo "<img src=\"" . $destino . "\" />";
        }
        else
            echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão.<br />";
    }
    else
        echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
}
else
{
    echo "Você não enviou nenhum arquivo!";
}
try{
    $imagem = $destino;
    $nome=$_POST['txtNome'];
    $email=$_POST['txtemail'];
    $telefone=$_POST['txttelefone'];
    $sexo=$_POST['rdsexo'];
    $nascimento=$_POST['txtnascimento'];
    $escolaridade=$_POST['escolaridade'];
    $empresa=$_POST['txtempresa'];
    $cargo=$_POST['txtcargo'];
    $comentario=$_POST['txtcomentario'];
    $dataadmissao=$_POST['txtdataadmissao'];
    $datademissao=$_POST['txtdemissao'];



    $sql = "INSERT INTO curriculo(NOME,EMAIL,TELEFONE,SEXO,NASCIMENTO,ESCOLARIDADE,CURRICULO,EMPRESA,CARGO,COMENTARIO,DATAADMISSAO,DATADEMISSAO) VALUES('$nome','$email','$telefone','$sexo',
        '$nascimento','$escolaridade','$imagem','$empresa','$cargo','$comentario','$dataadmissao','$datademissao')";

    $insere = $conn->query($sql);

    if($insere){
        echo   "<script>
						alert('Curriculo Cadastrado com Sucesso!');
						window.open('menu.php', '_self');
					</script>";
    }
}catch(Exception $e){
    echo "Erro: ".$e->getMessage();
}
?>
</body>
</html>
