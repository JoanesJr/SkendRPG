Adicionar informações importantes, principalmente sobre o banco de dados aqui.

************************RODAR O SERVIDOR IMBUTIDO************************
Acesse a pasta pública deste projeto pelo CMD e rode o seguinte comando sem as aspas:
    "php -S localhost:8000"
após isso basta digitar o endereço "localhost:8000" no navegador.
*****************************************************************

<!------------------- COMANDOS SQL PARA CRIAÇÃO DO BANCO DE DADOS E TABELAS-------------------> *OBS: ir adicionando de acordo formos cirando mais.
{
    CREATE DATABASE skendRPG;

    USE skendRPG;

    CREATE TABLE Usuario (
        id int PRIMARY KEY AUTO_INCREMENT not null,
        nome varchar(50) not null,
        senha char(32) not null,
        email varchar(50) not null,
        imagem varchar(50) not null default 'anonymus.png'
);


    CREATE TABLE Personagem (
        id int PRIMARY KEY AUTO_INCREMENT NOT null,
        id_usuario int not null,
        foreign key(id_usuario) references Usuario(id), 
        nome varchar(25) not null,
        vida int(4) not null default 0,
        energia int(4) not null default 0,
        ca int(2) not null default 10,
        nivel int(2) not null default 1,
        experiencia int(6) not null default 0,
        nome_atributo_1 varchar(25) DEFAULT "Força",
        nome_atributo_2 varchar(25) DEFAULT "Destreza",
        nome_atributo_3 varchar(25) DEFAULT "Constituição" ,
        nome_atributo_4 varchar(25) DEFAULT "Inteligência",
        nome_atributo_5 varchar(25) DEFAULT "Sabedoria",
        nome_atributo_6 varchar(25) DEFAULT "Carisma",
        valor_atributo_1 int(2) not null,
        valor_atributo_2 int(2) not null,
        valor_atributo_3 int(2) not null,
        valor_atributo_4 int(2) not null,
        valor_atributo_5 int(2) not null,
        valor_atributo_6 int(2) not null,
        valor_recurso_1 int(7) not null DEFAULT 0,
        valor_recurso_2 int(7) not null DEFAULT 0,
        valor_recurso_3 int(7) not null DEFAULT 0,
        valor_recurso_4 int(7) not null DEFAULT 0,
        nome_recurso_1 varchar(25),
        nome_recurso_2 varchar(25),
        nome_recurso_3 varchar(25),
        nome_recurso_4 varchar(25),
        classe varchar(25),
        historia varchar(555),
        idade int(3) not null DEFAULT 18,
        cabelo varchar(30) not null DEFAULT "Preto",
        altura varchar(5) not null default "1.76",
        detalhes varchar(50),
        personalidade varchar(555),
        imagem varchar(50) DEFAULT "anonymus.png"
    );

  CREATE TABLE habilidade (
        id int not null primary key AUTO_INCREMENT,
        id_usuario int not null,
        foreign key(id_usuario) references Usuario(id),
        nome varchar(25) not null,
        descricao varchar(255) not null,
        efeito varchar (150) not null,
        dano varchar(25) not null,
        custo int(3) not null

    );
}