<?php
// src/respostas.php
file_put_contents(__DIR__ . "/debug_post.txt", print_r($_POST, true));
require_once __DIR__ . '/db.php';
header('Content-Type: application/json; charset=utf-8');

try {
    // obter perguntas para validar escala e obrigatoriedade
    $pergStmt = $pdo->query("SELECT id, escala_max, obrigatoria FROM perguntas");
    $perguntas = [];
    while ($r = $pergStmt->fetch(PDO::FETCH_ASSOC)) {
        $perguntas[$r['id']] = $r;
    }

    // percorrer POST para capturar respostas no formato resposta_{id}
    $pdo->beginTransaction();

    // gerar um uuid por submissão para agrupar (sem dados pessoais)
    $stmt_uuid = $pdo->prepare("SELECT gen_random_uuid() as uuid");
    $stmt_uuid->execute();
    $rowu = $stmt_uuid->fetch(PDO::FETCH_ASSOC);
    $sub_uuid = $rowu['uuid'];

    // $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : null;
    $comentario = isset($_POST['comentario']) && trim($_POST['comentario']) !== ""
    ? trim($_POST['comentario'])
    : null;

    $insert = $pdo->prepare("INSERT INTO respostas (responder_uuid, pergunta_id, valor, comentario) VALUES (:uuid, :pid, :valor, :comentario)");

    $anySaved = false;
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'resposta_') !== 0) continue;
        $pid = intval(substr($k, strlen('resposta_')));
        if (!isset($perguntas[$pid])) continue;

        $valor = intval($v);
        $max = intval($perguntas[$pid]['escala_max']);
        if ($valor < 0 || $valor > $max) {
            throw new Exception("Valor fora da escala para pergunta $pid");
        }

        $insert->execute([
            ':uuid' => $sub_uuid,
            ':pid' => $pid,
            ':valor' => $valor,
            ':comentario' => $comentario
        ]);
        $anySaved = true;
    }

    if (!$anySaved) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Nenhuma resposta enviada.']);
        exit;
    }

    $pdo->commit();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
