<?php
	include_once("includes/verificaruserlogado.php"); //Arquivo que verificara se o usuário está logado e abrira a session.
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Página usuário</title>
	
	<style>
		a{
			text-decoration: none; /* Tira a underline dos links */
			color: #000; /* Remove a cor azul (Pode trocar de acordo com a fonte utilizada em seu site) */
		}
		
		/* Esta parte é só para ajustar esta página */
		body, td{ text-align: center;}
	</style>
</head>
<body>
	<a href="?deslogar">Deslogar</a>
	</br>
	<a href="">Id: <?php echo $_SESSION['id']; ?></a>
	</br>
	<a href="">Login: <?php echo $_SESSION['login']; ?></a>
	</br>
	<a href="">Senha: <?php echo $_SESSION['senha']; ?></a>
</body>
</html>