<?php

    //CONEXÂO COM BANCO
    $connectionString = "host=localhost 
                        port=5432 
                        dbname=local 
                        user=postgres 
                        password=Talcope63.";

    $connection = pg_connect($connectionString);
    
    //PEGAr OS DADOS DO HTML
    $aDados = array($_POST['codigo'],
                    $_POST['nome'],
                    $_POST['sobrenome'],
                    $_POST['email'],
                    $_POST['senha'],
                    $_POST['cidade'],
                    $_POST['estado']);

    //INSERIR DADOS NA TABELA
    $resultInsert = pg_query_params ($connection, 'INSERT INTO TBPESSOA (pescodigo, pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado) VALUES ($1, $2, $3, $4, $5, $6, $7)', $aDados);
    if($resultInsert) {
        echo "<br>Dados inseridos com sucesso!";
    } else {
        echo "<br>Erro ao inserir dados!";
    }
?>