<?php 

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$inicial = new Inicial();  

if (filter_has_var(INPUT_POST, "btnGravar")) {

    $inicial->setTitulo(filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_ADD_SLASHES));
    $inicial->setInfo(filter_input(INPUT_POST, "info", FILTER_SANITIZE_ADD_SLASHES));
    $inicial->setLogo(filter_input(INPUT_POST, "logo", FILTER_SANITIZE_ADD_SLASHES));
    $inicial->setCores(filter_input(INPUT_POST, "cores", FILTER_SANITIZE_ADD_SLASHES));
    $inicial->setBanners(filter_input(INPUT_POST, "banners", FILTER_SANITIZE_ADD_SLASHES));

       if ($inicial->add()) {
        echo "<script>alert('Informações cadastradas com sucesso.'); window.location.href='iniciais.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar informações.'); window.history.back();</script>";
    }

    // botao Editar

    } elseif (filter_has_var(INPUT_POST, "btnUpdate")) {

   
    $id_inicial = intval(filter_input(INPUT_POST, "id_inicial"));

    if ($inicial->update('id_inicial', $id_empresa)) {
        echo "<script>alert('Informações da empresa alteradas com sucesso.'); window.location.href='racas.php';</script>";
    } else {
        echo "<script>alert('Erro ao alterar as informações da empresa.'); window.history.back();</script>";
    }

    // botao Excluir


}

