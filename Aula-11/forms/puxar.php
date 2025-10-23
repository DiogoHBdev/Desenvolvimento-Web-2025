<?php

    //CONEXÂO COM BANCO
    $connectionString = "host=localhost 
                        port=5432 
                        dbname=local 
                        user=postgres 
                        password=Talcope63.";

    $connection = pg_connect($connectionString);

    if(isset($_POST["campo_pesquisa"])) {
                $termoBusca = '%' . $_POST["campo_pesquisa"] . '%';
            } else {
                $termoBusca = '';
            }

    $result = pg_execute("SELECT * FROM TBPESSOA"), array($termoBusca)
    if(pg_num_rows($result == 0)) {
        echo "Nada encontrado";
    } else {
            echo "<table border= '1px'><tr>
                    <th>Resultado</th>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Estado</th>
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
                    </tr>;";
            }
        }

?>