<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});


$foto = new FotoProduto();
$imgFile = new Imagem(prefixo: "prod_");
if (filter_has_var(INPUT_POST, "btnGravar")):
   
    try {
        $idFoto = filter_input(INPUT_POST, 'idFoto');
        $idProduto = filter_input(INPUT_POST, 'idProduto');
        $fotoAntiga = filter_input(INPUT_POST, 'fotoAntiga');
        $foto->setProduto($idProduto);
        $foto->setNome($fotoAntiga);
        if (!empty($_FILES['foto']['name'])) {
            $nomeArquivo = $imgFile->upload($_FILES['foto']);
            $foto->setNome($nomeArquivo);
            if (!empty($fotoAntiga)) {
                $imgFile->deletar($fotoAntiga);
            }
        }
        $foto->setTexto(filter_input(INPUT_POST, 'texto'));
        $foto->setLegenda(filter_input(INPUT_POST, 'legenda'));

        if (empty($idFoto)):
            if ($foto->add()) {
                $mensagem = 'Foto adicionada com sucesso.';
            } else {
                $mensagem = 'Erro ao adicionar foto';
            }
        else:
            if ($foto->update('id_foto', $idFoto)) {
                $mensagem = 'Foto atualizada com sucesso.';
            }
        endif;
        echo "<script>window.alert('$mensagem'); window.location.href='fotoProduto.php?idProduto=$idProduto';</script>";
       
    }

endif;