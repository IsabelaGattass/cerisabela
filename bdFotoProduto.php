<?php
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

try {
    $foto = new FotoProduto();
    $imgFile = new Imagem(prefixo: "produt_");
} catch (Throwable $th) {
    die("Erro ao carregar classes: " . $th->getMessage());
}

if (filter_has_var(INPUT_POST, "btnGravar")):

    $foto->iniciarTransacao();

    try {
        // Inicializa variáveis
        $idFoto = filter_input(INPUT_POST, 'idFoto', FILTER_SANITIZE_NUMBER_INT) ?? null;
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_NUMBER_INT) ?? null;
        $fotoAntiga = filter_input(INPUT_POST, 'fotoAntiga', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
        $nomeFoto = null;

        // Define produto relacionado
        if ($idProduto) {
            $foto->setProduto($idProduto);
        }

        // Upload da foto
        if (!empty($_FILES['foto']['name'])) {
            $nomeFoto = $imgFile->upload($_FILES['foto']);
            $foto->setFoto($nomeFoto);

            // Apaga foto antiga, se existir
            if (!empty($fotoAntiga)) {
                $imgFile->deletar($fotoAntiga);
            }
        } else {
            $foto->setFoto($fotoAntiga);
        }

        // Demais informações
        $foto->setLegenda(filter_input(INPUT_POST, 'legenda', FILTER_SANITIZE_SPECIAL_CHARS));
        $foto->setAlternativo(filter_input(INPUT_POST, 'textoAlt', FILTER_SANITIZE_SPECIAL_CHARS));

        // Se for novo cadastro
        if (empty($idFoto)) {
            $sucesso = $foto->add();
            $mensagem = $sucesso ? "Foto adicionada com sucesso!" : "Erro ao adicionar foto!";
        } else {
            $sucesso = $foto->update('id_foto', $idFoto);
            $mensagem = $sucesso ? "Foto atualizada com sucesso!" : "Erro ao atualizar foto!";
        }

        $foto->confirmarTransacao();
        echo "<script>window.alert('$mensagem');window.location.href='FotoProduto.php?idProduto=$idProduto'</script>";

    } catch (Throwable $th) {
        // Em caso de erro, apaga possível upload
        if (!empty($nomeFoto)) $imgFile->deletar($nomeFoto);

        $foto->cancelarTransacao();
        $erro = addslashes($th->getMessage());
        echo "<script>window.alert('Erro: $erro'); window.open(document.referrer, '_self');</script>";
    }

elseif (filter_has_var(INPUT_POST, "btnDeletar")):

    try {
        $foto->iniciarTransacao();
        $idFoto = intval(filter_input(INPUT_POST, "idFoto"));
        $ftDel = $foto->search('id_foto', $idFoto);

        if ($ftDel) {
            // Apaga a foto do servidor
            if (!empty($ftDel->foto)) $imgFile->deletar($ftDel->foto);

            if ($foto->delete('id_foto', $idFoto)) {
                header("location:FotoProduto.php?idProduto={$ftDel->fk_produto}");
                exit;
            }
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
