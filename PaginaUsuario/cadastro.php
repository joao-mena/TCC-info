<?php
//Conexão
include_once("conexao/config.php");

if(isset($_GET["login"]) && isset($_GET["senha"])){
	$login = $_GET["login"];
	$senha = $_GET["senha"];
	
	//Mandar o texto da consulta para uma váriavel.
	$consulta = sprintf("seuBanco.dbo.cadastrar '{$login}', '{$senha}'"); //Sql com a consulta (INSERT INTO(login, senha) VALUES('{$login}', '{$senha}');)
	//Executar a consulta
	$dados = sqlsrv_query($conn, $consulta); //Executa a váriavel da consulta
	if(!$dados) { echo "Erro ao recuperar informações !<br/>"; die(print_r(sqlsrv_errors(), true)); } //Se houver algum erro de sintaxe.
	else{ echo "Usuário cadastrado com sucesso. <a href='index.php'>Ir para página principal</a>"; } //Se não, cadastra o usuário.
}
?>