<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Financiamento da Mariazinha</title>
</head>
<body>
    <?php
        // Função para calcular o total pago no financiamento
        function calcularTotalFinanciamento($parcela, $quantidadeParcelas) {
            return $parcela * $quantidadeParcelas;
        }

        // Dados do carro e financiamento
        $valorAvista = 22500.00;
        $valorParcela = 489.65;
        $quantidadeParcelas = 60;

        // Cálculos
        $valorTotalFinanciado = calcularTotalFinanciamento($valorParcela, $quantidadeParcelas);
        $juros = $valorTotalFinanciado - $valorAvista;

        // Exibição dos resultados
        echo "<h2>Financiamento da Mariazinha</h2>";
        echo "<p>Valor à vista do carro: R$ " . number_format($valorAvista, 2, ',', '.') . "</p>";
        echo "<p>Valor total pago no financiamento: R$ " . number_format($valorTotalFinanciado, 2, ',', '.') . "</p>";
        echo "<p style='color:red;'>Mariazinha pagará R$ " . number_format($juros, 2, ',', '.') . " só de juros.</p>";
    ?>
</body>
</html>
