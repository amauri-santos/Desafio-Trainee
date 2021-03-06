<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Delta Robotics</title>
		<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/Desafio.css">
	</head>

	<body>
		<header>
			<div class="hdd">
				<div class="container hdd2">
					<div id="logo-head">
						<img src="../img/logotipo-delta-menor-medio.png">
					</div>
					<div id="navegação">
						<div class="menu row-menu">
							<button id="home" onclick="window.location.href='/Desafio-Trainee/'" class="menu-button">Início</button>
							<button id="Project" onclick="window.location.href='/Desafio-Trainee/projetos'" class="menu-button ativo">Projetos</button>
							<button id="loja" onclick="window.location.href='/Desafio-Trainee/loja'" class="menu-button">Loja</button>
							<button id="sobre" onclick="window.location.href='/Desafio-Trainee/sobre'" class="menu-button">Sobre</button>
							<button id="contato" onclick="window.location.href='/Desafio-Trainee/contato'" class="menu-button">Contato</button>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section>
			
		</section>

		<?php include_once("footer.php"); ?>

		<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
		<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
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
				$("#sobre").on("mouseover", function(){

					$("#sobre").addClass("efeito");

				}).on("mouseout", function(){

					$("#sobre").removeClass("efeito");

				});
				$("#contato").on("mouseover", function(){

					$("#contato").addClass("efeito");

				}).on("mouseout", function(){

					$("#contato").removeClass("efeito");

				});
			});
		</script>
	</body>
</html>