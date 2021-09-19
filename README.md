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
}