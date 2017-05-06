<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Delta Robotics</title>
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/Desafio.css">
	</head>

	<body>
		<header>
			<div class="hdd">
				<div class="container hdd2">
					<div id="logo-head">
						<img src="img/logotipo-delta-menor-medio.png">
					</div>
					<div id="navegação">
						<div class="menu row-menu">
							<button id="home" onclick="window.location.href='/Desafio-Trainee/'" class="menu-button">Início</button>
							<button id="Project" onclick="window.location.href='/Desafio-Trainee/projetos'" class="menu-button">Projetos</button>
							<button id="loja" onclick="window.location.href='/Desafio-Trainee/loja'" class="menu-button">Loja</button>
							<button id="sobre" onclick="window.location.href='/Desafio-Trainee/sobre'" class="menu-button">Sobre</button>
							<button id="contato" class="menu-button ativo">Contato</button>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section>
			<div id="CONTATO" class="container">
				<h1 style="text-align: center;">Entre em contato conosco</h1>
				<hr>
				<div class="form">
					<form method="POST" action="">
						<div class="form-group">
							<label for="nome">Nome</label>
							<input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o seu nome" required>
						</div>
						<div class="form-group">
							<label for="lugar">Lugar</label>
							<input type="text" name="lugar" id="lugar" class="form-control" placeholder="De onde você é?" required>
						</div>
						<div class="form-group">
							<label for="mensagem">Mensagem</label>
							<textarea style="height: 250px"type="text" name="mensagem" id="mensagem" class="form-control" placeholder="Digite aqui a sua mensagem" required></textarea>
						</div>
						<div>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</form>
				</div>
				<div class="linea"></div>
				<div class="Dadosdc text-center">
					<p>Telefone:<br><i class="fa fa-phone"></i> Não possuimos<br>Email:<br><i class="fa fa-envelope"></i> deltaensina@gmail.com<br>Sede:<br><i class="fa fa-map-marker"></i> Não temos sede física</p>
				</div>
			</div>
		</section>

		<?php include_once("footer.php"); ?>

		<script src="lib/jquery/jquery-3.1.1.min.js"></script>
		<script type="lib/bootstrap/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#home").on("mouseover", function(){

					$("#home").addClass("efeito");

				}).on("mouseout", function(){

					$("#home").removeClass("efeito");

				});
				$("#loja").on("mouseover", function(){

					$("#loja").addClass("efeito");

				}).on("mouseout", function(){

					$("#loja").removeClass("efeito");

				});
				$("#Project").on("mouseover", function(){

					$("#Project").addClass("efeito");

				}).on("mouseout", function(){

					$("#Project").removeClass("efeito");

				});
				$("#sobre").on("mouseover", function(){

					$("#sobre").addClass("efeito");

				}).on("mouseout", function(){

					$("#sobre").removeClass("efeito");

				});
			});
		</script>
	</body>
</html>