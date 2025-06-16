<?php
include("../Classe/Conexao.php");

$dados = json_decode(file_get_contents("php://input"), true);

if (!isset($dados['id']) || !isset($dados['alunos']) || !is_array($dados['alunos'])) {
    http_response_code(400);
    echo json_encode(["erro" => "Dados incompletos ou inválidos."]);
    exit;
}

$evento_id = $dados['id'];
$alunos = $dados['alunos'];

$conexao = Db::conexao();

try {
    // Remove os alunos antigos
    $stmtExcluir = $conexao->prepare("DELETE FROM evento_aluno WHERE evento_id = :evento_id");
    $stmtExcluir->bindValue(":evento_id", $evento_id, PDO::PARAM_INT);
    $stmtExcluir->execute();

    // Insere os novos
    foreach ($alunos as $aluno) {
        $stmtInserir = $conexao->prepare("INSERT INTO evento_aluno (evento_id, aluno_id) VALUES (:evento_id, :aluno_id)");
        $stmtInserir->bindValue(":evento_id", $evento_id, PDO::PARAM_INT);
        $stmtInserir->bindValue(":aluno_id", $aluno['id'], PDO::PARAM_INT);
        $stmtInserir->execute();
    }

    echo json_encode(["mensagem" => "Alunos atualizados com sucesso"]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao editar alunos: " . $e->getMessage()]);
}
