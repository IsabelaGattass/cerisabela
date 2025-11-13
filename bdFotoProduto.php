<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

$foto = new FotoProduto();
$imgFile = new Imagem(prefixo: "produt_");

if (filter_has_var(INPUT_POST, "btnGravar")):
    $foto->iniciarTransacao();

    try {
        $idFoto = filter_input(INPUT_POST, 'idFoto');
        $idProduto = filter_input(INPUT_POST, 'idProduto');

        $fotoAntigaFrente = filter_input(INPUT_POST, 'fotoAntigaFrente');
        $fotoAntigaVerso = filter_input(INPUT_POST, 'fotoAntigaVerso');

        $foto->setProduto($idProduto);

        // Se novas imagens forem enviadas, faz upload e apaga as antigas
        if (!empty($_FILES['fotoFrente']['name'])) {
            $nomeFrente = $imgFile->upload($_FILES['fotoFrente']);
            $foto->setFrente($nomeFrente);
            if (!empty($fotoAntigaFrente)) {
                $imgFile->deletar($fotoAntigaFrente);
            }
        } else {
            $foto->setFrente($fotoAntigaFrente);
        }

        if (!empty($_FILES['fotoVerso']['name'])) {
            $nomeVerso = $imgFile->upload($_FILES['fotoVerso']);
            $foto->setVerso($nomeVerso);
            if (!empty($fotoAntigaVerso)) {
                $imgFile->deletar($fotoAntigaVerso);
            }
        } else {
            $foto->setVerso($fotoAntigaVerso);
        }

        $foto->setLegenda(filter_input(INPUT_POST, 'legenda'));
        $foto->setAlternativo(filter_input(INPUT_POST, 'textoAlt'));

        // Se for novo cadastro
        if (empty($idFoto)):
            if ($foto->add()) {
                $mensagem = "Fotos adicionadas com sucesso!";
            } else {
                $mensagem = "Erro ao adicionar fotos!";
            }

            // Se for edição
        else:
            if ($foto->update('id_foto', $idFoto)) {
                $mensagem = "Fotos atualizadas com sucesso!";
            } else {
                $mensagem = "Erro ao atualizar fotos!";
            }
        endif;

        echo "<script>window.alert('$mensagem');window.location.href='FotoProduto.php?idProduto=$idProduto'</script>";
        $foto->confirmarTransacao();

    } catch (Throwable $th) {
        if (!empty($nomeFrente))
            $imgFile->deletar($nomeFrente);
        if (!empty($nomeVerso))
            $imgFile->deletar($nomeVerso);

        $foto->cancelarTransacao();
        $erro = addslashes($th->getMessage());
        echo "<script>window.alert('Erro: $erro'); window.open(document.referrer, '_self');</script>";
    }

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    try {
        $foto->iniciarTransacao();
        $idFoto = intval(filter_input(INPUT_POST, "idFoto"));
        $ftDel = $foto->search('id_foto', $idFoto);

        // Deleta os dois arquivos do servidor
        $imgFile->deletar($ftDel->frente);
        $imgFile->deletar($ftDel->verso);

        if ($foto->delete('id_foto', $idFoto)) {
            header("location:FotoProduto.php?idProduto=$ftDel->fk_produto");
        }
        $foto->confirmarTransacao();
    } catch (Throwable $th) {
        $foto->cancelarTransacao();
        $erro = addslashes($th->getMessage());
        echo "<script>
            window.alert('Erro: $erro');
            window.open(document.referrer, '_self');
        </script>";
    }
endif;
?>