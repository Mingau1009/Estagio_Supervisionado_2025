<?php
require 'jwt.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$input = json_decode(file_get_contents("php://input"), true);
$usuario = $input['usuario'] ?? '';
$senha = $input['senha'] ?? '';

if ($usuario === 'academia@gmail.com' && $senha === 'mf') {
    $chave = 'chave-secreta';
    $payload = [
        'usuario' => $usuario,
        'exp' => time() + 160
    ];

    $token = criarJWT($payload, $chave);
    echo json_encode(['token' => $token]);
} else {
    http_response_code(401);
    echo json_encode(['erro' => 'Usuário ou senha inválidos']);
}
?>
