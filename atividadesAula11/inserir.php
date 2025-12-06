<?php
    session_start();
    require 'conexao.php';
    require 'funcoes.php';

    $errors = [];
    $old = [];

    // coletar valores brutos
    $old['campo_primeiro_nome'] = $_POST['campo_primeiro_nome'] ?? '';
    $old['campo_sobrenome'] = $_POST['campo_sobrenome'] ?? '';
    $old['campo_email'] = $_POST['campo_email'] ?? '';
    $old['campo_password'] = $_POST['campo_password'] ?? '';
    $old['campo_cidade'] = $_POST['campo_cidade'] ?? '';
    $old['campo_estado'] = $_POST['campo_estado'] ?? '';

    // validar/sanitizar
    $v1 = validate_name($old['campo_primeiro_nome']);
    if ($v1 !== true) $errors[] = $v1;
    $v2 = validate_name($old['campo_sobrenome']);
    if ($v2 !== true) $errors[] = $v2;
    $v3 = validate_email($old['campo_email']);
    if (!is_string($v3)) $errors[] = $v3;
    $v4 = validate_password($old['campo_password']);
    if ($v4 !== true) $errors[] = $v4;
    $v5 = validate_city_state($old['campo_cidade']);
    if ($v5 !== true) $errors[] = $v5;
    $v6 = validate_city_state($old['campo_estado']);
    if ($v6 !== true) $errors[] = $v6;

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        header("Location: index.php");
        exit;
    }

    // se válido, sanitiza para inserir
    $nome = sanitize_text($old['campo_primeiro_nome']);
    $sobrenome = sanitize_text($old['campo_sobrenome']);
    $email = filter_var(trim($old['campo_email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash($old['campo_password'], PASSWORD_DEFAULT); // manipulação segura de senha
    $cidade = sanitize_text($old['campo_cidade']);
    $estado = sanitize_text($old['campo_estado']);

    $sql = "INSERT INTO TBPESSOA (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
            VALUES ($1, $2, $3, $4, $5, $6)";
    $params = array($nome, $sobrenome, $email, $password, $cidade, $estado);

    $res = pg_query_params($dbconn, $sql, $params);

    if ($res) {
        // opcional: redirect para listar
        header("Location: listar.php");
        exit;
    } else {
        $_SESSION['errors'] = ["Erro ao inserir no banco."];
        $_SESSION['old'] = $old;
        header("Location: index.php");
        exit;
    }
?>