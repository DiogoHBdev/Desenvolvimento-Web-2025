<?php
    function sanitize_text($str) {
        $s = trim($str);
        $s = strip_tags($s);       // remove tags HTML
        $s = htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        return $s;
    }

    function validate_name($name) {
        $name = sanitize_text($name);
        if ($name === '') return "Nome obrigatório.";
        // aceita letras, espaços, hífen e acentos
        if (!preg_match("/^[\p{L}\s'-]+$/u", $name)) return "Nome contém caracteres inválidos.";
        if (mb_strlen($name) < 2) return "Nome muito curto.";
        return true;
    }

    function validate_email($email) {
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        if ($email === '') return "Email obrigatório.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Email inválido.";
        return $email;
    }

    function validate_password($pw) {
        if ($pw === '') return "Senha obrigatória.";
        if (mb_strlen($pw) < 6) return "Senha precisa ter pelo menos 6 caracteres.";
        return true;
    }

    function validate_city_state($val) {
        $val = sanitize_text($val);
        if ($val === '') return "Campo obrigatório.";
        if (mb_strlen($val) < 2) return "Valor muito curto.";
        return true;
    }
?>