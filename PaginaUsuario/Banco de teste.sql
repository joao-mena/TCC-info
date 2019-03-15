CREATE DATABASE seuBanco;
GO

USE seuBanco;
GO

CREATE TABLE usuario(
	id int primary key identity,
	login varchar(100),
	senha varchar(100)
);
GO

CREATE PROCEDURE logar
@login varchar(80),
@senha varchar(40)
AS
BEGIN
	SELECT * FROM usuario WHERE login=@login AND senha=@senha
END
GO

CREATE PROCEDURE cadastrar
@login varchar(80),
@senha varchar(40)
AS
BEGIN
	INSERT INTO usuario (login, senha) 
			VALUES (@login, @senha)
END
GO

CREATE PROCEDURE consultar
AS
BEGIN
	SELECT * FROM usuario
END
GO