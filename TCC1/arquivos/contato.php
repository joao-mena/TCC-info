<?php
include("conexao_sis.php");
?>
	
<form method="POST">

	<a href="#" id="contato" style="font-size: 35; color:#FD6512">
		
		CONTATO
	
	</a>	
	
	<br/>
	<br/>

	<label>
	
		Nome:
		
	</label>

	<br/>
	
	<input type="text" name="nome" class="form-control" placeholder="Digite seu Nome">
	
	<br/>
	<br/>
	
	<label>
		
		E-Mail:
		
	</label>

	<br/>

	<input type="email" name="email" class="form-control" placeholder="Digite seu E-Mail">

	<br/>
	<br/>
	
	<label>
	
		Mensagem: *Até 200 Caracteres*
		
	</label>
	
	<br/>
	
	<input type="text" name="mensagem" maxlength="200" height="300" placeholder="Digite sua Mensagem">
	
	<br/>
	<br/>

	<input type="submit" name="insererir" value="ENVIAR">
	
	<br/>
	<br/>

</form>

<?php
if(isset($_POST['insererir']))
{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];

	$inserir = "INSERT INTO contato(nome, email, mensagem)VALUES('$nome', '$email', '$mensagem')";
	
	$executar = sqlsrv_query($con, $inserir);
	
	if(!$executar)
	{
	echo "<h3>Falha ao enviar sua mensagem, tente novamente</h3>";	
	}
	else
	{
		echo "<h3>Sua mensagem foi enviada com sucesso!</h3>";
	}
}
?>	