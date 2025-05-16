<?php 

if(filter_has_var(INPUT_POST, "bntGravar")) {
    spl_autoload_register(function ($class) {
     require_once "Classes/{$class}.class.php";
     
    });
 
    //criando uma instância da classe Raça 
    $empresa = new Empresa();
    $empresa->setNome(filter_input(INPUT_POST, "empresa", FILTER_SANITIZE_ADD_SLASHES));
 
    //Tenta adicionar e exibe a mensagem ao usuario
 
    if($nome-> add()) {
     echo "<script>window.alert('Nome adicionada com sucesso.'); windows.location.href=racas.php;</script>";
    } else { 
     echo "<script>window.alert('Erro ao adicionar Nome'); window.open (document.referrer,'_self'); <script>" ;
     
 }
 }
 