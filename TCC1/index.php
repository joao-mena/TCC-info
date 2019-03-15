<?php
	include_once("conexao_sis.php");
	if(!isset($_COOKIE["audio"]))
	{ 
		setcookie("audio", "desativar"); 
	}
	if(isset($_GET["audio"]))
	{
		if($_GET["audio"] == "desativar")
		{ 
			setcookie("audio", "ativar");
		}
		else 
		{
			setcookie("audio", "desativar");
		}
		header('Location: ?');
	}
?>

<html>

	<head>
		
		<title>
		
			Smile
			
		</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width-device-width, initial-scale-1.0">
		
		<link rel="shortcut icon" href="imagens/logotcc.ico">
		
		<link a href="css/estilo.css" rel="stylesheet"/>
		
		<script src="javascript/jQuery.js"></script>
		<script src="javascript/responsivevoice.js"></script>
		<script src="javascript/banner.js" type="text/jscript"></script>
		<script src="javascript/menu.js" type="text/jscript"></script>
		<script src="javascript/voltatopo.js" type="text/jscript"></script>
		
		<style>
			
			.ocultar{ display: none; }
			
		</style>
		
	</head>
	
	<body>
	
		<div class="topnav" id="myTopnav">
		
			<a href="index.php"> 
		
				HOME 

			</a>
			
			<a href="#servico"> 
		
				SERVIÇOS 

			</a>
			
			<a href="#galeria"> 
		
				GALERIA

			</a>
			
			<a href="#quemsomos"> 
		
				QUEM SOMOS 

			</a>
			
			<a href="#local"> 
		
				LOCALIZAÇÃO

			</a>
			
			<a href="#contato"> 
		
				CONTATO 

			</a>
			
			<a  href="#minhaDiv" onclick="Mudarestado('minhaDiv')"> 
		
				ENTRAR 

			</a>
			
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">
			
				&#9776;
			
			</a>
			
		</div>		
	
		<div class="Conteudo">
	
			<center>
	
				<form method="POST">
	
					<div class="form-group" id="minhaDiv" style='display: none'>
		
						<br/>
		
						<label>
			
							CPF:
			
						</label>
			
						<br/>
			
						<input type="text" name="Nome" class="form-control" placeholder="Digite seu CPF">
			
						<br/>
						<br/>	
		  
						<label>
			
							Senha:
				
						</label>
		
						<br/>
			
						<input type="password" name="passw" class="form-control" placeholder="Digite sua senha">
	
						<br/>
						<br/>	
						
						<input type="submit" name="insert" class="btn btn-warning" value="ENTRAR">
			
						<br/>
						<br/>
			
						<a href="index.php?valor=3" style="font-size: 20">
			
							Cadastro

						</a>
			
						<br/>
						<br/> 
				
					</div>	
		
				</form>

			</center>	

			<?php
				include_once('arquivos/conteudo.php');
			?>
			
			<?php
				if(isset($_GET['valor'])) 
				{
				$valor = $_GET['valor'];
				} 
				else
				{
				$valor = 1;
				}
				switch ($valor)
				{
				case 2: include "arquivos/loginpage.php";
				break;
				case 3: include "arquivos/checkcadastro.php";
				break;
				case 4: include "arquivos/cadastro.php";
				break;
				case 5: include "arquivos/meuperfil.php";
				break;
				}
			?>
			
			<?php
				if(isset($_POST["Nome"]) && isset($_POST["passw"]))
				{
					$login = $_POST["Nome"];
					$senha = $_POST["passw"];
	
					$consulta = sprintf("SELECT * FROM Cliente WHERE cpfCli='{$login}' AND senhaCli='{$senha}';");

					$dados = sqlsrv_query($con, $consulta);
					if(!$dados)
					{ 
						echo "Erro ao recuperar informações !<br/>"; die(print_r(sqlsrv_errors(), true)); 
					}
					else 
					{
						$linha = sqlsrv_fetch_array( $dados, SQLSRV_FETCH_ASSOC );
						if(sqlsrv_has_rows($dados)) 
						{ 
							$_SESSION['id'] = $linha['id'];
							$_SESSION['usuario'] = $linha['usuario'];
							$_SESSION['password'] = $linha['password'];
							$_SESSION['email'] = $linha['email'];
							header("Location: ?valor=5");
						}
						else
						{
							echo "Falha no Login. Confira seus dados e tente novamente!";
							//echo "Login incorreto. <a href='index.php'>Clique para voltar a página principal.</a>";
						}
					}
				}
			?>
			
			<script>
			function Mudarestado(el) 
			{
				var display = document.getElementById(el).style.display;
				if(display == "none")
				document.getElementById(el).style.display = 'block';
				else
				document.getElementById(el).style.display = 'none';
			}
			</script>
			
		</div>
	
		<center>
			
			<img src="imagens/logo.jpeg" width="30%" height="30%">
			
			<a class="audio" href="?audio=<?php echo $_COOKIE['audio']; ?>">
	
				<label class="ocultar"><?php echo $_COOKIE['audio']; ?></label>
			
				<img src="imagens/<?php echo $_COOKIE['audio']; ?>.png" width="20" height="20">
				
			</a>	

			<br/>
		<div>
			<a href="#" style="font-size: 30">
			
				BEM VINDO!
				
			</a>
			
			<div class="borda">
			
				<a href="#" class="justify">
	
						SMILE, é uma academia especializada que pode atender e suprir todas as necessidades dos seus membros, tendo eles deficiências físicas ou não.
	        
						</br>
				</a>
				
				<a href="#" class="justify">
						Com nosso sistema de áudio-descrição, você pode navegar em nosso site apenas apertando as teclas TAB e ENTER em seu teclado! 
						Basta pressionar TAB para ouvir o próximo áudio e ENTER para confirmar a opção selecionada.
				</a>
						</br>
						</br>
						
						<center>
						
							<table class="table table-responsive">
							
								<tr>
								
									<th>
									
										Horário de Funcionamento
										
									</th>
	
								</tr>
								
								<tr>
								
									<td>
										
										Segunda a sexta: 6h às 23h
										
									</td>
  
								</tr>
  
								<tr>

									<td>
										
										Sábado: 9h às 18h
									
									</td>
   
								</tr>
  
							</table>
					
						</center>
				
				</a>
				
				<br/>
				<br/>
				
			</div>
		</div>
			
			<div class="form-group" id="servico">
			
				<table style="border-right: 3px">
		
					<tr>
					
						<td>
						
						</td>

						<td>
						
							<br/>
		
							<center>
						
								<a style="font-size: 35">
					
									Aulas da semana
					
								</a>
							
							</center>
						
							<table class="table table-responsive">
								<thead>
								<tr>
									
									<th>
								
										Atidade
									
									</th>
								
									<th>
								
										Segunda
									
									</th>
								
									<th>
								
										Terça
										
									</th>

									<th>
									
										Quarta
										
									</th>

									<th>
								
										Quinta
									
									</th>

									<th>
								
										Sexta
									
									</th>

									<th>
								
										Sabado
									
									</th>
								
								</tr>
								</thead>
								<tbody>
								<tr>
							
									<td>
									
										<strong>
									
											Zumba
										
										</strong>
									
									</td>
								
									<td>
								
										19h-20h
									
									</td>
								
									<td>
								
										16h-17h
									
									</td>
	
									<td>
								
										19h-20h
									
									</td>
								
									<td>
								
										11h-12h
										
									</td>
								
									<td>
								
										16h-17h
									
									</td>
								
									<td>
								
										11h-12h
									
									</td>
								
								</tr>
  
								<tr>
							
									<td>
								
										<strong>
									
											Yoga
										
										</strong>
									
									</td>
    
									<td>
								
										7h-8h
										
									</td>
							
									<td>
								
										8h-9h
									
									</td>
	
									<td>
								
										7h-8h
									
									</td>

									<td>
								
										10h-11h
									
									</td>
								
									<td>
								
										8h-9h
									
									</td>
								
									<td>
									
										10h-11h
									
									</td>
							
								</tr>
							
								<tr>
							
									<td>
								
										<strong>
									
											Step + jump
										
										</strong>
									
									</td>
								
									<td>
									
										20h-21h
										
									</td>
  
									<td>
									
										21h-22h
										
									</td>
	
									<td>
							
										20h-21h
								
									</td>
							
									<td>
							
										14h-15h
								
									</td>
							
									<td>
							
										21h-22h
								
									</td>
							
									<td>
							
										14h-15h
							
									</td>
							
								</tr>
  
								<tr>
  
									<td>
							
										<strong>
								
											Aikido
									
										</strong>
								
									</td>
							
									<td>
							
										15h-16h
								
									</td>
							
									<td>
							
										19h-20h
								
									</td>
							
									<td>
							
										15h-16h
								
									</td>
							
									<td>
							
										10h-11h
								
									</td>
							
									<td>
							
										19h-20h
								
									</td>
							
									<td>
							
										10h-11h
								
									</td>
							
								</tr>
						
								<tr>
						
									<td>
							
										<strong>
								
											Judô
									
										</strong>
								
									</td>
   
									<td>
						
										19h-20h
							
									</td>
   
									<td>
							
										11h-12h
								
									</td>
							
									<td>
							
										19h-20h
								
									</td>
							
									<td>
							
										14h-15h
								
									</td>
							
									<td>
							
										11h-12h
								
									</td>
							
									<td>
							
										14h-15h
								
									</td>
							
								</tr>
  
								<tr>
						
									<td>
							
										<strong>
								
											Karatê
									
										</strong>
								
									</td>
							
									<td>
							
										9h-10h
								
									</td>
							
									<td>
							
										14h-15h
								
									</td>
							
									<td>
							
										9h-10h
								
									</td>
							
									<td>
							
										16h-17h
								
									</td>
							
									<td>
								
										14h-15h
									
									</td>
	
									<td>
							
										16h-17h
								
									</td>
							
								</tr>
 
								<tr>
   
									<td>
							
										<strong>
								
											Jiu-Jitsu
									
										</strong>
							
									</td>
					
									<td>
							
										21h-22h
									
									</td>
							
									<td>
							
										20h-21h
								
									</td>
	
									<td>
							
										21h-22h
								
									</td>
	
									<td>
							
										15h-16h
								
									</td>
	
									<td>
							
										20h-21h
								
									</td>
	
									<td>
							
										15h-16h
								
									</td>
	
								</tr>

								<tr>
  
									<td>
								
										<strong>
								
											Pilates
								
										</strong>
								
									</td>
							
									<td>
							
										Agendamento
								
									</td>
							
									<td>
							
										Agendamento
								
									</td>
							
									<td>
							
										Agendamento
								
									</td>
							
									<td>
							
										Agendamento
							
									</td>
							
									<td>
							
										Agendamento
								
									</td>
							
									<td>
							
										Agendamento
								
									</td>
							
								</tr>
								</tbody>
							</table>
		
						</td>
						
					</tr>

				</table>		
				
				<br/>
				<br/>		
		
			</div>
		
