<?php 

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$empresa = new Empresa();  

if (filter_has_var(INPUT_POST, "button")) {

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

    if ($empresa->add()) {
        echo "<script>alert('Cadastro adicionado com sucesso.'); window.location.href='empresas.php';</script>";
    } else {
        echo "<script>alert('Erro ao adicionar cadastro.'); window.history.back();</script>";
    }

} elseif (filter_has_var(INPUT_POST, "btnUpdate")) {

   
    $id_empresa = intval(filter_input(INPUT_POST, "id_empresa"));

    if ($empresa->update('id_empresa', $id_empresa)) {
        echo "<script>alert('Informações da empresa alteradas com sucesso.'); window.location.href='racas.php';</script>";
    } else {
        echo "<script>alert('Erro ao alterar as informações da empresa.'); window.history.back();</script>";
    }

} elseif (filter_has_var(INPUT_POST, "btnDeletar")) {

    $id_empresa = intval(filter_input(INPUT_POST, "id_empresa"));
    if ($empresa->delete("id_empresa", $id_empresa)) {
        header("Location: empresas.php");
        exit;
    } else {
        echo "<script>alert('Erro ao excluir as informações da empresa'); window.history.back();</script>";
    }

} else {
   
    echo "<script>alert('Nenhuma ação foi realizada.'); window.history.back();</script>";
}

  




 
 