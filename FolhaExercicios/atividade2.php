<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificar Divisibilidade por 2</title>
</head>
<body>
    <?php
        // Função para verificar se o número é divisível por 2
        function divisivelPorDois($numero) {
            return $numero % 2 == 0;
        }

        // Valor para testar (pode alterar para outro número)
        $valor = 7;

        // Verifica a condição e exibe o resultado
        if (divisivelPorDois($valor)) {
            echo "<p>Valor divisível por 2</p>";
        } else {
            echo "<p>O valor não é divisível por 2</p>";
        }
    ?>
</body>
</html>
