<?php

include("../Classe/Conexao.php");

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;
$nome = isset($_POST["nome"]) ? $_POST["nome"] : NULL;
$tipo_exercicio = isset($_POST["exercicio"]) ? $_POST["exercicio"] : NULL;
$grupo_muscular = isset($_POST["grupo"]) ? $_POST["grupo"] : NULL;
$dia_semana = isset($_POST["dia_semana"]) ? $_POST["dia_semana"] : NULL;
$horario_aula = isset($_POST["horario_aula"]) ? $_POST["horario_aula"] : NULL;
$professor = isset($_POST["professor"]) ? $_POST["professor"] : NULL;
$local_aula = isset($_POST["local_aula"]) ? $_POST["local_aula"] : NULL;

$sql = ("UPDATE `exercicio` 
            SET
               `nome` = :nome, 
               `tipo_exercicio` = :tipo_exercicio, 
               `grupo_muscular` = :grupo_muscular,
               `dia_semana` = :dia_semana,
               `horario_aula` = :horario_aula,
               `professor` = :professor,
               `local_aula` = :local_aula
            WHERE 
               `id` = :id
        ");

$executar = Db::conexao()->prepare($sql);

$executar->bindValue(":id", $id, PDO::PARAM_INT);
$executar->bindValue(":nome", $nome, PDO::PARAM_STR);
$executar->bindValue(":tipo_exercicio", $tipo_exercicio, PDO::PARAM_STR);
$executar->bindValue(":grupo_muscular", $grupo_muscular, PDO::PARAM_STR);
$executar->bindValue(":dia_semana", $dia_semana, PDO::PARAM_STR);
$executar->bindValue(":horario_aula", $horario_aula, PDO::PARAM_STR);
$executar->bindValue(":professor", $professor, PDO::PARAM_STR);
$executar->bindValue(":local_aula", $local_aula, PDO::PARAM_STR);

$executar->execute();


header("Location: index.php");