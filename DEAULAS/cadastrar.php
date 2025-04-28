<?php

include("../Classe/Conexao.php");

$nome_aula = isset($_POST["nome_aula"]) ? $_POST["nome_aula"] : NULL;
$dia_aula = isset($_POST["dia_aula"]) ? $_POST["dia_aula"] : NULL;
$horario_aula = isset($_POST["horario_aula"]) ? $_POST["horario_aula"] : NULL;
$professor_aula = isset($_POST["professor_aula"]) ? $_POST["professor_aula"] : NULL;

$sql = ("INSERT INTO `criaaula` 
    (
        nome_aula,  
        dia_aula, 
        horario_aula, 
        professor_aula 
    ) 
    VALUES 
    (
        :nome_aula,
        :dia_aula,
        :horario_aula,
        :professor_aula
)");

$executar = Db::conexao()->prepare($sql);

$executar->bindValue(":nome_aula", $nome_aula, PDO::PARAM_STR);
$executar->bindValue(":dia_aula", $dia_aula, PDO::PARAM_STR);
$executar->bindValue(":horario_aula", $horario_aula, PDO::PARAM_STR);
$executar->bindValue(":professor_aula", $professor_aula, PDO::PARAM_STR);

$executar->execute();


header("Location: index.php");