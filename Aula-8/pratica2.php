<?php
    $salario1 = 1000;
    $salario2 = 2000;
    $salario2 = $salario1;
    ++$salario2;

    $salario1 = $salario1 * 1.1;
    
    echo "Valor salário 1: $salario1 e Valor salário 2: $salario2";
    
    if ($salario1 > $salario2) {
        echo (" O Valor da variável 1 é maior que o valor da variável 2");
    } else {
        echo (" O Valor da variável 2 é maior que o valor da variável 1");
    }

    for ($i = 0; $i < 100; $i++) {
        ++$salario1;
        if ($i == 50) {
            break;
        }
    }
    
    if ($salario1 < $salario2) {
        echo ($salario1);
    }

    $diciplinas = array("Linguagemd e programação e paradigmas, Engenharia de software 2, "Adm e Sistemas de informação", "Programação Web 1", "Banco de Dados 2")
?>