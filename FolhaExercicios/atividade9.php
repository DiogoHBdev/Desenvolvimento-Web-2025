<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Financiamento da Moto - Juros Compostos</title>
</head>
<body>
    <?php
        // Função para calcular o montante com juros compostos
        function calcularJurosCompostos($capital, $taxa, $tempo) {
            // Fórmula: M = C * (1 + i) ^ t
            return $capital * pow((1 + ($taxa / 100)), $tempo);
        }

        // Valor à vista da moto
        $valorAvista = 8654.00;

        // Configurações: parcelas e taxas (inicia em 2% e aumenta 0.3% por nível)
        $parcelas = [
            24 => 2.0,
            36 => 2.3,
            48 => 2.6,
            60 => 2.9
        ];

        echo "<h2>Financiamento da Moto - Juros Compostos </h2>";
        echo "<p>Valor à vista: R$ " . number_format($valorAvista, 2, ',', '.') . "</p>";

        echo "<table border='1' cellpadding='8' cellspacing='0'>
                <tr style='background-color:#ddd;'>
                    <th>Parcelas</th>
                    <th>Taxa de Juros (%)</th>
                    <th>Valor Total (R$)</th>
                    <th>Valor da Parcela (R$)</th>
                </tr>";

        // Loop para calcular cada opção de parcelamento
        foreach ($parcelas as $qtdParcelas => $taxa) {
            $valorTotal = calcularJurosCompostos($valorAvista, $taxa, $qtdParcelas);
            $valorParcela = $valorTotal / $qtdParcelas;

            echo "<tr>
                    <td>$qtdParcelas x</td>
                    <td>$taxa%</td>
                    <td>R$ " . number_format($valorTotal, 2, ',', '.') . "</td>
                    <td>R$ " . number_format($valorParcela, 2, ',', '.') . "</td>
                  </tr>";
        }

        echo "</table>";
    ?>
</body>
</html>
