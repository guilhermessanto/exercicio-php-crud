<?php
require_once "src/funcoes_alunos.php";
$listaDeAlunos = lerAluno($conexao);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$aluno = lerUmAluno($conexao,$id);

if(isset($_POST['atualizar'])){
    $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST,'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $segunda = filter_input(INPUT_POST,'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $media = filter_input(INPUT_POST,'media', FILTER_SANITIZE_NUMBER_FLOAT);
    $situacao = filter_input(INPUT_POST,'situacao', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $media = calculaMedia($primeira , $segunda);
    $situacao = verificaAprovacao($media);
    atualizarAluno($conexao,$id, $nome, $primeira, $segunda, $media, $situacao);
    
    header("location:visualizar.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- meu css -->
<link href="style.css" rel="stylesheet">
</head>
<body >
    
    <h1 class="text-center">Atualizar dados do aluno </h1>
    <hr>
    
    <p class="text-center">Utilize o formulário abaixo para atualizar os dados do aluno.</p>
    
    <div class="form-signin w-50 m-auto" >
        <form action="" method="post">
            
            <div class="form-floating">
                <p><label for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" required value="<?=$aluno['nome']?>"></p>
            </div>
            
            <div class="form-floating">
                <p><label for="primeira">Primeira nota:</label>
                <input name="primeira" class="form-control" type="number" id="primeira" step="0.1" min="0.0" max="10" required value="<?=$aluno['primeira']?>" oninput="pegarNota()"></p>
            </div>
            
            <div class="form-floating">
                <p><label for="segunda">Segunda nota:</label>
                <input name="segunda" class="form-control" type="number" id="segunda" step="0.1" min="0.0" max="10" required value="<?=$aluno['segunda']?>"  oninput="pegarNota()"></p>
            </div>

            <div class="form-floating">
                <p>
                <!-- Campo somente leitura e desabilitado para edição.
                Usado apenas para exibição do valor da média -->
                    <label for="media">Média:</label>
                    <input name="media" class="form-control" type="number" id="media" step="0.1" min="0.0" max="10"  value="<?=$aluno['media']?>" readonly disabled>
                </p>
            </div>

            <div class="form-floating">
                <p>
                <!-- Campo somente leitura e desabilitado para edição
                Usado apenas para exibição do texto da situação -->
                    <label for="situacao">Situação:</label>
                    <input type="text" class="form-control" name="situacao" id="situacao" value="<?=$aluno['situacao']?>" readonly disabled>
                </p>
            </div>
            
            <button class="w-100 btn btn-lg btn-success" name="atualizar">Atualizar dados do aluno</button>
        </form>    
    <hr>
    <p class="text-center"><a class="btn btn-primary" href="visualizar.php">Voltar à lista de alunos</a></p>
    </div>
    
<script src="jsProprio/media.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>