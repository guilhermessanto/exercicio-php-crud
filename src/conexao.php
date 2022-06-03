<?php
$servidor = "localhost";
$usuario = "webmaio1_gui1";
$senha = "e)NbNogC7ez1";
$banco = "webmaio1_guilherme1";
try{
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $erro){
    die("Erro: ".$erro->getMessage());
}