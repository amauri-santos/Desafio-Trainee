<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Delta Robotics</title>
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="lib/owl.carousel/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/Desafio.css">
	</head>

	<body>
		<header>
			<div class="hdd"></dir>
				<div class="container hdd2">
					<div id="logo-head">
						<img class="logotipo" src="img/logotipo-delta-menor-medio.png">
					</div>
					<div id="navegação">
						<div class="row-menu menu">
							<button id="home" class="menu-button">Início</button>
							<button id="Project" onclick="window.location.href='/Desafio-Trainee/projetos'" class="projeto menu-button">Projetos</button>
							<button id="loja" onclick="window.location.href='/Desafio-Trainee/loja'" class="menu-button">Loja</button>
							<button id="sobre" onclick="window.location.href='/Desafio-Trainee/sobre'" class="menu-button">Sobre</button>
							<button id="contato" onclick="window.location.href='/Desafio-Trainee/contato'" class="menu-button">Contato</button>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section>
			
			<div id="sliderh" class="container">
				<div class="row banner">
					<div class="item">
						<div class="item-inner pj pull-right">
							<div class="container Título1"><a href="/Desafio-Trainee/projetos">
								<div class="T1">
									<h2>Projetos</h2>
								</div>
								<div class="ST1">
									<h3>Saiba Mais sobre os nossos projetos</h3>
								</div>
							</a></div>
						</div>
					</div>
					<div class="item">
						<div class="item-inner ar pull-right">
							<div class="container Título2 "><a href="/Desafio-Trainee/loja">
								<div class="T2 pull-right">
									<h2>Nossa Loja</h2>
								</div>
								<div class="ST2">
									<h3>Veja os produtos que estão disponíveis na nossa loja</h3>
								</div>
							</a></div>
						</div>
					</div>
					<div class="item">
						<div class="item-inner br pull-right">
							<div class="container Título3 "><a href="/Desafio-Trainee/sobre">
								<div class="T3 pull-right">
									<h2>Sobre</h2>
								</div>
								<div class="ST3">
									<h3>Não achei uma imagem interessante para por aqui</h3>
								</div>
							</a></div>
						</div>
					</div>
				</div>
			</div>

			<div class="container homebox text-center">

				<div class="col-md-3">
					<a href="/Desafio-Trainee/projetos">
						<h4>Projetos</h4>
						<p style="text-align: justify;">Conheça mais sobre todos os nossos antigos, atuais e futuros projetos!!</p>
						<img src="img/Bot'n'roll.jpg">
					</a>
				</div>

				<div class="col-md-3">
					<a href="/Desafio-Trainee/loja">
						<h4>Loja</h4>
						<p style="text-align: justify;">Temos várias opções de acessórios e equipamentos em eletrônica. Especialmente Arduino. Venha conhecer!!</p>
						<img src="img/Arduino.jpg">
					</a>
				</div>

				<div class="col-md-3">
					<a href="/Desafio-Trainee/sobre">
						<h4>Sobre</h4>
						<p>Conheça os integrantes da Equipe e saiba mais sobre a mesma!</p>
						<img src="img/logotipo-delta.png">
					</a>
				</div>

				<div class="col-md-3">
					<a href="/Desafio-Trainee/contato">
						<h4>Contato</h4>
						<p>Fale conosco!</p>
						<i class="fa fa-phone"></i>
					</a>
				</div>
				
			</div>

			<div id="submenu" class="text-center projeto container apagado">
				<p><br><a href="Projetos/OBR" style="color: #fff">OBR</a></p>
				<hr>
				<p><a href="Projetos/Delta-Ensina" style="color: #fff">Delta Ensina</a></p>
				<hr>
				<p><a href="Projetos/Venda-Trufa" style="color: #fff">Venda de Trufas</a></p>
			</div>

		</section>

		<?php include_once("footer.php"); ?>

		<script src="lib/jquery/jquery-3.1.1.min.js"></script>
		<script src="lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#home").addClass("ativo");
				$("#loja").on("mouseover", function(){

					$("#loja").addClass("efeito");

				}).on("mouseout", function(){

					$("#loja").removeClass("efeito");

				});
				$(".projeto").on("mouseover", function(){

					$("#Project").addClass("efeito");
					$("#submenu").removeClass("apagado");

				}).on("mouseout", function(){

					$("#Project").removeClass("efeito");
					$("#submenu").addClass("apagado");

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
				$(".banner").owlCarousel({
					autoPlay: 5000,
		      		items : 1
		  		});
			});
		</script>
	</body>
</html>