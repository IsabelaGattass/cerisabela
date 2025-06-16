<?php 

$senha = "Erica123";

$senha_cripto = password_hash($senha, PASSWORD_DEFAULT);
print_r($senha_cripto);

echo "<hr />"; 


if (password_verify("Erica123", $senha_cripto)) {
    echo "Sucesso";
}else{
    echo "Erro";
}
header("Content-Type: text/html; charset=UTF-8");


?>