<?php
// etapa_nome_email.php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['quiz_nome'] = trim($_POST['nome'] ?? '');
    $_SESSION['quiz_email'] = trim($_POST['email'] ?? '');
    // Validação simples
    if (!$_SESSION['quiz_nome'] || !$_SESSION['quiz_email']) {
        $erro = 'Preencha todos os campos.';
    } else {
        header('Location: quiz.php');
        exit;
    }
}
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Identificação - Teste de Dons do Espírito Santo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/styles/etapa_nome_email.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
<div class="container py-5">
    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="mb-4">Identifique-se para iniciar o teste</h3>
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger"> <?= $erro ?> </div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Primeiro Nome <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="<?= htmlspecialchars($_SESSION['quiz_nome'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_SESSION['quiz_email'] ?? '') ?>">
                </div>
                <button type="submit" class="btn btn-success w-100">Iniciar Teste</button>
            </form>
        </div>
    </div>
</div>
<script src="assets/scripts/etapa_nome_email.js"></script>
</body>
</html>
