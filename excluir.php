<?php
require_once __DIR__ . '/config/config.php';
// excluir.php
// Excluir registro do quiz
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: listagem.php');
    exit;
}
$id = (int)$_GET['id'];

$db = getDb();
$stmt = $db->prepare('DELETE FROM quiz_respostas WHERE id = ?');
$stmt->execute([$id]);
header('Location: listagem.php');
exit;
?>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
