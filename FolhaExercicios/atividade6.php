<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Feira do Joãozinho</title>
</head>
<body>
    <?php
        // Função para calcular o valor total de um produto (preço por kg * quantidade)
        function calcularValorProduto($precoKg, $quantidadeKg) {
            return $precoKg * $quantidadeKg;
        }

        // Dinheiro disponível
        $dinheiro = 50.00;

        // Lista de produtos com preço por kg e quantidade comprada
        $produtos = [
            "maçã"      => ["preco" => 5.50, "quantidade" => 2],
            "melancia"  => ["preco" => 3.00, "quantidade" => 4],
            "laranja"   => ["preco" => 4.00, "quantidade" => 1.5],
            "repolho"   => ["preco" => 2.50, "quantidade" => 1],
            "cenoura"   => ["preco" => 3.20, "quantidade" => 2],
            "batatinha" => ["preco" => 4.80, "quantidade" => 3]
        ];

        // Calcula o total gasto
        $total = 0;
        echo "<h3>Itens comprados:</h3><ul>";
        foreach ($produtos as $nome => $dados) {
            $valor = calcularValorProduto($dados["preco"], $dados["quantidade"]);
            echo "<li>" . ucfirst($nome) . ": R$ " . number_format($valor, 2, ',', '.') . "</li>";
            $total += $valor;
        }
        echo "</ul>";

        // Exibição do resultado final
        echo "<h3>Valor total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>";

        // Verifica o saldo de Joãozinho
        if ($total > $dinheiro) {
            $falta = $total - $dinheiro;
            echo "<p style='color:red;'>Joãozinho não tem dinheiro suficiente! Faltaram R$ " . number_format($falta, 2, ',', '.') . ".</p>";
        } elseif ($total < $dinheiro) {
            $restante = $dinheiro - $total;
            echo "<p style='color:blue;'>Joãozinho ainda pode gastar R$ " . number_format($restante, 2, ',', '.') . ".</p>";
        } else {
            echo "<p style='color:green;'>O saldo de R$ 50,00 foi esgotado perfeitamente!</p>";
        }
    ?>
</body>
</html>
