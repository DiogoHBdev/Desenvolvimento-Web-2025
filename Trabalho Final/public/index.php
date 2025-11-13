<?php
// public/index.php
require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/perguntas.php';

$perguntas = obterPerguntas($pdo);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Avaliação de Qualidade</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <main class="container">
    <h1>Avalie nosso estabelecimento</h1>
    <form id="form-avaliacao">
      <?php foreach ($perguntas as $p): 
        $max = (int)$p['escala_max'];
        $pid = (int)$p['id'];
      ?>
      <section class="pergunta">
        <label class="texto-pergunta"><?=htmlspecialchars($p['texto'])?> <?php if($p['obrigatoria']) echo '<span class="obrig">*</span>'; ?></label>
        <div class="escala"
            data-max="<?=$max?>"
            data-pergunta="<?=$pid?>"
            data-obrigatoria="<?=$p['obrigatoria']?>">

          <?php for ($i=0;$i<=$max;$i++): ?>
            <label class="box">
              <input type="radio" name="resposta_<?=$pid?>" value="<?=$i?>">
              <span class="valor"><?=$i?></span>
            </label>
          <?php endfor; ?>
        </div>
      </section>
      <?php endforeach; ?>

      <section class="pergunta">
        <label class="texto-pergunta">Feedback adicional (opcional)</label>
        <textarea name="comentario" id="comentario" rows="4" placeholder="Escreva aqui sugestões ou comentários..."></textarea>
      </section>

      <div class="rodape">
        <p class="anonimo">Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
        <button type="submit" id="btnEnviar">Enviar avaliação</button>
      </div>
    </form>

    <div id="mensagem" class="oculto"></div>
  </main>

  <script src="js/script.js"></script>
</body>
</html>
