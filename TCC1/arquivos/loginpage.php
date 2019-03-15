<?php
	include("conexao_sis.php");
?>	

<form method="POST"><!-- Sem o action ele envia os parametros POST e GET dentro da mesma página -->
	
	<center>
	
	<div class="form-group">
		
		<br />
		
		<label>
			
			CPF:
			
		</label>
			
		<br />
			
		<input type="text" name="Nome" class="form-control" placeholder="Digite seu CPF">
			
		<br />
			

		<br />	
		  
			<label>
			
				Senha:
				
			</label>
		
			<br />
			
			<input type="password" name="passw" class="form-control" placeholder="Digite sua senha">
	
			<br />
	
			<br />
			
			<div class="form-group">
			
				<input type="submit" name="insert" value="ENTRAR">
			
			<br/>
			<br/>
			
			<a href="index.php?valor=3" style="font-size: 20">
			
				Cadastro

			</a>
		
			<br/>
			<br/>
			
		</div>
		
	</center>	
		
</form>

<?php
if(isset($_POST["Nome"]) && isset($_POST["passw"])){
	$login = $_POST["Nome"];
	$senha = $_POST["passw"];
	
	$consulta = sprintf("SELECT * FROM Cliente WHERE cpfCli='{$login}' AND senhaCli='{$senha}';");

	$dados = sqlsrv_query($con, $consulta);
	if(!$dados) { echo "Erro ao recuperar informações !<br/>"; die(print_r(sqlsrv_errors(), true)); }
	else {
		$linha = sqlsrv_fetch_array( $dados, SQLSRV_FETCH_ASSOC );
		
		if(sqlsrv_has_rows($dados)) { 
			
			$_SESSION['id'] = $linha['id'];
			
			$_SESSION['usuario'] = $linha['usuario'];
			
			$_SESSION['password'] = $linha['password'];
			
			$_SESSION['email'] = $linha['email'];
			
			header("Location: ?valor=5");
		}
		else{
			//echo "Login incorreto. <a href='index.php'>Clique para voltar a página principal.</a>";
			echo "Falha no Login. Confira seus dados e tente novamente!";
		}
	}
}
?>