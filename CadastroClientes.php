<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Cadastro Cliente</title>
</head>
<body>
    <main class = "container">
        <form action="dbCliente.php" method="post" class="row g3 mt-3">

        <div class="col-md-6">
    <label for="Nome" class="form-label">Digite seu nome</label>
    <input type="text" class="form-control" id="Nome">
  </div>

    <div class="col-md-6">
    <label for="CPF" class="form-label">Digite seu CPF</label>
    <input type="text" class="form-control" id="CPF">
  </div>

  <div class="col-md-6">
    <label for="Email" class="form-label">Digite seu email</label>
    <input type="email" class="form-control" id="Email">
  </div>

  <div class="col-md-6">
    <label for="Senha" class="form-label">Digite sua senha</label>
    <input type="password" class="form-control" id="Senha">
  </div>

  <div class="col-6">
    <label for="Telefone" class="form-label">Digite seu telefone</label>
    <input type="text" class="form-control" id="Telefone" placeholder="+XX X XXX XXX-XXXX.">
  </div>

  <div class="col-6">
    <label for="Cidade" class="form-label">Digite sua cidade</label>
    <input type="text" class="form-control" id="Cidade">
  </div>

  <div class="col-md-6">
    <label for="Rua" class="form-label">Digite o nome da rua que você mora</label>
    <input type="text" class="form-control" id="Rua">
  </div>

  <div class="col-md-6">
    <label for="Bairro" class="form-label">Digite o nome do bairro que você mora</label>
    <input type="text" class="form-control" id="Bairro">
  </div>

  <div class="col-md-6">
    <label for="Numero" class="form-label">Digite o número da casa que você mora</label>
    <input type="text" class="form-control" id="Numero">
  </div>

  
  <div class="col-md-4">
    <label for="Estado" class="form-label">Selecione o estado que você mora</label>
    <select id="Estado" class="form-select">
      <option selected>Escolha...</option>
      <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
    <option value="EX">Estrangeiro</option>
    </select>
  </div>
 

  <div class="col-md-2">
    <label for="CEP" class="form-label">Digite seu CEP</label>
    <input type="text" class="form-control" id="CEP">
  </div>

  <div class="col-md-2">
    <label for="DataNasc" class="form-label">Selecione sua data e nascimento</label>
    <input type="date" class="form-control" id="DataNasc">
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Minhas informações estão corretas
      </label>
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="btnGravar">Cadastrar</button>
  </div>
        </form>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>  
</html>