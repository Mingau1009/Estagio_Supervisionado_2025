<?php
include("../Classe/Conexao.php");

try {
    $pdo = Db::conexao();

    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $dia_treino = $_POST['dia_treino'] ?? null;
    $exercicio_id = $_POST['exercicio_id'] ?? null;
    $num_series = $_POST['num_series'] ?? null;
    $num_repeticoes = $_POST['num_repeticoes'] ?? null;
    $tempo_descanso = $_POST['tempo_descanso'] ?? null;

    if (!$id) {
        http_response_code(400);
        echo "ID da ficha não informado.";
        exit;
    }

    $sql = "UPDATE ficha SET 
                nome = :nome,
                dia_treino = :dia_treino,
                exercicio_id = :exercicio_id,
                num_series = :num_series,
                num_repeticoes = :num_repeticoes,
                tempo_descanso = :tempo_descanso
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':dia_treino' => $dia_treino,
        ':exercicio_id' => $exercicio_id,
        ':num_series' => $num_series,
        ':num_repeticoes' => $num_repeticoes,
        ':tempo_descanso' => $tempo_descanso
    ]);

    echo "Atualizado com sucesso!";
} catch (Exception $e) {
    http_response_code(500);
    echo "Erro ao editar: " . $e->getMessage();
}
