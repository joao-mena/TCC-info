<?php
//Autenticação 
$dbhost   = "localhost";   #Nome do host
$db       = "seuBanco";   #Nome do banco de dados
$user     = "usuarioSQLServer"; #Nome do usuário
$password = "suaSenha";   #Senha do usuário

$conninfo = array("Database" => $db, "UID" => $user, "PWD" => $password);
$conn = sqlsrv_connect($dbhost, $conninfo);
?>
	