<?php

    $connectionString = "host=localhost port=5432 dbname=local user=postgres password=Talcope63.";

    $connection = pg_connect($connectionString);
    if ($connection) {
        
        $aDadosPessoa = array ('Diogo', 'H. Bezerra', 'diogo-25db@hotmail.com', '123456', 'Ituporanga', 'SC')
        $resultInsert = pg_query_params ($connection, 'INSERT INTO TBPESSOA (pesnome, pessobrenome, pesemail, paspassword, pescidade, pesestado) VALUES ($1, $2, $3, $4, $5, $6))', $aDadosPessoa)
        
        echo "Dados inseridos com sucesso! <br>";

        $result = pg_query($connection, "SELECT COUNT(*) AS QTDTABS FROM tbpessoa");

        if($result) {
            $row = pg_fetch_assoc($result);
            echo "Quantidade de tabelas no database: ".$row['qtdtabs'];
        } else {
            echo "Erro ao excecutar consulta.";
        }
    } else {
        echo "Erro ao conectar no databse :(";
    }

?>