<?php
require_once __DIR__ . '/config/config.php';
// quiz.php
// Script de Quiz de Dons Espirituais

// Definição dos grupos de dons
$grupos = [
    1 => ["Socorro", "A habilidade de trabalhar e dar suporte a outros esforços ministeriais de outros crentes. Mc 15:40-41 // Rm 16:1-2 // 1Cor 12:28 // At 9:36"],
    2 => ["Liderança", "A habilidade de influenciar outros de acordo com um propósito maior, uma missão ou plano. Rm 12:8 // 1Tm 3:1-13 // 1Tm 5:17 // Hb 13:17"],
    3 => ["Hospitalidade", "A habilidade de fazer as pessoas se sentirem 'em casa', bem-vindas, bem cuidadas e como parte do grupo. At 16:14-15 // Rm 12:13 // 1Pe 4:9 // Rm 16:23 // Hb 13:1-2"],
    4 => ["Serviço", "A habilidade de identificar e atender às necessidades práticas dos outros. At 6:1-7 // Rm 12:7 // Tt 3:14 // Gl 6:10 // 2Tm 1:16-18"],
    5 => ["Administração", "A habilidade de coordenar e organizar pessoas e projetos. Lc 14:28-30 // At 6:1-7 // 1Cor 12:28"],
    6 => ["Discernimento", "A habilidade de perceber se as ações da pessoa têm origem em fontes divinas, satânicas ou meramente humanas. Mt 16:21-23 // At 5:1-11 // 1Jo 4:1-6 // 1Cor 12:10"],
    7 => ["Fé", "A habilidade de crer e confiar em Deus sobre as coisas que não se vêem, para o crescimento espiritual e para a aceitação da Sua vontade. At 11:22-24 // Rm 4:18-21 // 1Cor 12:9 // Hb 11"],
    8 => ["Contribuição", "A habilidade de contribuir alegre e generosamente para a obra de Deus com os recursos pessoais. Mc 12:41-44 // Rm 12:8 // 2Cor 8:1-7 // 2Cor 9:2-7"],
    9 => ["Misericórdia", "A habilidade de sentir sincera empatia e compaixão que motivem ações práticas para aliviar a dor das pessoas que sofrem. Mt 9:35-36 // Mc 9:41 // Rm 12:8 // 1Ts 5:15"],
    10 => ["Sabedoria", "A habilidade de discernir a mente de Cristo e aplicar a verdade bíblica a uma situação específica a fim de fazer as escolhas certas e ajudar os outros a avançar na direção certa. At 6:3,10 // 1Cor 2:6-13 // 1Cor 12:8"],
    11 => ["Exortação", "A habilidade de apropriadamente comunicar palavras de ânimo, desafio ou repreensão no Corpo de Cristo. At 14:22 // Rm 12:8 // 1Tm 4:13 // Hb 10:24-25"],
    12 => ["Ensino", "A habilidade de utilizar uma maneira lógica e sistemática do estudo bíblico em preparação para comunicar claramente a verdade prática ao Corpo de Cristo. At 18:24-28 // At 20:20-21 // 1Cor 12:28 // Ef 4:11-14"],
    13 => ["Ministério", "A habilidade de assumir a responsabilidade pelo crescimento espiritual de uma comunidade cristã ou um grupo de crentes. Jo 10:1-18 // Ef 4:11-14 // 1Tm 3:1-7 // 1Pe 5:1-3"],
    14 => ["Apostolado", "A habilidade de iniciar ministérios e oferecer liderança espiritual sobre um número de igrejas que resultem em ministérios frutíferos. At 15:22-35 // 1Cor 12:28 // Ef 4:11-14 // 2Cor 12:12 // Gl 2:7-10"],
    15 => ["Missões", "A habilidade de ministrar de maneira eficaz em culturas diferentes da sua própria. At 8:4 // Atos 13:2-3 // At 22:21 // Rm 10:15"],
    16 => ["Profecia", "A habilidade de corajosamente declarar a verdade de Deus, independente das consequências, chamando as pessoas para uma vida íntegra. At 2:37-40 // At 7:51-53 // 1Ts 1:5 // At 26:24-29 // 1Cor 14:1-4"],
    17 => ["Evangelismo", "A habilidade de partilhar as boas novas de Jesus com outros de tal maneira que muitos incrédulos creiam em Cristo e se convertam. At 8:5-6 // At 8:26-40 // Ef 4:11-14 // At 14:21 // At 21:8"],
    18 => ["Intercessão", "A habilidade de regularmente orar por longos períodos de tempo, normalmente observando respostas específicas às orações feitas. Cl 1:9-12 // Cl 4:12-13 // Tg 5:14-16"],
];

