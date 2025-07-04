<?php 

if(filter_has_var(INPUT_POST, "button")) {
    spl_autoload_register(function ($class) {
     require_once "Classes/{$class}.class.php";
     
    });
 
    //criando uma instância da classe Empresa
    $empresa = new Empresa();
    $empresa->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setCnpj(filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setNomeFantasia(filter_input(INPUT_POST, "nomefant", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setTelefone(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setEmail(filter_input(INPUT_POST, "em", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setReponaveis(filter_input(INPUT_POST, "resp", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setAtvEconomica(filter_input(INPUT_POST, "atv_economica", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setRedeSocial(filter_input(INPUT_POST, "rede", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setApresentacao(filter_input(INPUT_POST, "apresentacao", FILTER_SANITIZE_ADD_SLASHES));
    $empresa->setHistorico(filter_input(INPUT_POST, "historico", FILTER_SANITIZE_ADD_SLASHES));
 
    //Tenta adicionar e exibe a mensagem ao usuario
 
    if($empresa-> add()) {
     echo "<script>window.alert('Cadastro adicionado com sucesso.'); windows.location.href='empresas.php';</script>";
    } else { 
     echo "<script>window.alert('Erro ao adicionar cadastro.'); window.open (document.referrer,'_self'); <script>" ;
     
 }

}

  




 
 