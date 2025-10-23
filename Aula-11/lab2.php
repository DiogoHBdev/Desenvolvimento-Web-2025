<?php
//CONEXÂO COM BANCO
    $connectionString = "host=localhost 
                        port=5432 
                        dbname=local 
                        user=postgres 
                        password=Talcope63.";

    $connection = pg_connect($connectionString);

    //CONSULTA SIMPLES
    if($connection) {
        echo "Database conectado com sucesso <br>";

        $result = pg_query($connection, "SELECT COUNT(*) AS QTDTABS FROM TBPESSOA");

        if($result) {
            $row = pg_fetch_assoc($result);
            echo "Quantidade de tabelas no database: ".$row['qtdtabs'];
        }
    } else {
        echo "Erro ao conectar no Database";
    }
/*
    //INSERIR DADOS NA TABELA PESSOA
    $aDadosPessoa = array ('João',
                            'Silva',
                            'joao.silva@gmail.com',
                            '123456',
                            'São Paulo',
                            'SP');

    $resultInsert = pg_query_params ($connection, 
                                    'INSERT INTO TBPESSOA (pesnome,
                                                           pessobrenome,
                                                           pesemail,
                                                           pespassword,
                                                           pescidade,
                                                           pesestado)
                                    VALUES ($1, $2, $3, $4, $5, $6)',
                                    $aDadosPessoa);
    if($resultInsert) {
        echo "<br>Dados inseridos com sucesso!";
    } else {
        echo "<br>Erro ao inserir dados!";
    }
*/
    if($connection)
        if($result) {
            echo "<table border= '1px'><tr>
                    <th>Resultado</th>
                    </tr>";
                    
            $row = pg_fetch_assoc($result);
            while($row) {
                echo "<tr>
                        <td>".$row['pescodigo'],"<td>
                        <td>".$row['pesnome'],"<td>
                        <td>".$row['pessobrenome'],"<td>
                        <td>".$row['pesemail'],"<td>
                        <td>".$row['pespassword'],"<td>
                        <td>".$row['pescidade'],"<td>
                        <td>".$row['pesestado'],"<td>
                     <tr>";
        }
    }
?>