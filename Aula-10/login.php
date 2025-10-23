<?php
    session_start();
    if(!isset($_SESSION['usuario'])) {
        $_SESSION["usuario"] = $_POST["login"];
        $_SESSION["senha"] = $_POST["senha"];
        $_SESSION['inicio_sessão'] = date('Y-m-d H:i:s');

        echo "Sessão iniciada e usuário logado";
    } else {
        echo "usuario: " . $_SESSION["usuario"] . "Usuário já está logado";
        echo "senha: " . $_SESSION["senha"];

        echo "tempo de sessão: " . (strtotime($_SESSION["ultimo_acesso"])) - strtotime(
            $_SESSION["inicio_sessão"])
?>