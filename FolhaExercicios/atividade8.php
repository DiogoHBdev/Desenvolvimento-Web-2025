<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Financiamento da Moto - Juros Simples</title>
</head>
<body>
    <?php
        // Função para calcular o total e parcela com juros simples
        function calcularJurosSimples($valorPrincipal, $taxa, $tempo) {
            // Fórmula: Juros = Principal * Taxa * Tempo
            $juros = $valorPrincipal * ($taxa / 100) * $tempo;
            $total = $valorPrincipal + $juros;
            return $total;
        }

        // Valor à vista da moto
        $valorAvista = 8654.00;

        // Configurações de parcelas e taxas
        $parcelas = [
            24 => 1.5,
            36 => 2.0,
            48 => 2.5,
            60 => 3.0
        ];

        echo "<h2>Financiamento da Moto (Juros Simples)</h2>";
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
            $valorTotal = calcularJurosSimples($valorAvista, $taxa, $qtdParcelas);
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
