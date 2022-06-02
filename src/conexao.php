<?php
$servidor = "localhost";
$usuario = "id19035222_guilherme_santana";
$senha = "=4n!-J_?%NUJT(CX";
$banco = "id19035222_crud_escola_guilherme";
try{
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $erro){
    die("Erro: ".$erro->getMessage());
}