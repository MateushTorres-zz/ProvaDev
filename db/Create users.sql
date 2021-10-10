create table users(
id int not null auto_increment primary key,
nome Varchar (255),
email varchar (150), 
cpf varchar(30),
dtnascimento date,
Endereco Varchar(255),
Telefone varchar(30),
Senha varchar(32),
Certificado varchar(255)
) engine InnoDB;