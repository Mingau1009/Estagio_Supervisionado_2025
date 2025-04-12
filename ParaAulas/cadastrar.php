<?php

include("../Classe/Conexao.php");

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;
$nome_aluno = isset($_POST["nome_aluno"]) ? $_POST["nome_aluno"] : NULL;
$categoria_aula = isset($_POST["categoria_aula"]) ? $_POST["categoria_aula"] : NULL;
$dia_semana = isset($_POST["dia_semana"]) ? $_POST["dia_semana"] : NULL;
$horario_inicio = isset($_POST["horario_inicio"]) ? $_POST["horario_inicio"] : NULL;
$professor = isset($_POST["professor"]) ? $_POST["professor"] : NULL;
$local = isset($_POST["local"]) ? $_POST["local"] : NULL;

$sql = ("UPDATE `aulas` 
            SET
               `nome_aluno` = :nome_aluno, 
               `categoria_aula` = :categoria_aula, 
               `dia_semana` = :dia_semana,
               `horario_inicio` = :horario_inicio,
               `professor` = :professor,
               `local` = :local
            WHERE 
               `id` = :id
        ");

$executar = Db::conexao()->prepare($sql);

$executar->bindValue(":nome_aluno", $nome_aluno, PDO::PARAM_STR);
$executar->bindValue(":categoria_aula", $categoria_aula, PDO::PARAM_STR);
$executar->bindValue(":dia_semana", $dia_semana, PDO::PARAM_STR);
$executar->bindValue(":horario_inicio", $horario_inicio, PDO::PARAM_STR);
$executar->bindValue(":professor", $professor, PDO::PARAM_STR);
$executar->bindValue(":local", $local, PDO::PARAM_STR);

$executar->execute();

header("Location: index.php");