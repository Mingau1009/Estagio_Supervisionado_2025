<?php

include("../Classe/Conexao.php");

$nome_aula = isset($_POST["nome_aula"]) ? $_POST["nome_aula"] : NULL;
$dia_semana = isset($_POST["dia_semana"]) ? $_POST["dia_semana"] : NULL;
$horario_aula = isset($_POST["horario_aula"]) ? $_POST["horario_aula"] : NULL;
$professor = isset($_POST["professor"]) ? $_POST["professor"] : NULL;

$sql = ("INSERT INTO `exercicio` 
    (
        `nome_aula`,  
        `dia_semana`, 
        `horario_aula`, 
        `professor`, 
    ) 
    VALUES 
    (
        :nome_aula,
        :dia_semana,
        :horario_aula,
        :professor
)");

$executar = Db::conexao()->prepare($sql);

$executar->bindValue(":nome_aula", $nome_aula, PDO::PARAM_STR);
$executar->bindValue(":dia_semana", $dia_semana, PDO::PARAM_STR);
$executar->bindValue(":horario_aula", $horario_aula, PDO::PARAM_STR);
$executar->bindValue(":professor", $professor, PDO::PARAM_STR);

$executar->execute();


header("Location: index.php");