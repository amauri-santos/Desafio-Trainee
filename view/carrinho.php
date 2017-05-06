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
							<button id="loja" onclick="window.location.href='/Desafio-Trainee/loja'" class="ativo menu-button">Loja</button>
							<button id="sobre" onclick="window.location.href='/Desafio-Trainee/sobre'" class="menu-button">Sobre</button>
							<button id="contato" class="menu-button" onclick="window.location.href='/Desafio-Trainee/contato'">Contato</button>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section ng-controller="cart-controller">
			<div class="container carrinho-back">
				<table id="cart-products" class="table table-bordered">
					<thead>
						<tr>
							<th colspan="2">Produto(s)</th>
							<th class="text-center">Quantidade</th>
							<th class="text-center">Entrega</th>
							<th class="text-center">Valor Unitário</th>
							<th class="text-center">Valor Total</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="produto in produtos">
							<td class="text-center"><img src="img/produtos/{{produto.prodID}}p.jpg"></td>
							<td class="tabela text-center">{{produto.prodnome}}</td>
							<td class="col-xs-2">
								<div class="input-group">
							      <span class="input-group-btn">
							        <button class="btn btn-ta text-roxo" ng-click="removeQtd(produto)" type="button"><i class="fa fa-chevron-down"></i></button>
							      </span>
							      <input type="text" class="form-control" ng-model="produto.qtd_car">
							      <span class="input-group-btn">
							        <button class="btn text-roxo" ng-click="addQtd(produto)" type="button"><i class="fa fa-chevron-up"></i></button>
							      </span>
							    </div>
							</td>
							<td class="text-center col-xs-2">
								<p>Entrega para o<br/>CEP: {{carrinho.cep}}</p>
								<strong class="text-roxo">{{carrinho.prazo}}</strong>
							</td>
							<td class="text-center tabela">R$ {{produto.prodvalor}}</td>
							<td class="text-center tabela">R$ {{produto.total}}</td>
							<td class="text-center"><button ng-click="removeAll(produto)" class="btn text-roxo" type="button"><i class="fa fa-close"></i></button></td>
						</tr>
					</tbody>
				</table>
				<div id="calculo-de-frete" class="row">
					<div class="col-sm-8">
						<div class="box-outline-grey text-center">
							<p style="margin:28px auto;">Simule o prazo de entrega e o frete para seu CEP abaixo:</p>
							<div class="input-group col-xs-4" style="margin:0 auto;">
						      <input type="text" class="form-control" ng-model="cep">
						      <span class="input-group-btn">
						      	<button class="btn btn-default" ng-click="calcularFrete(cep)" type="button">Calcular Frete</button>
						      </span>
						    </div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="box-cart-totais">
							<table class="table">
								<tr>
									<td>Subtotal ({{produtos.length}} item):</td>
									<td class="text-right">R$ {{carrinho.subtotal}}</td>
								</tr>
								<tr>
									<td>Frete:</td>
									<td class="text-right">R$ {{carrinho.frete}}</td>
								</tr>
								<tr style="border-top:#999 1px solid;">
									<td class="text-roxo text-bold">Total:</td>
									<td class="text-roxo text-bold text-right">R$ {{carrinho.total}}</td>
								</tr>
							</table>
						</div>
					</div>
					<button class="fim pull-right" ng-click="abrir()"><i class="fa fa-shopping-cart"></i> Finalizar Compra!</button>
				</div>
			</div>
			<div class="container paganoisbg apagado">
				<div class="container paganois apagado">
					<button ng-click="fechar()"><i class="fa fa-close"></i></button>
					<form class="form paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
				        <input type="hidden" name="cmd" value="_xclick" />
				        <input type="hidden" name="no_note" value="1" />
				        <input type="hidden" name="lc" value="UK" />
				        <input type="hidden" name="currency_code" value="GBP" />
				        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
				        <label for="first_name">Primeiro Nome</label>
				        <input type="text" name="first_name" placeholder="Primeiro Nome" />
				        <label for="last_name">Último Nome</label>
				        <input type="text" name="last_name" placeholder="Último Nome" />
				        <label for="payer_email">Email</label>
				        <input type="email" name="payer_email" placeholder="customer@example.com" />
				        <input type="hidden" name="item_number" value="123456" / >
				        <input type="submit" name="submit" value="Submit Payment"/>
				    </form>
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
		<script >
			angular.module("loja", []).controller("cart-controller", function($scope, $http){
				$scope.abrir = function(){
					$(".paganoisbg").removeClass("apagado");
					$(".paganois").removeClass("apagado");
				};

				$scope.fechar = function(){
					$(".paganoisbg").addClass("apagado");
					$(".paganois").addClass("apagado");
				};

				var carregarCarrinho = function(){

					$http({
						method:'GET',
						url:'carrinho-dados'
					}).then(function(response){

						$scope.carrinho = {
							cep:response.data.cep_car,
							subtotal:response.data.subtotal_car,
							frete:response.data.frete_car,
							total:response.data.total_car,
							prazo:response.data.prazo_car+' dias úteis'
						};
						$scope.produtos = response.data.produtos;

					}, function(response){

						console.error(response);

					});

				};

				$scope.addQtd = function(_produto){

					$http({
						method:'POST',
						url:'carrinho-produto',
						data:JSON.stringify({
							id_prod:_produto.prodID
						})
					}).then(function(response){

						carregarCarrinho();

					}, function(){



					});

				};

				$scope.removeQtd = function(_produto){

					$http({
						method:'DELETE',
						url:'carrinho-produto',
						data:JSON.stringify({
							id_prod:_produto.prodID
						})
					}).then(function(response){

						carregarCarrinho();

					}, function(){



					});

				};

				$scope.removeAll = function(_produto){

					$http({
						method:'DELETE',
						url:'carrinhoRemoveAll-'+_produto.prodID
					}).then(function(response){

						carregarCarrinho();

					}, function(){



					});

				};

				$scope.calcularFrete = function(_cep){

					$http({
						method:'GET',
						url:'calcular-frete-'+_cep
					}).then(function(response){

						carregarCarrinho();

					}, function(){



					});

				};

				carregarCarrinho();

			});
		</script>
	</body>
</html>