// Mapeamento das perguntas para os grupos
$mapa_perguntas = [
    1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18,
    19 => 1, 20 => 2, 21 => 3, 22 => 4, 23 => 5, 24 => 6, 25 => 7, 26 => 8, 27 => 9, 28 => 10, 29 => 11, 30 => 12, 31 => 13, 32 => 14, 33 => 15, 34 => 16, 35 => 17, 36 => 18,
    37 => 1, 38 => 2, 39 => 3, 40 => 4, 41 => 5, 42 => 6, 43 => 7, 44 => 8, 45 => 9, 46 => 10, 47 => 11, 48 => 12, 49 => 13, 50 => 14, 51 => 15, 52 => 16, 53 => 17, 54 => 18,
    55 => 1, 56 => 2, 57 => 3, 58 => 4, 59 => 5, 60 => 6, 61 => 7, 62 => 8, 63 => 9, 64 => 10, 65 => 11, 66 => 12, 67 => 13, 68 => 14, 69 => 15, 70 => 16, 71 => 17, 72 => 18
];

// Perguntas
$perguntas = [
    1 => "Eu gosto de trabalhar nos bastidores, cuidando de pequenos detalhes.",
    2 => "Eu normalmente me apresento e assumo um grupo onde a liderança ainda não existe.",
    3 => "Quando em grupo, eu observo aqueles que estão sozinhos e os ajudo a se sentirem parte do grupo.",
    4 => "Eu tenho a habilidade de reconhecer uma necessidade e resolver o problema, independente de ser mínima a tarefa.",
    5 => "Eu tenho a habilidade de organizar ideias, pessoas e projetos para alcançar um objetivo específico.",
    6 => "As pessoas normalmente me dizem que eu tenho bom senso espiritual.",
    7 => "Eu me sinto seguro em alcançar grandes coisas para a glória de Deus",
    8 => "Eu sinto prazer em dar dinheiro para aqueles que se encontram em sérias dificuldades financeiras.",
    9 => "Eu gosto de ministrar a pessoas em hospitais, prisões ou asilos para confortá-los.",
    10 => "Eu normalmente tenho ideias que oferecem soluções práticas para problemas difíceis.",
    11 => "Eu gosto de motivar e aconselhar aqueles que estão desanimados.",
    12 => "Eu tenho a habilidade de estudar uma passagem das Escrituras integralmente e depois partilhá-la com outros.",
    13 => "Atualmente eu sou responsável pelo crescimento espiritual de um ou mais jovens cristãos.",
    14 => "As pessoas me respeitam como autoridade em assuntos espirituais.",
    15 => "Eu tenho a habilidade de aprender línguas estrangeiras.",
    16 => "Deus normalmente revela a mim a direção para onde Ele deseja que o Corpo de Cristo avance.",
    17 => "Eu gosto de desenvolver relacionamentos com incrédulos na esperança de falar de Jesus a eles.",
    18 => "Sempre que ouço acerca de situações de necessidade, eu sinto que devo orar.",
    19 => "Eu gostaria de ajudar pastores ou outros líderes para que eles possam se concentrar em suas prioridades ministeriais.",
    20 => "Quando peço a outras pessoas que me ajudem num ministério importante para a igreja, elas normalmente dizem sim.",
    21 => "Eu gosto de entreter convidados e fazê-los se sentir 'em casa' quando nos visitam.",
    22 => "Eu tomo a iniciativa de servir e gosto de servir aos outros, sem importar o tamanho da tarefa.",
    23 => "Sou uma pessoa muito organizada que determina objetivos, faz planos e alcança as metas.",
    24 => "Eu sou bom em julgar caráter e consigo determinar uma falsidade espiritual.",
    25 => "Eu quase sempre me apresento e começo projetos que outras pessoas não querem tentar, e normalmente sou bem sucedido.",
    26 => "Eu dou dinheiro com alegria para a igreja, muito além do meu dízimo.",
    27 => "Eu sinto compaixão pelas pessoas que estão sofrendo ou em solidão, e gosto de passar um bom tempo com elas para alegrá-las.",
    28 => "Deus tem me capacitado a escolher corretamente entre várias opções complexas numa decisão importante, quando ninguém mais sabe o que fazer.",
    29 => "Eu me sinto muito satisfeito quando motivo os outros, especialmente se for a respeito de seu crescimento espiritual.",
    30 => "Eu gosto de estudar questões difíceis sobre a Palavra de Deus, e normalmente encontro as respostas rapidamente.",
    31 => "Eu gosto de estar envolvido na vida das pessoas, ajudando-as em seu crescimento espiritual.",
    32 => "Eu gostaria muito de começar uma igreja nova.",
    33 => "Eu consigo me adaptar facilmente a outras culturas, línguas e estilos de vida que não o meu, e gostaria de usar esta minha flexibilidade para ministrar em países estrangeiros.",
    34 => "Eu sempre falarei dos princípios cristãos com convicção, mesmo quando não for isso o que os outros querem ouvir.",
    35 => "Eu acho fácil convidar pessoas a aceitar Jesus como seu Salvador.",
    36 => "Eu sinto paixão por orar por assuntos importantes do reino de Deus e a Sua vontade para os cristãos.",
    37 => "Eu gosto de aliviar os outros de tarefas rotineiras para que eles possam conduzir projetos importantes.",
    38 => "Eu consigo guiar e motivar um grupo de pessoas a alcançar uma meta específica.",
    39 => "Eu gosto de conhecer pessoas novas e apresentá-las aos outros membros do grupo.",
    40 => "As pessoas podem depender de mim para terminar as coisas a tempo, e eu não preciso de muitos elogios ou agradecimentos.",
    41 => "Eu facilmente delego responsabilidades significativas a outras pessoas.",
    42 => "Eu consigo distinguir entre o certo e o errado em assuntos espirituais complexos quando outras pessoas não parecem ser capazes de distinguir.",
    43 => "Eu confio na fidelidade de Deus para um futuro brilhante mesmo quando em face de problemas significativos.",
    44 => "Eu não me importaria de rebaixar meu padrão de vida para contribuir mais com a igreja ou pessoas necessitadas.",
    45 => "Eu quero fazer tudo o que eu puder pelas pessoas necessitadas à minha volta, mesmo se eu tiver que abrir mão de alguma coisa.",
    46 => "As pessoas normalmente procuram o meu conselho quando não sabem o que fazer em uma determinada situação.",
    47 => "Eu sinto necessidade de desafiar os outros a melhorar, especialmente em seu crescimento espiritual, mas de forma consoladora e não condenadora.",
    48 => "Outras pessoas ouvem e gostam do meu ensino das Escrituras.",
    49 => "Eu me preocupo com a condição espiritual das pessoas, e faço o melhor que posso para guiá-las em direção a um estilo de vida íntegro.",
    50 => "Eu sou aceito como autoridade espiritual em outras partes do país ou do mundo",
    51 => "Eu gostaria de apresentar o Evangelho numa língua estrangeira, num país diferente do meu.",
    52 => "Eu sinto necessidade de compartilhar as mensagens bíblicas de Deus para que as pessoas saibam o que Deus espera delas.",
    53 => "Eu gosto de dizer aos outros como se tornar crentes e convidá-los a aceitar Jesus em suas vidas.",
    54 => "Muitas de minhas orações pelos outros já foram respondidas pelo Senhor",
    55 => "Eu gosto de ajudar os outros a fazerem suas tarefas e não preciso de muito reconhecimento público.",
    56 => "As pessoas respeitam a minha opinião e seguem a minha direção.",
    57 => "Eu gostaria de usar a minha casa para conhecer melhor os novos membros e visitantes da igreja.",
    58 => "Eu gosto de ajudar as pessoas em qualquer tipo de necessidade e sinto-me satisfeito em atender àquela necessidade.",
    59 => "Eu me sinto confortável ao tomar decisões importantes, mesmo sob pressão.",
    60 => "As pessoas vêm até mim para que eu as ajude a distinguir entre uma verdade e um erro espiritual.",
    61 => "Eu normalmente exercito a minha fé através da oração, e Deus responde às minhas orações de forma poderosa.",
    62 => "Quando eu dou dinheiro a alguém, eu não espero nada em troca, e eu normalmente dou anonimamente.",
    63 => "Quando eu ouço de pessoas desempregadas e que não têm como pagar suas contas, eu faço o possível para ajudá-las.",
    64 => "Deus me capacita a fazer uma aplicação apropriada da verdade bíblica em situações práticas.",
    65 => "As pessoas reagem bem ao meu encorajamento para se tornarem o melhor possível para Deus.",
    66 => "Eu sou sistemático na maneira como apresento lições bíblicas a um grupo de pessoas.",
    67 => "Eu ajudo os crentes que se encontram afastados do Senhor a encontrar o seu caminho de volta num relacionamento crescente com Ele e se envolver em uma igreja local.",
    68 => "Eu gostaria de compartilhar o Evangelho e formar novos grupos de crentes em áreas onde não existem muitas igrejas.",
    69 => "Eu não tenho preconceito racial e sinto uma apreciação sincera por pessoas diferentes de mim.",
    70 => "Eu acho relativamente fácil aplicar as promessas bíblicas para apresentar situações atuais, e sinto desejo de confrontar com amor, se necessário.",
    71 => "Eu sinto um desejo forte de ajudar os incrédulos a encontrar salvação em Jesus Cristo.",
    72 => "A oração é o meu ministério favorito na igreja e eu passo consistentemente muito tempo orando."
];

