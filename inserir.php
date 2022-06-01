<?php
require_once "src/funcoes_alunos.php";
 $novoAluno = lerAluno($conexao);

if(isset($_POST['inserir'])){
    $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST,'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $segunda = filter_input(INPUT_POST,'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $media = filter_input(INPUT_POST,'media', FILTER_SANITIZE_NUMBER_FLOAT);
    $situacao = filter_input(INPUT_POST,'situacao', FILTER_SANITIZE_SPECIAL_CHARS);

    $media = calculaMedia($primeira , $segunda);
    $situacao = verificaAprovacao($media);
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
<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- meu css -->
<link href="style.css" rel="stylesheet">
</head>
<body>
<div >
	<h1 class="text-center">Cadastrar um novo aluno </h1>
    <hr>
    		
    <p class="text-center">Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<div class="form-signin w-50 m-auto">
        <form action="#" method="post">
            <div class="form-floating">
                <p>
                    <label for="nome" >Nome:</label>
                    <input class="form-control" type="text" id="nome" name="nome" required>
                </p>
            </div>
                
              <div class="form-floating">
                    <p>
                        <label for="primeira">Primeira nota:</label>
                        <input class="form-control" type="number" id="primeira" name="primeira" step="0.1" min="0.0" max="10" required>
                    </p>
              </div>
        
            <div class="form-floating">
                <p><label for="segunda">Segunda nota:</label>
                <input class="form-control" type="number" id="segunda" name="segunda" step="0.1" min="0.0" max="10" required></p>
            </div>
            
              <button class="w-100 btn btn-lg btn-success" name="inserir">Cadastrar aluno</button>
        </form>
    </div>

    <hr>
    <p class="text-center" ><a class="btn btn-primary" href="index.php">Voltar ao início</a></p>
</div>

<!-- bootstrap -->
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>