<?php
require_once "conexao.php";

function lerAluno(PDO $conexao):array{
    $sql = "SELECT id, nome, primeira, segunda,media, situacao FROM alunos";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta ->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $erro){
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}


function inserirAluno(PDO $conexao, string $nome, float $primeira, float $segunda, float $media, string $situacao):void{
    $sql = "INSERT INTO alunos (nome, primeira, segunda,media,situacao) VALUES (:nome,:primeira,:segunda,:media,:situacao)";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta -> bindParam(':nome',$nome,PDO::PARAM_STR);
        $consulta -> bindParam(':primeira',$primeira,PDO::PARAM_STR);
        $consulta -> bindParam(':segunda',$segunda,PDO::PARAM_STR);
        $consulta -> bindParam(':media',$media,PDO::PARAM_STR);
        $consulta -> bindParam(':situacao',$situacao,PDO::PARAM_STR);
        $consulta->execute();
    }catch(Exception $erro){
    die("Erro: ".$erro->getMessage());
}
} 

function atualizarAluno(PDO $conexao, int $id, string $nome, float $primeira, float $segunda, float $media, string $situacao){
    $sql = "UPDATE alunos SET id = :id, nome = :nome, primeira = :primeira, segunda = :segunda, media = :media, situacao = :situacao WHERE id  = :id ";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id',$id,PDO::PARAM_INT);
        $consulta -> bindParam(':nome',$nome,PDO::PARAM_STR);
        $consulta -> bindParam(':primeira',$primeira,PDO::PARAM_STR);
        $consulta -> bindParam(':segunda',$segunda,PDO::PARAM_STR);
        $consulta -> bindParam(':media',$media,PDO::PARAM_STR);
        $consulta -> bindParam(':situacao',$situacao,PDO::PARAM_STR);
        $consulta->execute();
    }catch(Exception $erro){
        die("Erro: ".$erro->getMessage());
    }
}

function lerUmAluno(PDO $conexao, int $id):array{
    $sql = "SELECT nome, primeira, segunda, media, situacao FROM alunos WHERE id = :id";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id',$id,PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta ->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $erro){
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

function excluirAluno(PDO $conexao, int $id):void{
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta -> bindParam(':id',$id,PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

function calculaMedia($primeira , $segunda){
    $media = ($primeira + $segunda)/2; 
    return $media; 
}
function verificaAprovacao($media){
if($media >= 7 ){
    $situacao = "Aprovado";
}else{
    $situacao = "Reprovado";
}
return $situacao; 
}

function classeAluno($media){
    if($media == "Aprovado"){
        $alunoRow = "table-success";
    }else{
        $alunoRow = "table-danger";
    }
    return $alunoRow;
}