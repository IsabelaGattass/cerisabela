<!DOCTYPE html>

<head lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="CSS/baseAdmin.css">
        <title>Tela de Login</title>

    </head>

    <!-- Layout da Tela de Login -->

<body class="bg-blue">
    <header class="bg-info.bg-gradient text-black py-3 mb -4">
        <div clas="container text-center">
            <figure class="text-center">
                <blockquote class="display-6">
                    <p>Tela de Login</p>
                </blockquote>
            </figure>
        </div>
        <header>

        </header>

        <main class="container">
            <form action="Validacao.php" method="POST">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>


                <div class="col-md-12">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                    Sua senha deve ter de 8 a 20 caracteres, conter letras e números e não deve conter espaços,
                    caracteres especiais ou emojis.
                </div>


                <div class="mb-12 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Confirmar</label>
                </div>


                <div class="col-3">
                    <button type="submit" name="btnGravar" class="btn btn-light">Efetuar Login</button>
                </div>

            </form>
        </main>

</body>

   <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>







</html>