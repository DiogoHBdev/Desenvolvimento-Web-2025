<?php
    // Etapa 1 - Tentar iniciar uma sessão e validar se ela já está estabelecida

    session_start();

    // Caso mão exista o dado "Usuároi" na global $_SESSION então vamos criar
    if(!isset($_SESSION['usuario'])) {
        // Caso tenha sido enviado do cliente pelo método POST o identificador do usuário,

        echo "Sessão iniciada. Usuário logado: " . $_SESSION['usuario'] . "<br>";
        echo "O seu identificador de sessão é " . session_id()."<br>";
    } else {
        echo "Não foi identificada uma sessão de usuário deverá logar.";
        echo '<a href="02_session_init.php">Link</a>';
    }
?>