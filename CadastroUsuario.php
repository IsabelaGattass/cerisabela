<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Define o tipo de documento como HTML5 -->
    <meta charset="UTF-8"> <!-- Define o padrão de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Faz o site ser responsivo -->

    <!-- Importa o CSS do Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Importa o CSS personalizado -->
    <link rel="stylesheet" href="CSS/baseAdmin.css">

    <!-- Define o título da página -->
    <title>Cadastro Usuário</title>
</head>

<body class="bg-light"> <!-- Aplica fundo claro -->

    <!-- Cabeçalho da página -->
    <header class="bg-primary text-white py-3 mb-4">
        <div class="container text-center">
            <h1 class="h3">Cadastro de Usuário</h1>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main class="container">
        
        <!-- Alerta oculto que será exibido em caso de erro -->
        <div id="alertaErro" class="alert alert-danger d-none" role="alert">
            ⚠️ Preencha todos os campos obrigatórios antes de enviar!
        </div>

        <!-- Formulário de cadastro -->
        <form id="formCadastro" method="post" action="dbUsuario.php" class="row g-3 mt-3">

            <!-- Campo Nome -->
            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o seu nome:" required class="form-control">
            </div>

            <!-- Campo Email -->
            <div class="col-12">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="Digite o seu Email:" required class="form-control">
            </div>
            
            <!-- Campo Telefone-->
            <div class="col-12">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o seu CPF:" required class="form-control"
                   pattern="[0-9]+" maxlength="11">
            </div>

            <!-- Campo Telefone -->
            <div class="col-12">
                <label for="telefone" class="form-label">TELEFONE</label>
                <input type="text" name="telefone" id="telefone" placeholder="+XX X XXX XXX-XXXX"   pattern="[0-9]+" maxlength="15" required class="form-control">
            </div>

            <!-- Campo Senha -->
            <div class="col-md-12">
                <label for="senha" class="form-label">SENHA</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a sua senha:" required class="form-control">
            </div>

            <!-- Campo Seleção de Papel -->
            <div class="col-12">
                <label for="tipoFuncionario" class="form-label">SELECIONE SEU PAPEL</label>
                <select class="form-select" aria-label="Escolha seu papel:" name="tipoFuncionario" id="tipoFuncionario" required>
                    <option value="" selected>Selecione seu papel</option>
                    <option value="1">Administrador</option>
                    <option value="2">Gerente</option>
                    <option value="3">Funcionário</option>
                    <option value="4">Cliente Comum</option>
                    <option value="5">Supervisor</option>
                </select>
            </div>

            <!-- Checkbox de confirmação -->
            <div class="col-12">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkInfo" required>
                    <label class="form-check-label" for="checkInfo">Confirme suas informações</label>
                </div>
            </div>

            <!-- Botão de envio -->
            <div class="col-12">
                <button type="submit" name="btnGravar" id="button" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </main>

    <!-- Rodapé -->
    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <!-- Importa o JS do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de Validação -->
    <script>
        // Pega o formulário pelo ID
        const form = document.getElementById('formCadastro');

        // Pega a div do alerta pelo ID
        const alerta = document.getElementById('alertaErro');

        // Evento quando o usuário tenta enviar o formulário
        form.addEventListener('submit', function (e) {
            // Se o formulário não for válido (campos obrigatórios vazios)
            if (!form.checkValidity()) {
                e.preventDefault(); // Impede o envio
                alerta.classList.remove('d-none'); // Mostra o alerta
                alerta.scrollIntoView({ behavior: 'smooth' }); // Rola a tela até o alerta
            } else {
                alerta.classList.add('d-none'); // Esconde o alerta se válido
            }
        });
 

 
    </script>

</body>
</html>