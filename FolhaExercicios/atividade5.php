<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Triângulo Retângulo</title>
</head>
<body>
    <?php
        // Função para calcular a área de um triângulo retângulo
        function calcularAreaTriangulo($base, $altura) {
            return ($base * $altura) / 2;
        }

        // Variáveis para base e altura (em metros)
        $base = 6;
        $altura = 4;

        // Cálculo da área
        $area = calcularAreaTriangulo($base, $altura);

        // Exibição do resultado
        echo "<p>A área do triângulo retângulo de base $base metros e altura $altura metros é de $area metros quadrados.</p>";
    ?>
</body>
</html>
