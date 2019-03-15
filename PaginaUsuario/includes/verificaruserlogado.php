<?php
ob_start(); //Não sei direito o que é, mas tbm precisa para SESSION
session_start(); //Iniciar session

if(isset($_SESSION['id'])) {//Se o usuário não estiver logado.
	if(isset($_GET['deslogar'])){ //Quando o usuário clicar no botão de deslogar.
		unset($_SESSION['id']); //Desfazer da SESSION id
		unset($_SESSION['login']); //Desfazer da SESSION login
		unset($_SESSION['senha']); //Desfazer da SESSION senha
		session_destroy(); //Destruir tds as SESSIONS
		header("Location:index.php"); //Voltar para a página principal
	}
}
else{ //Se não, se o usuário estiver logado
	include_once("facalogin.php");die;
}
?>