<?php
require_once "src/funcoes_alunos.php";
 $novoAluno = lerAluno($conexao);

if(isset($_POST['inserir'])){
    $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST,'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $segunda = filter_input(INPUT_POST,'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $media = filter_input(INPUT_POST,'media', FILTER_SANITIZE_NUMBER_FLOAT);
    $situacao = filter_input(INPUT_POST,'situacao', FILTER_SANITIZE_SPECIAL_CHARS);

    $media = ($primeira + $segunda)/2; 
    if($media >= 7 ){
        $situacao = "Aprovado";
    }else{
        $situacao = "Reprovado";
    }

    inserirAluno($conexao, $nome, $primeira, $segunda, $media, $situacao);

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="nome" >Nome:</label>
	    <input type="text" id="nome" name="nome" required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input type="number" id="primeira" name="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" id="segunda" name="segunda" step="0.1" min="0.0" max="10" required></p>
	    
      <button name="inserir">Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>