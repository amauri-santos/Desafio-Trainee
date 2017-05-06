<!DOCTYPE html>
<html ng-app="loja">
	<head>
		<meta charset="utf-8">
		<title>Delta Robotics</title>
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="lib/raty/lib/jquery.raty.css">
		<link rel="stylesheet" type="text/css" href="css/Desafio.css">

		<script src="lib/angularjs/angular.min.js"></script>
		<script>
			angular.module("loja", []).controller("destaque-controller", function($scope, $http){

				$scope.produtos = [];

				$scope.buscados = [];


				$http({
				  method: 'GET',
				  url: 'produtos'
				}).then(function successCallback(response) {

				    $scope.produtos = response.data;

				  }, function errorCallback(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				});
			});
		</script>
	</head>

	<body>
		<header>
			<div class="hdd">
				<div class="container hdd2">
					<div id="logo-head">
						<img class="logotipo" src="img/logotipo-delta-menor-medio.png">
					</div>
					<div id="navegação">
						<div class="menu row-menu">
							<button id="home" class="menu-button" onclick="window.location.href='/Desafio-Trainee/'">Início</button>
							<button id="Project" onclick="window.location.href='/Desafio-Trainee/projetos'" class="menu-button">Projetos</button>
							<button id="loja" class="menu-button ativo">Loja</button>
							<button id="sobre" onclick="window.location.href='/Desafio-Trainee/sobre'" class="menu-button">Sobre</button>
							<button id="contato" class="menu-button" onclick="window.location.href='/Desafio-Trainee/contato'">Contato</button>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section id="lojashop" ng-controller="destaque-controller">
			<div class="container headding text-center">
				<h1>Produtos em Desaque</h1>
			</div> 
			<div id="Prod-em-Dest" >
				<div class="container">
					<div class="row" id="caguei">
						<div class="item prod" ng-repeat="produto in produtos">
							<div class="item-inner">
								<div class="col-md-6 col-img">
									<a href="produto-{{produto.prodID}}"><img class=" pull-right" src="img/produtos/{{produto.prodID}}.jpg"></a>
								</div>
								<div class="col-md-6 col-texto">
									<h2><a href="produto-{{produto.prodID}}">{{produto.prodnome}}</a></h2>
									<div class="box-valor">
										<div class="text-noboleto"><a href="produto-{{produto.prodID}}">no boleto por</a></div>
										<div class="small-container preço"><a href="produto-{{produto.prodID}}">
											<div class="text-reais">R$</div>
											<div class="text-valor">{{produto.prodvalor}}</div>
											<div class="text-valor-centavos">,{{produto.centavos}}</div>
										</div>
										<div class="text-parcelas"><a href="produto-{{produto.prodID}}">ou em até {{produto.parcelas}}x de R$ {{produto.parcela}}<br>total a prazo R$ {{produto.total}}</a></div>	
										<div id="addcarloja"><a href="carrinhoAdd-{{produto.prodID}}">	<i class="fa fa-cart-plus"></i> Comprar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>

		<?php include_once("footer.php"); ?>

		<script src="lib/jquery/jquery-3.1.1.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="lib/raty/lib/jquery.raty.js"></script>
		<script>
			$(document).ready(function(){
				$("#home").on("mouseover", function(){

					$("#home").addClass("efeito");

				}).on("mouseout", function(){

					$("#home").removeClass("efeito");

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
				$("#contato").on("mouseover", function(){

					$("#contato").addClass("efeito");

				}).on("mouseout", function(){

					$("#contato").removeClass("efeito");

				});
			});
		</script>
	</body>
</html>