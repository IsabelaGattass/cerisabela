<?php
// Verifica se o botão "Gravar" foi enviado via POST
if (filter_has_var(INPUT_POST, "btnGravar")) {

    // Autoloader: carrega automaticamente as classes da pasta "classes/"
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    // Cria um novo objeto da classe Usuario
    $usuario = new Usuario();

    // Define os valores recebidos do formulário
    $usuario->setnome(filter_input(INPUT_POST, 'nome'));              // Nome do usuário
    $usuario->setcpf(filter_input(INPUT_POST, 'cpf'));                // CPF
    $usuario->setidFuncionario(filter_input(INPUT_POST, 'idFuncionario')); // ID do funcionário
    $usuario->setemail(filter_input(INPUT_POST, 'email'));            // E-mail
    $usuario->settelefone(filter_input(INPUT_POST, 'telefone'));      // Telefone
    
    // Captura a senha enviada no formulário
    $senha = filter_input(INPUT_POST, 'senha');
    // Criptografa a senha antes de salvar (mais seguro)
    $usuario->setsenha(password_hash($senha, PASSWORD_DEFAULT));

    // Define o tipo de funcionário (admin, comum, etc.)
    $usuario->settipoFuncionario(filter_input(INPUT_POST, 'tipoFuncionario'));

    // Tenta salvar o usuário no banco de dados
    if ($usuario->add()) {
        // Se der certo → exibe alerta e redireciona para CadastroUsuario.php
        echo "<script>
                window.alert('Usuário cadastrado com sucesso.');
                window.location.href='CadastroUsuario.php';
              </script>";
    } else {
        // Se der erro → exibe alerta e volta para a página anterior
        echo "<script>
                window.alert('Erro ao cadastrar usuário.');
                window.open(document.referrer,'_self');
              </script>";
    }
}