<!-------------------------------------------------------------------------------lightbox------------------------------------------------------------->

			<h2 style="text-align:center" id="galeria">Galeria</h2>

<div class="row">
<table>
<tr>
<td>
  <div class="column">
    <img src="imagens/imagem1.jpg" style="width:350%; margin-left:18px; margin-bottom: 3px" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
  </div>
  <td>
  <div class="column">
    <img src="imagens/imagem1.jpg" style="width:350%; margin-left:18px; margin-bottom: 3px" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
  </div>
  <td>
  <div class="column">
    <img src="imagens/imagem1.jpg" style="width:350%; margin-left:18px; margin-bottom: 3px" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
  </div>
  <td>
  <div class="column">
    <img src="imagens/imagem1.jpg" style="width:350%; margin-left:18px; margin-bottom: 3px" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
  </div>
  </tr>
  
  <tr>
  <td>
    <div class="column">
    <img src="imagens/imagem2.jpg" style="width:350%; height:23%; margin-left:18px" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
  </div>
  <td>
  <div class="column">
    <img src="imagens/imagem2.jpg" style="width:350%; height:23%; margin-left:18px" onclick="openModal();currentSlide(6)" class="hover-shadow cursor">
  </div>
  <td>
  <div class="column">
    <img src="imagens/imagem2.jpg" style="width:350%; height:23%; margin-left:18px" onclick="openModal();currentSlide(7)" class="hover-shadow cursor">
  </div>
  <td>
  <div class="column">
    <img src="imagens/imagem2.jpg" style="width:350%; height:23%; margin-left:18px" onclick="openModal();currentSlide(8)" class="hover-shadow cursor">
  </div>
  </tr>
  </table>
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 8</div>
      <img src="imagens/imagem1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 8</div>
      <img src="imagens/imagem1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 8</div>
      <img src="imagens/imagem1.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">4 / 8</div>
      <img src="imagens/imagem1.jpg" style="width:100%">
    </div>
	
	<div class="mySlides">
      <div class="numbertext">5 / 8</div>
      <img src="imagens/imagem2.jpg" style="width:100%">
    </div>
	
	<div class="mySlides">
      <div class="numbertext">6 / 8</div>
      <img src="imagens/imagem2.jpg" style="width:100%">
    </div>
	
	<div class="mySlides">
      <div class="numbertext">7 / 8</div>
      <img src="imagens/imagem2.jpg" style="width:100%">
    </div>
	
	<div class="mySlides">
      <div class="numbertext">8 / 8</div>
      <img src="imagens/imagem2.jpg" style="width:100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="imagens/imagem1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
    </div>
    <div class="column">
      <img class="demo cursor" src="imagens/imagem1.jpg" style="width:100%" onclick="currentSlide(2)" alt="Trolltunga, Norway">
    </div>
    <div class="column">
      <img class="demo cursor" src="imagens/imagem1.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="imagens/imagem1.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
	 <div class="column">
      <img class="demo cursor" src="imagens/imagem2.jpg" style="width:100%" onclick="currentSlide(5)" alt=" sunrise">
    </div>
    <div class="column">
      <img class="demo cursor" src="imagens/imagem2.jpg" style="width:100%" onclick="currentSlide(6)" alt="Norway">
    </div>
    <div class="column">
      <img class="demo cursor" src="imagens/imagem2.jpg" style="width:100%" onclick="currentSlide(7)" alt="fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="imagens/imagem2.jpg" style="width:100%" onclick="currentSlide(8)" alt=" Lights">
	</div>
	</div>
	</br>
	</br>
