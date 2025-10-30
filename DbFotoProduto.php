<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

// Criando uma instância da classe Raca
$foto = new FotoProduto();
$imgFile = new Imagem(prefixo: "anim_");
if (filter_has_var(INPUT_POST, "btnGravar")):
    $foto->iniciarTransacao();
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
        $foto->setTexto(filter_input(INPUT_POST, 'textoAlt'));
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
        echo "<script>window.alert('$mensagem'); window.location.href='fotoProduto.php?idProuto=$idProduto';</script>";
        $foto->confirmarTransacao();
    } catch (\Throwable $th) {
        $imgFile->deletar($nomeArquivo);
        $foto->cancelarTransacao();
        $erro = $th->getMessage();
        echo "<script>window.alert('Erro: $erro.'); window.open(document.referrer, '_self');</script>";
    }

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    try {
        $foto->iniciarTransacao();
        $idFoto = intval(filter_input(INPUT_POST, 'idFoto'));
        $ftDel = $foto->search('id_foto', $idFoto);
        $imgFile->deletar($ftDel->nome);
        if ($foto->delete('id_foto', $idFoto)) {
            header("location:fotoProduto.php?idProuto=$ftDel->fk_animal");
        }
        $foto->confirmarTransacao();
    } catch (\Throwable $th) {
        $foto->cancelarTransacao();
        $erro = $th->getMessage();
        echo "<script>
                window.alert('Erro: ".addslashes($erro)."');
                window.open(document.referrer,'_self');
              </script>";
    }

endif;