<?php
    // reuso e exibição de valores após erro
    session_start();
    $old = $_SESSION['old'] ?? [];
    $errors = $_SESSION['errors'] ?? [];
    // limpa sessão (apenas para exibir uma vez)
    unset($_SESSION['old'], $_SESSION['errors']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastro de Pessoas</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h2>Cadastro de Pessoa</h2>

  <?php if(!empty($errors)): ?>
    <div style="color: red;">
      <ul>
        <?php foreach($errors as $e) echo "<li>".htmlspecialchars($e)."</li>"; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="inserir.php" method="POST">
    <label>Nome:</label><br>
    <input type="text" name="campo_primeiro_nome" value="<?= htmlspecialchars($old['campo_primeiro_nome'] ?? '') ?>" required><br><br>

    <label>Sobrenome:</label><br>
    <input type="text" name="campo_sobrenome" value="<?= htmlspecialchars($old['campo_sobrenome'] ?? '') ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="campo_email" value="<?= htmlspecialchars($old['campo_email'] ?? '') ?>" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="campo_password" value=""><br><br>

    <label>Cidade:</label><br>
    <input type="text" name="campo_cidade" value="<?= htmlspecialchars($old['campo_cidade'] ?? '') ?>" required><br><br>

    <label>Estado:</label><br>
    <input type="text" name="campo_estado" value="<?= htmlspecialchars($old['campo_estado'] ?? '') ?>" required><br><br>

    <button type="submit">Cadastrar (Banco)</button>
  </form>

  <br>
  <form action="salvar_json.php" method="POST">
    <!-- opção de salvar também direto no JSON (Exercício 3) -->
    <input type="hidden" name="action" value="json_save">
    <button type="submit">Salvar este formulário no JSON (arquivo)</button>
  </form>

  <br>
  <a href="listar.php">Ver lista de pessoas (Banco)</a> |
  <a href="dados.json" target="_blank">Abrir dados.json</a>

</body>
</html>