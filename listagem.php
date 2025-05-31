<?php
require_once __DIR__ . '/config/config.php';
// listagem.php
// Página para listar todos os registros do quiz com paginação usando DataTables

$db = getDb();
$registros = $db->query("SELECT * FROM quiz_respostas ORDER BY data_envio DESC")->fetchAll();

?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registros do Teste de Dons Espirituais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="assets/styles/listagem.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="mb-4">Registros do Teste</h2>
            <div class="table-responsive">
                <table id="quizTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>Dom 1</th>
                            <th>Pts</th>
                            <th>Dom 2</th>
                            <th>Pts</th>
                            <th>Dom 3</th>
                            <th>Pts</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $r): ?>
                        <tr>
                            <!-- <td><?= $r['id'] ?></td> -->
                            <td><?= htmlspecialchars($r['nome']) ?></td>
                            <td><?= htmlspecialchars($r['email']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($r['data_envio'])) ?></td>
                            <td><?= htmlspecialchars($r['top1']) ?></td>
                            <td><?= $r['top1_pontos'] ?></td>
                            <td><?= htmlspecialchars($r['top2']) ?></td>
                            <td><?= $r['top2_pontos'] ?></td>
                            <td><?= htmlspecialchars($r['top3']) ?></td>
                            <td><?= $r['top3_pontos'] ?></td>
                            <td>
                                <a href="detalhes.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info" title="Detalhes">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="editar.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning btn-editar" title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="excluir.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este registro?');">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="assets/scripts/listagem.js"></script>
</body>
</html>
