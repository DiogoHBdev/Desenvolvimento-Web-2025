<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Retângulo</title>
</head>
<body>
    <?php
        // Função para calcular a área de um retângulo
        function calcularAreaRetangulo($a, $b) {
            return $a * $b;
        }

        // Valores dos lados (em metros)
        $a = 3;
        $b = 2;

        // Cálculo da área
        $area = calcularAreaRetangulo($a, $b);

        // Mensagem a ser exibida
        $mensagem = "A área do retângulo de lados $a e $b metros é $area metros quadrados.";

        // Exibição conforme a área
        if ($area > 10) {
            echo "<h1>$mensagem</h1>";
        } else {
            echo "<h3>$mensagem</h3>";
        }
    ?>
</body>
</html>
