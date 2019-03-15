<?php
//Iniciar sessão (Obs: SESSION não funciona se não digitar as duas linhas abaixo).
ob_start();
session_start();

//Conexão
include_once("conexao/config.php"); //Incluir a conexão.

if(isset($_GET["login"]) && isset($_GET["senha"])){ // Se Login e Senha estiver preenchido
	$login = $_GET["login"]; //Envia o dado login do formulário para uma váriavel login
	$senha = $_GET["senha"]; //Envia o dado senha do formulário para uma váriavel senha
	
	//Mandar o texto da consulta para uma váriavel.
	$consulta = sprintf("seuBanco.dbo.logar '{$login}', '{$senha}'"); //Sintaxe sql com procedure (SELECT * FROM usuario WHERE login = '{$login}' AND senha = '{$senha};)
	//Executar a consulta
	$dados = sqlsrv_query($conn, $consulta); //Aqui que executara a váriavel com a sintaxe sql.
	if(!$dados) { echo "Erro ao recuperar informações !<br/>"; die(print_r(sqlsrv_errors(), true)); } //Se houver algum erro de sintaxe, exibira o erro e cancelara a exibição da página.
	else { //Se não, executa a consulta e seleciona o usuário respectivo ao login e senha informados
		
		if(sqlsrv_has_rows($dados)) {  //Se retornou linhas.
		
			$linha = sqlsrv_fetch_array( $dados, SQLSRV_FETCH_ASSOC ); // Cria um vetor com os dados.
			
			$_SESSION['id'] = $linha['id']; //envia o id para uma session
			
			$_SESSION['login'] = $linha['login']; //envia o login para uma session
			
			$_SESSION['senha'] = $linha['senha']; //envia a senha para uma session
			
			header("Location:paginausuario.php"); // Página que o usuário será enviado após logar.
		}
		else{ //Se não retornou, o login está incorreto
			echo "Login incorreto. <a href='index.php'>Clique para voltar a página principal.</a>"; //Exibe a mensagem que o login está incorreto.
		}
	}
}
?>
	