// Opções de resposta
$opcoes = [
    0 => "De jeito nenhum",
    1 => "Um pouco",
    2 => "Moderadamente",
    3 => "Consideravelmente",
    4 => "Fortemente"
];

function enviar_email($para, $nome, $resultado, $csv_path) {
    $assunto = "IBA ZS - Resultado do Teste de Dons Espirituais";
    $logo_url = 'https://'.
        $_SERVER['HTTP_HOST'] .
        dirname($_SERVER['REQUEST_URI']).
        '/assets/images/logo_atitude_zs.png';
    $mensagem = '<div style="font-family: Arial, sans-serif; background: #f8f9fa; padding: 24px; color: #222;">
        <div style="text-align:center; margin-bottom: 24px;">
            <img src="'.$logo_url.'" alt="Logo Igreja Atitude Zona Sul" style="max-width:160px; max-height:80px; margin-bottom: 10px;">
            <h2 style="margin:0; font-size:1.3rem; color:#198754;">IBA ZS - Resultado do Teste de Dons Espirituais</h2>
        </div>
        <p>Olá <b>'.htmlspecialchars($nome).'</b>,</p>
        <p>Segue o resultado do seu teste de dons espirituais:</p>
        <div style="background:#fff; border-radius:8px; padding:18px 20px; margin:18px 0; border:1px solid #eee;">
            <pre style="font-size:1rem; font-family:inherit; color:#333; margin:0; white-space:pre-line;">'.htmlspecialchars($resultado).'</pre>
        </div>
        <p style="font-size:0.98rem; color:#555;">Este teste foi realizado no site da Igreja Batista Atitude da Zona Sul.<br>Se não foi você, ignore este e-mail.</p>
    </div>';
    $headers = "From: IBA ZS - Site <site@igrejaatitudezonasul.com.br>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    mail($para, $assunto, $mensagem, $headers);
}

