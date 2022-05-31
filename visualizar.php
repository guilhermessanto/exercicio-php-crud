<?php
require_once "src/funcoes_alunos.php";
$listaDeAlunos = lerAluno($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->
        <table>
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>PRIMEIRA NOTA</th>
                <th>SEGUNDA NOTA</th>
                <th>MEDIA</th>
                <th>SITUACAO</th>
            </thead>
            <?php foreach($listaDeAlunos as $aluno){ ?>
            <tbody> 
                <td><?=$aluno['id'];?></td>
                <td><?=$aluno['nome']?></td>
                <td><?=$aluno['primeira']?></td>
                <td><?=$aluno['segunda']?></td>
                <td><?=$aluno['media']?></td>
                <td><?=$aluno['situacao']?></td>
                <td><a href="atualizar.php">Atualizar</a></td>
                <td><a href="excluir.php">excluir</a></td>
            </tbody>
            <?php } ?>
        </table>

    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>