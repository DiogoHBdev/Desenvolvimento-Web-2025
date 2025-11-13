<?php
// src/admin.php
require_once __DIR__ . '/db.php';

// Consulta médias por pergunta
$stmt = $pdo->query("
  SELECT p.id, p.texto, p.escala_max,
         COUNT(r.id) as respostas_count,
         ROUND(AVG(r.valor)::numeric,2) as media
  FROM perguntas p
  LEFT JOIN respostas r ON r.pergunta_id = p.id
  GROUP BY p.id, p.texto, p.escala_max
  ORDER BY p.ordem ASC
");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// últimos comentários
$coms = $pdo->query("SELECT comentario, criado_em FROM respostas WHERE comentario IS NOT NULL AND comentario <> '' ORDER BY criado_em DESC LIMIT 30")->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Admin - Dashboard</title></head>
<body>
  <h1>Dashboard - Avaliações</h1>
  <table border="1" cellpadding="8" cellspacing="0">
    <thead><tr><th>Pergunta</th><th>Escala</th><th># Respostas</th><th>Média</th></tr></thead>
    <tbody>
      <?php foreach($rows as $r): ?>
        <tr>
          <td><?=htmlspecialchars($r['texto'])?></td>
          <td><?=htmlspecialchars($r['escala_max'])?></td>
          <td><?=intval($r['respostas_count'])?></td>
          <td><?= $r['media'] !== null ? $r['media'] : '—' ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h2>Comentários recentes</h2>
  <?php if(count($coms)===0): ?>
    <p>Nenhum comentário encontrado.</p>
  <?php else: ?>
    <ul>
      <?php foreach($coms as $c): ?>
        <li><strong><?=htmlspecialchars(date('d/m/Y H:i', strtotime($c['criado_em'])))?></strong> — <?=nl2br(htmlspecialchars($c['comentario']))?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>
