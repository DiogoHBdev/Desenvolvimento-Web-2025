<?php
    $host = "localhost";
    $port = "5432";
    $dbname = "atividadeaula11";
    $user = "postgres";
    $password = "#Talcope63.";

    $dbconn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    // $dbconn = pg_connect("host=localhost port=5432 dbname=AtividadeAula11 user=postgres password=123456");

//     if (!$dbconn) {

//         echo("Erro ao conectar ao banco de dados.");
//     } else {
//             echo("Banco de dados conectado");
//     }
// ?>