# Quiz de Dons Espirituais

Sistema web em PHP + Bootstrap para aplicação de teste de dons espirituais, com fluxo de identificação, quiz paginado, validação, salvamento em MySQL, envio de resultado por e-mail, CRUD, exportação, layout responsivo e centralização de configurações sensíveis em `.env`.

## Funcionalidades
- Identificação do usuário (nome e e-mail) com validação
- Quiz paginado (10 perguntas por página, 72 no total)
- Validação customizada das respostas
- Cálculo automático dos dons espirituais (top 3)
- Salvamento dos dados no MySQL (nome, e-mail, respostas, pontuações, top 3 dons)
- Envio do resultado por e-mail ao usuário (template HTML, logo, nome de origem customizado)
- Página de resultado moderna, com botões de imprimir e salvar PDF
- Listagem de registros com DataTables, exportação (copiar, PDF, imprimir, Excel)
- CRUD completo: detalhes, editar, excluir
- Layout responsivo, cabeçalho fixo com logo e título
- Centralização de configurações sensíveis em `.env`
- CSS e JS externos organizados por página

## Estrutura de Pastas
```
quiz-bootstrap/
├── assets/
│   ├── images/
│   ├── scripts/
│   └── styles/
├── config/
│   └── config.php
├── templates/
│   └── header.php
├── detalhes.php
├── editar.php
├── etapa_nome_email.php
├── excluir.php
├── index.php
├── listagem.php
├── quiz.php
├── resultado.php
├── .env.bkp
└── README.md
```

## Instalação
1. **Clone o repositório:**
   ```
   git clone https://github.com/claudemirslopes/quiz-bootstrap-v7.git
   ```
2. **Crie o banco de dados:**
   - Importe o arquivo `quiz_dons.sql` (não incluso no repositório, solicite ao responsável ou utilize o modelo em `.env.bkp`).
3. **Configure o ambiente:**
   - Renomeie `.env.bkp` para `.env` e preencha com seus dados de conexão e e-mail:
     ```
     DB_HOST=localhost
     DB_NAME=seubanco
     DB_USER=usuario
     DB_PASS=senha
     DB_CHARSET=utf8mb4
     MAIL_FROM=seu@email.com
     MAIL_FROM_NAME=Seu Nome
     ```
4. **Ajuste permissões se necessário**
5. **Acesse via navegador:**
   - Exemplo: `http://localhost/quiz-bootstrap/index.php`

## Variáveis de Ambiente (`.env`)
- **DB_HOST**: Host do banco de dados
- **DB_NAME**: Nome do banco de dados
- **DB_USER**: Usuário do banco
- **DB_PASS**: Senha do banco
- **DB_CHARSET**: Charset (ex: utf8mb4)
- **MAIL_FROM**: E-mail de origem para envio dos resultados
- **MAIL_FROM_NAME**: Nome de exibição do remetente

> **Nunca envie o arquivo `.env` para o repositório. Use apenas `.env.bkp` como modelo.**

## Exportação e Backup
- Os dados podem ser exportados via DataTables (Excel, PDF, imprimir, copiar)
- O arquivo `.sql` do banco não é enviado ao repositório por segurança

## Segurança
- Todas as configurações sensíveis estão centralizadas no `.env`
- Validação reforçada para impedir registros sem nome/e-mail
- Recomenda-se utilizar HTTPS em produção

## Customização
- Para personalizar logo, título ou outros textos, edite o arquivo `templates/header.php` ou adicione variáveis ao `.env` conforme desejado

## Licença
Projeto de uso livre para fins ministeriais e educacionais. Para uso comercial, consulte o autor.

## Autor
Projeto criado por Claudemir da Silva Lopes para uso na Igreja Batista Atitude da Zona Sul do Rio de Janeiro.

---

**Dúvidas ou sugestões? Abra uma issue ou entre em contato!**
