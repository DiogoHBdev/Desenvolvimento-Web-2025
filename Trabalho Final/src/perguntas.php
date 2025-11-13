<?php
// src/perguntas.php
require_once __DIR__ . '/db.php';

function obterPerguntas(PDO $pdo) {
    $stmt = $pdo->prepare("SELECT id, texto, ordem, escala_max, obrigatoria FROM perguntas ORDER BY ordem ASC, id ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
