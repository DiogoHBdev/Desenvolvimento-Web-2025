<?php
require 'conexao.php';
require 'funcoes.php';

// pega query da URL e sanitiza (remover caracteres perigosos)
$busca_raw = $_GET['q'] ?? '';
$busca = trim($busca_raw);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listagem de Pessoas</title>
</head>
<body>
  <h2>Listagem de Pessoas</h2>
  <form method="GET" action="listar.php">
      <input type="text" name="q" placeholder="Buscar por nome..." value="<?= htmlspecialchars($busca) ?>">
      <button type="submit">Buscar</button>
  </form>
  <br>

<?php
    if ($busca !== '') {
        // usamos pg_query_params com ILIKE e parâmetro
        $sql = "SELECT idpessoa, pesnome, pessobrenome, pesemail, pescidade, pesestado
                FROM TBPESSOA
                WHERE pesnome ILIKE $1
                ORDER BY idpessoa";
        $param = array('%' . $busca . '%');
        $result = pg_query_params($dbconn, $sql, $param);
    } else {
        $sql = "SELECT idpessoa, pesnome, pessobrenome, pesemail, pescidade, pesestado
                FROM TBPESSOA
                ORDER BY idpessoa";
        $result = pg_query($dbconn, $sql);
    }

    if ($result && pg_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='8'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>
                    <td>".htmlspecialchars($row['idpessoa'])."</td>
                    <td>".htmlspecialchars($row['pesnome'])."</td>
                    <td>".htmlspecialchars($row['pessobrenome'])."</td>
                    <td>".htmlspecialchars($row['pesemail'])."</td>
                    <td>".htmlspecialchars($row['pescidade'])."</td>
                    <td>".htmlspecialchars($row['pesestado'])."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
?>

  <br><a href="index.php">Cadastrar novo</a>
</body>
</html>