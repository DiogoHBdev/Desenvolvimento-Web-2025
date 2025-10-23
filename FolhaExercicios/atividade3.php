<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Quadrado</title>
</head>
<body>
    <?php
        // Função para calcular a área de um quadrado
        function calcularAreaQuadrado($lado) {
            return $lado * $lado;
        }

        // Valor do lado em metros (pode alterar aqui)
        $lado = 3;

        // Cálculo da área
        $area = calcularAreaQuadrado($lado);

        // Exibição do resultado
        echo "<p>A área do quadrado com lado $lado metros, equivale $area metros quadrados.</p>";
    ?>
</body>
</html>
