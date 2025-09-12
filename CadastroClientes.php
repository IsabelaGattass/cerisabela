<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseSite.css">
    <title>Cadastro de Cliente</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php" ?>
    </header>
    <?php
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $estado = new Estado();

    if (filter_has_var(INPUT_POST, "btnEditar")):
        $idCliente = intval(filter_input(INPUT_POST, "id"));
        $eCliente = new Cliente();
        $edtCliente = $eCliente->search('id', $id);
    endif;
    ?>

    <main class = "container">
    <form action="dbCliente.php" method="post" class="row g3 mt-3">

        <div class="col-md-12">
              <label for="cliente" class="form-label"> nome</label>
              <input type="text" name="nome" id="nome" 
              placeholder="digite o seu nome " required 
              class="form-control"> value="<?php echo $edtCliente->nome ?? null; ?>">
        </div>

       <div class="col-md-4">
           <label for="cliente" class="form-label">CPF</label>
           <input type="text" name="cpf" id="cpf"
            placeholder="digite o seu cpf " required 
            class="form-control"> value="<?php echo $edtCliente->cpf ?? null; ?>">
      </div>

  <div class="col-md-8">
    <label for="cliente" class="form-label"> email</label>
    <input type="email"  name="email"  id="email"
     placeholder="digite o seu email " required 
     class="form-control">  value="<?php echo $edtCliente->email ?? null; ?>">
  </div>

  <div class="col-md-6">
    <label for="cliente" class="form-label">senha</label>
    <input type="password" name="senha"   id="senha"
     placeholder="digite a sua senha " required 
     class="form-control">  value="<?php echo $edtCliente->senha ?? null; ?>">
  </div>

  <div class="col-6">
    <label for="cliente" class="form-label"> telefone</label>
    <input type="text" name="telefone" id="telefone" placeholder="+XX X XXX XXX-XXXX."
    placeholder="digite a sua senha " required 
    class="form-control"> value="<?php echo $edtCliente->telefone ?? null; ?>">
  </div>

  <div class="col-6">
    <label for="cliente" class="form-label">cidade</label>
    <input type="text" name="cidade"  id="cidade"
     placeholder="digite a sua cidade " required 
     class="form-control"> value="<?php echo $edtCliente->cidade ?? null; ?>">
  </div>

  <div class="col-md-6">
    <label for="cliente" class="form-label">rua</label>
    <input type="text"  name="rua" id="rua"
    placeholder="digite a sua rua " required 
    class="form-control"> value="<?php echo $edtCliente->rua ?? null; ?>">

  </div>

  <div class="col-md-6">
    <label for="cliente" class="form-label">bairro </label>
    <input type="text" name="bairro" id="bairro"
    placeholder="digite o seu bairro " required 
    class="form-control"> value="<?php echo $edtCliente->bairro ?? null; ?>">
    
  </div>

  <div class="col-md-6">
    <label for="cliente" class="form-label"> número da casa </label>
    <input type="text" name="numero" id="numero"
    placeholder="digite o numero da sua casa" required 
    class="form-control"> value="<?php echo $edtCliente->numero ?? null; ?>">

  </div>

  
  <div class="col-md-6">
    <label for="cliente" class="form-label">Selecione o estado que você mora</label>
    <select id="estado" name="estado" class="form-select">
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
   <option value="" selected>Selecione o Estado</option>
   <?php
                    $cliente = $cliente->all();
                    $estadoSelecionado = $edtCliente->id ?? null;
                    foreach ($estado as $e):
                        ?>
                        <option value="<?php echo $e->id ?>" <?php if ($estadoSelecionado==$e->id) echo 'selected'; ?>><?php echo $e->nome ?></option>

                    <?php endforeach; ?>

                </select>
          </div>
 

  <div class="col-md-3">
    <label for="cliente" class="form-label"> CEP</label>
    <input type="text" name="cep" id="cep"
    placeholder="digite o seu cep" required 
    class="form-control"> value="<?php echo $edtCliente->cep ?? null; ?>">
  </div>

  <div class="col-md-3">
    <label for="cliente" class="form-label"> data de nascimento</label>
    <input type="date" name="DataNasc" id="DataNasc"
    placeholder="digite sua data de nascimento" required 
    class="form-control"> value="<?php echo $edtCliente->DataNasc ?? null; ?>">

  </div>

  <div class="col-12">
       <button type="submit" name="button" 
       id="button" class="btn btn-outline-primary">Cadastrar</button>  
  </div>
        </form>
    </main>

       <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>  
</html>