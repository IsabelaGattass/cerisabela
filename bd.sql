create database cerisabelaa;
use cerisabelaa;

create table empresa(
id_empresa int primary key NOT NULL AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
cnpj varchar (14) not null,
nome_fant varchar (50) not null,
telefone VARCHAR(20) NULL DEFAULT NULL,
email VARCHAR(100) NULL DEFAULT NULL,
responsaveis VARCHAR (255) not null,
atv_economica VARCHAR (255) not null,
rede_social VARCHAR (255) not null,
apresentacao text not null,
historico text not null
);

create table produto(
idProduto int auto_increment primary key,
nome varchar (255) not null,
descricao text not null,
preco decimal (10,2)not null,
unidade varchar (500) not null
);

create table cliente(
cpf_cliente varchar (14) primary key not null,
nomeCliente varchar (200) not null,
email varchar (150) not null,
telefone varchar (14) not null,
senha varchar (50) not null,
endereco varchar (150),
dataNasc date not null,
numero int not null,
cidade varchar (100) not null,
bairro varchar(100) not null,
estado varchar (150) not null,
cep varchar (10) not null
);

create table usuario(
idFuncionario int(11)  auto_increment primary key,
nome varchar(200) not null,
cpf varchar(14) not null,
email varchar(30) not null,
telefone varchar(14) not null,
senha varchar(200) not null,
tipoFuncionario enum('Administrador','ClienteComum','Gerente','Funcionário','Supervisor')
);

 create table ft_produto(
  idFoto int(11) NOT NULL AUTO_INCREMENT,
  fk_produto int(11) NOT NULL,
  nome varchar(255) NOT NULL,
  legenda varchar(255) DEFAULT NULL,
  texto varchar(255) DEFAULT NULL,
  dataUpload TIMESTAMP DEFAULT current_timestamp(),
  PRIMARY KEY (idFoto),
  KEY id_produto (fk_produto),
  FOREIGN KEY (fk_produto) REFERENCES produto (idProduto) ON DELETE CASCADE ON UPDATE CASCADE
) ;

select * from usuario;