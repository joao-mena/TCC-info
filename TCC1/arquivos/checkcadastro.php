<?php
	include("conexao_sis.php");
	session_start();
?>	

<form method="POST"><!-- Sem o action ele envia os parametros POST e GET dentro da mesma página -->
	
	<center>
	
		<div class="form-group">
		
			<br/>
		
			<label>

				Insira seu CPF:
			
			</label>
			
			<br/>
		
			<input type="text" name="login" class="form-control" placeholder="Insira seu CPF">
		
			<br/>
			<br/>
			
			<input type="submit" name="insert" value="ENTRAR">
			
			<br/>
			<br/>
		
		</div>		
			
	</center>	

</form>

<?php
if(isset($_POST["login"])){
	$login = $_POST["login"];
	
	$consulta = sprintf("SELECT * FROM Cliente WHERE cpfCli='{$login}';");

	$dados = sqlsrv_query($con, $consulta);
	if(!$dados) { echo "Erro ao recuperar informações !<br/>"; die(print_r(sqlsrv_errors(), true)); }
	else {
		$linha = sqlsrv_fetch_array( $dados, SQLSRV_FETCH_ASSOC );
		
		if(sqlsrv_has_rows($dados)) { 
			
			//$_SESSION['id'] = $linha['id'];
			
			//$_SESSION['login'] = $linha['login'];
			
			$login = $_POST['login'];
			$_SESSION['login'] = $login;
			
			//$_SESSION['password'] = $linha['password'];
			
			//$_SESSION['email'] = $linha['email'];
			
			header("Location: index.php?valor=4");
		}
		else{
			echo "CPF Inválido. Verifique se digitou corretamente!";
		}
	}
}
?>