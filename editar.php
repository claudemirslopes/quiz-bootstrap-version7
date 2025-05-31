<?php
require_once __DIR__ . '/config/config.php';
// editar.php
// Editar registro do quiz
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: listagem.php');
    exit;
}
$id = (int)$_GET['id'];

$db = getDb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $stmt = $db->prepare('UPDATE quiz_respostas SET nome = ?, email = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $id]);
    header('Location: detalhes.php?id=' . $id);
    exit;
}

$stmt = $db->prepare('SELECT * FROM quiz_respostas WHERE id = ?');
$stmt->execute([$id]);
$registro = $stmt->fetch();
if (!$registro) {
    echo '<div class="alert alert-danger">Registro não encontrado.</div>';
    exit;
}
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="mb-3">Editar Registro #<?= $registro['id'] ?></h2>
            <form method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($registro['nome']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($registro['email']) ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="detalhes.php?id=<?= $registro['id'] ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
