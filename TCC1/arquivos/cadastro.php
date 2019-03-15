<?php
	include("conexao_sis.php");
	session_start();
	$login1 = $_SESSION['login'];
?>	

<div class="form-group">

		<a href="#" style="font-size:30;">
		
			CPF autorizado!

			<br/>
			
			Finalize seu cadastro definindo uma senha abaixo:
		
		</a>
	
		<form method="POST">
			
			<label>
				
				Senha:
				
			</label>
			
			<br/>
			
			<input type="password" name="passw" placeholder="Digite sua senha">
			
			<br/>
			<br/>
			
			<input type="submit" name="insert" value="ENVIAR">
			
			<br/>
			<br/>
			
		</form>

</div>

<br/>
<br/>

<?php	
	if(isset($_POST['insert']))
	{
		$pass = $_POST['passw'];

		//esse comando nao é o certo
		$inserir = ("update Cliente set senhaCli='$pass' where cpfCli = '$login1';");
		
		$executar = sqlsrv_query($con, $inserir);
		
		if(!$executar)
		{
			echo "<h3>Falha ao realizar o cadastro, tente novamente!</h3>";		
		}
		else
		{
			header("Location: index.php");
		}
	}
?>