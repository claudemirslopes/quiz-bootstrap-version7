<?php
require_once __DIR__ . '/config/config.php';
// detalhes.php
// Visualizar detalhes de um registro do quiz

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: listagem.php');
    exit;
}
$id = (int)$_GET['id'];

$db = getDb();
$stmt = $db->prepare('SELECT * FROM quiz_respostas WHERE id = ?');
$stmt->execute([$id]);
$registro = $stmt->fetch();
if (!$registro) {
    echo '<div class="alert alert-danger">Registro não encontrado.</div>';
    exit;
}
$respostas = json_decode($registro['respostas'], true);
$pontuacoes = json_decode($registro['pontuacoes'], true);
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://igrejaatitudezonasul.com.br/wp-content/uploads/2025/04/favicon_01-100x100.png" sizes="32x32" />
    <link rel="icon" href="https://igrejaatitudezonasul.com.br/wp-content/uploads/2025/04/favicon_01.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://igrejaatitudezonasul.com.br/wp-content/uploads/2025/04/favicon_01.png" />
    <style>
        body, .card-body, .card-body p, .card-body li, .card-body table, .card-body th, .card-body td {
            font-size: 0.88rem;
        }
        .card-body h2, .card-body h5 {
            font-size: 1.1rem;
        }
        .card-body ol, .card-body ul {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
<div class="container py-4">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="mb-3">Detalhes do Registro #<?= $registro['id'] ?></h2>
            <p><b>Nome:</b> <?= htmlspecialchars($registro['nome']) ?></p>
            <p><b>E-mail:</b> <?= htmlspecialchars($registro['email']) ?></p>
            <p><b>Data:</b> <?= date('d/m/Y H:i', strtotime($registro['data_envio'])) ?></p>
            <hr>
            <h5>Top 3 Dons</h5>
            <ol>
                <li><b><?= htmlspecialchars($registro['top1']) ?></b> (<?= $registro['top1_pontos'] ?> pontos)</li>
                <li><b><?= htmlspecialchars($registro['top2']) ?></b> (<?= $registro['top2_pontos'] ?> pontos)</li>
                <li><b><?= htmlspecialchars($registro['top3']) ?></b> (<?= $registro['top3_pontos'] ?> pontos)</li>
            </ol>
            <hr>
            <h5>Pontuação de todos os dons</h5>
            <ul>
                <?php foreach ($pontuacoes as $dom => $pontos): ?>
                    <li><b>Dom <?= $dom ?>:</b> <?= $pontos ?> pontos</li>
                <?php endforeach; ?>
            </ul>
            <hr>
            <a href="listagem.php" class="btn btn-secondary">Voltar à lista</a>
            <a href="editar.php?id=<?= $registro['id'] ?>" class="btn btn-warning">Editar</a>
            <a href="excluir.php?id=<?= $registro['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Respostas Individuais</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead><tr><th>Pergunta</th><th>Resposta</th></tr></thead>
                    <tbody>
                    <?php foreach ($respostas as $num => $resp): ?>
                        <tr><td><?= $num ?></td><td><?= $resp ?></td></tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
