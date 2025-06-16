<?php
include("../Classe/Conexao.php");

header('Content-Type: application/json');

$dados = json_decode(file_get_contents("php://input"), true);

// Validando os dados
if (!isset($dados['evento_id']) || !isset($dados['alunos']) || !is_array($dados['alunos'])) {
    http_response_code(400);
    echo json_encode(["erro" => "Dados inválidos"]);
    exit;
}

$evento_id = $dados['evento_id'];
$alunos = $dados['alunos'];

try {
    $conexao = Db::conexao();

    $conexao->beginTransaction();

    foreach ($alunos as $aluno_id) {
        $stmt = $conexao->prepare("INSERT INTO evento_aluno (evento_id, aluno_id) VALUES (:evento_id, :aluno_id)");
        $stmt->bindValue(":evento_id", $evento_id, PDO::PARAM_INT);
        $stmt->bindValue(":aluno_id", $aluno_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    $conexao->commit();

    echo json_encode(["mensagem" => "Alunos cadastrados com sucesso"]);

} catch (Exception $e) {
    $conexao->rollBack();
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao cadastrar: " . $e->getMessage()]);
}
