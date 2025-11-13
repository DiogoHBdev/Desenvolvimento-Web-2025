<?php
// src/db.php
$config = require __DIR__ . '/../config.php';
$db = $config['db'];

$dsn = "pgsql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}";
try {
    $pdo = new PDO($dsn, $db['user'], $db['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // Em produção, esconda o erro. Aqui para debug exibimos.
    die("Erro conexão DB: " . $e->getMessage());
}
