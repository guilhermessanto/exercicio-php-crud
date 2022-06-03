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
<!-- jquery -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- meu css -->
<link href="style.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1 class="text-center">Lista de alunos</h1>
    <hr>
    

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->
        <div class="container">
            <table id="table_id" class="table display" >
                <thead>                   
                    <th>NOME</th>
                    <th>PRIMEIRA NOTA</th>
                    <th>SEGUNDA NOTA</th>
                    <th>MEDIA</th>
                    <th>SITUACAO</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody >
                    <?php foreach($listaDeAlunos as $aluno){?>                         
                    <tr class="<?=($aluno['media'] >= 7) ?' table-success ':'table-danger'; ?>" >                      
                    <td><?=$aluno['nome']?></td>
                    <td><?=$aluno['primeira']?></td>
                    <td><?=$aluno['segunda']?></td>
                    <td><?=$aluno['media']?></td>
                    <td><?=$aluno['situacao']?></td>
                    <td><a href="atualizar.php?id=<?=$aluno['id']?>" class="btn btn-success">Atualizar</a></td>
                    <td><a class="excluir btn btn-danger" href="excluir.php?id=<?= $aluno['id']?>" >Excluir</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <div class="row mt-5">
        <p class="col text-end"><a href="index.php" class="btn btn-primary">Voltar ao início</a></p>
        <p class="col"><a href="inserir.php" class="btn btn-primary">Inserir novo aluno</a></p>
    </div>
</div>

<script src="jsProprio/excluir.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.bundle.js"></script>

<script src="plugins/jquery-3.6.0.min.js"></script>
<!-- jquery -->
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>


<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

</body>
</html>