</div>

<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>


<!-------------------------------------------------------------------------------------------------------------------------------------------->
<br/>

			<br/>
		
			<div class="form-group" id="quemsomos">
			
				</br>
		
		
				<a href="#" style="font-size:30; color:#FD6512">
				
					Quem Somos
					
				</a>
				
					<div class="borda1">			
		
		
						<a href="#" style="font-size:18.7">
						
							Smile é uma academia especializada e adaptada para pessoas com deficiência física, auditiva ou visual. 
							Contando com equipamentos adequados, profissionais especializados e um ambiente de fácil acesso, com piso tátil, indicações em braile, rampas, 
							banheiros para cadeirantes, etc. 
						</a>	
							<br/><br/>
						<a href="#" style="font-size:18.7">	
							A academia visa mais do que a estética corporal, pois valorizamos junto aos alunos e colaboradores 
							a solidariedade e respeito mútuo através da integração inserida num ambiente motivacional. Nossas principais atividades compreendem treinamento 
							multifuncional, atividades aeróbicas e artes marciais. Visando assim, a promoção da saúde e do bem-estar e ainda, uma sociedade mais justa e mais humana.
	    
						</a>
		
					</div>
					
					<br/>
					<br/>
	
			</div>
			
			<?php
				include("arquivos/contato.php");
			?>
			
		</center>
		
	</div>
	
	<div class="form-group">
	
		<h1 id="local">
		
			Localização
			
		</h1>

		<center>
		
			<div id="map" style="width:50%;height:400px">
			
			</div>
			
		</center>

		<script>
		function myMap() {
  var myCenter = new google.maps.LatLng(-23.499924, -46.622407);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 10};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
    content: "Venha nos conhecer!"
  });
  infowindow.open(map,marker);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9n9tLBWZ2HfJTqgFmoIgUbVuwmQhbXfs&callback=myMap"></script><br/>
<a href="#local" style="color: white; font-size: 15">
	Rua Dr. Olavo Egídio, número 320, CEP: 02037-000, Santana – São Paulo	
</a>
<br/><br/>
</div>

		</div>
		
		<div class="rodape">
		
			<?php
				include_once('arquivos/rodape.php');
			?>
			
		</div>
		
		<script src="javascript/scriptdevoz.js"></script>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Topo</button>
		
	</body>
	
</html>