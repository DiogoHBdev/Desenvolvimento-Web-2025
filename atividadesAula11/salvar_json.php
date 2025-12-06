<?php
require 'funcoes.php';

// caminho do arquivo (garanta permissões de escrita)
$file = __DIR__ . '/dados.json';

// pega dados do POST (se vierem); alternativa: testar $_POST vazio e redirecionar
$nome = $_POST['campo_primeiro_nome'] ?? '';
$sobrenome = $_POST['campo_sobrenome'] ?? '';
$email = $_POST['campo_email'] ?? '';
$password = $_POST['campo_password'] ?? '';
$cidade = $_POST['campo_cidade'] ?? '';
$estado = $_POST['campo_estado'] ?? '';

// Se não houver dados vindos do formulário (chamada direta pelo botão que não envia campos), 
// você pode adicionar valores de exemplo — mas ideal é submeter o formulário completo.
if ($nome === '' && $sobrenome === '' && $email === '') {
    // Para o enunciado "Gravar 10 pessoas no arquivo", vamos gerar 10 pessoas de exemplo
    $arr = [];
    for ($i=1; $i<=10; $i++) {
        $arr[] = [
            'nome' => "PessoaExemplo$i",
            'sobrenome' => "SobEx$i",
            'email' => "pessoa{$i}@exemplo.local",
            'cidade' => "Cidade$i",
            'estado' => "EST",
            'criado_em' => date('c')
        ];
    }
    // sobrescreve o arquivo com essas 10 pessoas
    file_put_contents($file, json_encode($arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE), LOCK_EX);
    echo "Arquivo criado com 10 pessoas de exemplo: dados.json";
    exit;
}

// Se vierem dados do formulário, validamos/sanitizamos antes de salvar
$errors = [];
$v1 = validate_name($nome); if ($v1 !== true) $errors[] = $v1;
$v2 = validate_name($sobrenome); if ($v2 !== true) $errors[] = $v2;
$v3 = validate_email($email); if (!is_string($v3)) $errors[] = $v3;
$v4 = validate_city_state($cidade); if ($v4 !== true) $errors[] = $v4;
$v5 = validate_city_state($estado); if ($v5 !== true) $errors[] = $v5;

if (!empty($errors)) {
    foreach ($errors as $e) echo "<p style='color:red;'>".htmlspecialchars($e)."</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    exit;
}

$entry = [
    'nome' => sanitize_text($nome),
    'sobrenome' => sanitize_text($sobrenome),
    'email' => filter_var(trim($email), FILTER_SANITIZE_EMAIL),
    'cidade' => sanitize_text($cidade),
    'estado' => sanitize_text($estado),
    'criado_em' => date('c')
];

// ler arquivo atual
$existing = [];
if (file_exists($file)) {
    $json = file_get_contents($file);
    $existing = json_decode($json, true);
    if (!is_array($existing)) $existing = [];
}

// impedir mais de 10 registros
if (count($existing) >= 10) {
    echo "O arquivo já contém 10 pessoas. Não foi possível adicionar mais.";
    echo "<p><a href='index.php'>Voltar</a></p>";
    exit;
}

// acrescenta novo registro
$existing[] = $entry;

// se ultrapassar 10 por concorrência, corta para 10
if (count($existing) > 10) {
    $existing = array_slice($existing, 0, 10);
}

// salva com lock
file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE), LOCK_EX);

echo "Registro salvo em dados.json (total atual: ".count($existing).").";
echo "<p><a href='index.php'>Voltar</a></p>";