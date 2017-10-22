CREATE DATABASE CROSSKNOWLEDGE;

USE CROSSKNOWLEDGE;

DROP TABLE IF EXISTS pessoas;

CREATE TABLE pessoas (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  nome varchar(255) NOT NULL ,
  sobrenome varchar(255) NOT NULL ,
  endereco varchar(255) NOT NULL ,
  PRIMARY KEY  (id)
);

INSERT INTO pessoas (nome, sobrenome, endereco) VALUES ('Esther', 'Camilo','Rua Pororoca do Norte, 150 - Agudos');