session_start();

// Número de perguntas por página
$por_pagina = 10;
$total_perguntas = 72;
$total_paginas = ceil($total_perguntas / $por_pagina);

// Página atual
$pagina = isset($_GET['pagina']) ? max(1, min($total_paginas, (int)$_GET['pagina'])) : 1;

// Validação de perguntas não respondidas
$erros_perguntas = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Salva respostas da etapa atual na sessão
    $inicio = 1 + ($pagina - 1) * $por_pagina;
    $fim = min($pagina * $por_pagina, $total_perguntas);
    for ($i = $inicio; $i <= $fim; $i++) {
        if (isset($_POST['q'.$i])) {
            $_SESSION['quiz_respostas'][$i] = (int)$_POST['q'.$i];
        } else {
            $erros_perguntas[$i] = true;
        }
    }
    // Se houver perguntas não respondidas nesta página, não avança
    if (count($erros_perguntas) > 0) {
        // Não faz nada, exibe erros abaixo das perguntas
    } else if ($pagina === $total_paginas) {
        // Sempre recupera nome/email da sessão salvos na PRIMEIRA página
        $nome = isset($_SESSION['quiz_nome']) ? trim($_SESSION['quiz_nome']) : '';
        $email = isset($_SESSION['quiz_email']) ? trim($_SESSION['quiz_email']) : '';
        // Validação extra de integridade
        if ($nome === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Limpa respostas para evitar lixo na sessão
            unset($_SESSION['quiz_respostas']);
            // Redireciona para identificação com mensagem de erro
            $_SESSION['quiz_erro_identificacao'] = 'Por favor, preencha nome e e-mail válidos antes de realizar o teste.';
            header('Location: etapa_nome_email.php');
            exit;
        }
        $respostas = $_SESSION['quiz_respostas'];
        // Soma por grupo
        $pontuacoes = array_fill(1, 18, 0);
        foreach ($respostas as $num => $valor) {
            $grupo = $mapa_perguntas[$num];
            $pontuacoes[$grupo] += $valor;
        }
        // Top 3 dons
        $pontuacoes_top = $pontuacoes;
        arsort($pontuacoes_top);
        $top3 = array_slice($pontuacoes_top, 0, 3, true);
        $resultado = [];
        $top3_array = [];
        foreach ($top3 as $grupo => $pontos) {
            $resultado[] = [
                'dom' => $grupos[$grupo][0],
                'descricao' => $grupos[$grupo][1],
                'pontuacao' => $pontos
            ];
            $top3_array[] = [$grupos[$grupo][0], $pontos];
        }
        // Salvar no banco de dados
        $db = getDb();
        $data_envio = date('Y-m-d H:i:s');
        $stmt = $db->prepare("INSERT INTO quiz_respostas (nome, email, data_envio, respostas, pontuacoes, top1, top1_pontos, top2, top2_pontos, top3, top3_pontos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $nome,
            $email,
            $data_envio,
            json_encode($respostas, JSON_UNESCAPED_UNICODE),
            json_encode($pontuacoes, JSON_UNESCAPED_UNICODE),
            $top3_array[0][0],
            $top3_array[0][1],
            $top3_array[1][0],
            $top3_array[1][1],
            $top3_array[2][0],
            $top3_array[2][1]
        ]);
        // Enviar e-mail (opcional)
        $mensagem_email = "Seus 3 principais dons:\n";
        foreach ($resultado as $r) {
            $mensagem_email .= "- {$r['dom']} ({$r['pontuacao']}): {$r['descricao']}\n";
        }
        enviar_email($email, $nome, $mensagem_email, '');
        // Redirecionar para página de resultado
        $_SESSION['quiz_result'] = [
            'nome' => $nome,
            'top3' => $resultado,
            'email' => $email
        ];
        unset($_SESSION['quiz_respostas'], $_SESSION['quiz_nome'], $_SESSION['quiz_email']);
        header('Location: resultado.php');
        exit;
    } else {
        // Avança para próxima página
        header('Location: quiz.php?pagina=' . ($pagina + 1));
        exit;
    }
}
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste de Dons Espirituais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/styles/quiz.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/templates/header.php'; ?>
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">Teste de Dons Espirituais</h2>
            <form method="post" action="quiz.php?pagina=<?= $pagina ?>">
                <div class="row">
                <?php
                $inicio = 1 + ($pagina - 1) * $por_pagina;
                $fim = min($pagina * $por_pagina, $total_perguntas);
                for ($i = $inicio; $i <= $fim; $i += 2): ?>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="pergunta">
                                <label class="form-label"><b><?= $i ?>.</b> <?= htmlspecialchars($perguntas[$i]) ?> <span class="required">*</span></label>
                                <div class="opcoes d-flex flex-column">
                                    <?php foreach ($opcoes as $valor => $texto): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q<?= $i ?>" id="q<?= $i ?>_<?= $valor ?>" value="<?= $valor ?>"
                                            <?php if (isset($_SESSION['quiz_respostas'][$i]) && $_SESSION['quiz_respostas'][$i] == $valor) echo 'checked'; ?>>
                                            <label class="form-check-label" for="q<?= $i ?>_<?= $valor ?>"> <?= preg_replace('/ \(\d\)/', '', $texto) ?> </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if (isset($erros_perguntas[$i])): ?>
                                    <div class="text-danger mt-1 small">Por favor, responda esta pergunta.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($i+1 <= $fim): ?>
                        <div class="col-md-6">
                            <div class="pergunta">
                                <label class="form-label"><b><?= $i+1 ?>.</b> <?= htmlspecialchars($perguntas[$i+1]) ?> <span class="required">*</span></label>
                                <div class="opcoes d-flex flex-column">
                                    <?php foreach ($opcoes as $valor => $texto): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q<?= $i+1 ?>" id="q<?= $i+1 ?>_<?= $valor ?>" value="<?= $valor ?>"
                                            <?php if (isset($_SESSION['quiz_respostas'][$i+1]) && $_SESSION['quiz_respostas'][$i+1] == $valor) echo 'checked'; ?>>
                                            <label class="form-check-label" for="q<?= $i+1 ?>_<?= $valor ?>"> <?= preg_replace('/ \(\d\)/', '', $texto) ?> </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if (isset($erros_perguntas[$i+1])): ?>
                                    <div class="text-danger mt-1 small">Por favor, responda esta pergunta.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <?php if ($pagina > 1): ?>
                        <a href="quiz.php?pagina=<?= $pagina - 1 ?>" class="btn btn-secondary">Voltar</a>
                    <?php else: ?>
                        <span></span>
                    <?php endif; ?>
                    <?php if ($pagina < $total_paginas): ?>
                        <button type="submit" class="btn btn-primary">Avançar</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-success">Enviar Respostas</button>
                    <?php endif; ?>
                </div>
                <?php if (count($erros_perguntas) > 0): ?>
                    <div class="mt-4">
                        <div class="alert alert-danger">
                            Por favor, responda todas as perguntas desta página antes de avançar.
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<script src="assets/scripts/quiz.js"></script>
</body>
</html>
