<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Árvore de Pastas</title>
</head>
<body>
    <?php
        //Array fornecido
        $pastas = array(
            "bsn" => array(
                "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
                "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
            )
        );

        // Função recursiva para imprimir a árvore
        function imprimirArvore($array, $nivel = 0) {
            foreach ($array as $chave => $valor) {
                if (is_array($valor)) {
                    // Mostra a chave com os hífens correspondentes ao nível
                    echo str_repeat("-", $nivel + 1) . " " . $chave . "<br>";
                    imprimirArvore($valor, $nivel + 1);
                } else {
                    // Valor final (string)
                    echo str_repeat("-", $nivel + 1) . " " . $valor . "<br>";
                }
            }
        }

        // Chamada da função
        imprimirArvore($pastas);
    ?>
</body>
</html>
