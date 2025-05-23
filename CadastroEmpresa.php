<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">

    <title>Cadastro Empresas</title>
</head>

<body class="bg-blue">
    <header class="bg-primary text-white py-3 mb -4">
        <div clas="container text-center">
 <figure class="text-center">
  <blockquote class="display-6">
    <p>Cadastro da Empresa</p>
  </blockquote>
</figure>
        </div>
    </header>
    
<main class = "container">
    <form action="dbEmpresa.php" method="post" class="row g3 mt-3">

    <div class="col-md-6"> 
            <label for="nome" class="form-label">Nome da Empresa</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>

        <div class="col-md-6"> 
            <label for="em" class="form-label">Email</label>
            <input type="text" name="em" id="em" class="form-control">
        </div>

        <div class="col-md-6"> 
            <label for="nomefant" class="form-label">Nome Fantasia</label>
            <input type="text" name="nomefant" id="nomefant" class="form-control">
        </div>

        <div class="col-md-6"> 
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" required 
            class="form-control">
        </div>

        <div class="col-md-6"> 
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" placeholder="+XX X XXX XXX-XXXX." required 
            class="form-control">
        </div>

        <div class="col-md-6"> 
            <label for="resp" class="form-label">Responsáveis</label>
            <input type="text" name="resp" id="resp" class="form-control">
        </div>

        <div class="col-md-12"> 
            <label for="resp" class="form-label">Atividade Econômica</label>
            <input type="text" name="atv_economica" id="atv_economica" class="form-control">
        </div>

        <div class="mb-3"> 
            <label for="resp" class="form-label">Rede Social</label>
            <input type="text" name="rede" id="rede" class="form-control">
        </div>


   <div class="mb-3">
  <label for="apresentacao" class="form-label">Apresentação da Empresa</label>
  <textarea class="form-control" name="apresentacao" id="apresentacao" rows="3"></textarea>
  </div>

        <div class="mb-3">
          <label for="hitorico" class="form-label">Histórico da Empresa</label>
          <textarea class="form-control" name="historico" id="historico" rows="3"></textarea>
        </div>

        <div class="mb-6 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Confirmar</label>
  </div>


  <button type="submit" name="button" 
  id="button" class="btn btn-outline-primary">Gravar</button> 
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>