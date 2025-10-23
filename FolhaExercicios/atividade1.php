<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Soma de Três Valores</title>
</head>
<body>
    <?php
        // Função para somar três números
        function somar($a, $b, $c) {
            return $a + $b + $c;
        }

        // Valores (pode alterar aqui para testar)
        $num1 = 12;
        $num2 = 5;
        $num3 = 8;

        $resultado = somar($num1, $num2, $num3);

        // Regras de cor
        if ($num1 > 10) {
            echo "<p style='color:blue;'>O resultado é: $resultado</p>";
        } elseif ($num2 < $num3) {
            echo "<p style='color:green;'>O resultado é: $resultado</p>";
        } elseif ($num3 < $num1 && $num3 < $num2) {
            echo "<p style='color:red;'>O resultado é: $resultado</p>";
        } else {
            echo "<p>O resultado é: $resultado</p>";
        }
    ?>
</body>
</html>
