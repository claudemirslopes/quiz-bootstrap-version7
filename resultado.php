<?php
session_start();
$top3 = $_SESSION['quiz_result']['top3'] ?? null;
$nome = $_SESSION['quiz_result']['nome'] ?? '';
$email = $_SESSION['quiz_result']['email'] ?? ''; // Adicionada a captura do e-mail
if (!$top3) {
    header('Location: quiz.php');
    exit;
}
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado do Quiz de Dons Espirituais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://igrejaatitudezonasul.com.br/wp-content/uploads/2025/04/favicon_01-100x100.png" sizes="32x32" />
    <link rel="icon" href="https://igrejaatitudezonasul.com.br/wp-content/uploads/2025/04/favicon_01.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://igrejaatitudezonasul.com.br/wp-content/uploads/2025/04/favicon_01.png" />
    <link href="assets/styles/resultado.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
<div class="container">
    <div class="card result-card shadow">
        <div class="card-body">
            <div class="text-center mb-3">
                <img src="assets/images/logo.webp" alt="Logo" style="max-width:120px;max-height:60px;">
                <h2 class="mb-1 mt-2" style="font-size:1.1rem;">Teste de Dons Espirituais</h2>
            </div>
            <h2 class="mb-4">Olá, <?= htmlspecialchars($nome) ?>!</h2>
            <h4 class="mb-3">Seus 3 principais dons espirituais:</h4>
            <?php foreach ($top3 as $r): ?>
                <div class="mb-4">
                    <h5 class="dom-title mb-1"> <?= htmlspecialchars($r['dom']) ?> <span class="badge bg-success ms-2">Pontuação: <?= $r['pontuacao'] ?></span></h5>
                    <p><?= htmlspecialchars($r['descricao']) ?></p>
                </div>
            <?php endforeach; ?>
            <div class="alert alert-info mt-4 text-center" style="font-size:0.98rem;">
                O resultado foi enviado para o e-mail informado: <br><b><?= htmlspecialchars($email) ?></b>
            </div>
            <a href="quiz.php" class="btn btn-sm btn-primary mt-3">Refazer Teste</a>
            <button class="btn btn-sm btn-warning btn-print mt-3 me-2" onclick="window.print()">
                <i class="fa-solid fa-print"></i> Imprimir
            </button>
            <button class="btn btn-sm btn-danger btn-pdf mt-3 me-2" id="btnSalvarPDF" type="button">
                <i class="fa-solid fa-file-pdf"></i> Salvar PDF
            </button>
            <a href="index.php" class="btn btn-link mt-3">Voltar ao início</a>            
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="assets/scripts/resultado.js"></script>
</body>
</html>
