<?php
require 'inc/configuratuion.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get(
    '/',
    function () {
        
        require_once("view/index.php");
    }
);
$app->get('/log_in',function () {
    require_once("view/log_in.php");

});
$app->get('/conf',function () {
    $sql = new Sql();

    $dados = $sql->select("SELECT * FROM tb_users");

});
$app->get(
    '/projetos',
    function () {
        
        require_once("view/Projetos.php");
    }
);
$app->get(
    '/loja',
    function () {
        
        require_once("view/Loja.php");
    }
);
$app->get(
    '/sobre',
    function () {
        
        require_once("view/Sobre.php");
    }
);
$app->get(
    '/contato',
    function () {
        
        require_once("view/Contato.php");
    }
);
$app->get('/produtos', function(){

    $sql = new Sql();

    $data = $sql->select("SELECT * FROM tb_des_prod order by prodvalor desc");

    foreach ($data as &$produto) {
        $preco = $produto['prodvalor'];
        $centavos = explode(".", $preco);
        $produto['prodvalor'] = number_format($preco, 0, ",", ".");
        $produto['centavos'] = end($centavos);
        $produto['parcelas'] = 10;
        $produto['parcela'] = number_format($preco/$produto['parcelas'], 2, ",", ".");
        $produto['total'] = number_format($preco, 2, ",", ".");
    }

    echo json_encode($data);

    return $data;
});
$app->get('/produto-:id_prod',function ($id_prod) {
        
        $sql = new Sql();

        $produtos = $sql->select("SELECT * FROM tb_des_prod WHERE prodID = $id_prod");
        $produto = $produtos[0];
        $preco = $produto['prodvalor'];
        $centavos = explode(".", $preco);
        $produto['prodvalor'] = number_format($preco, 0, ",", ".");
        $produto['centavos'] = end($centavos);
        $produto['parcelas'] = 10;
        $produto['parcela'] = number_format($preco/$produto['parcelas'], 2, ",", ".");
        $produto['total'] = number_format($preco, 2, ",", ".");
        require_once("view/produto-loja.php");   
    }
);
$app->get('/carrinho', function(){
    require_once("view/carrinho.php");
});
$app->get('/Projetos/OBR', function(){
    require_once("view/Projetos-Copia.php");
});
$app->get('/Projetos/Delta-Ensina', function(){
    require_once("view/Projetos-DE.php");
});
$app->get('/Projetos/Venda-Trufa', function(){
    require_once("view/Projetos-Venda-Trufa.php");
});
$app->get('/carrinho-dados', function(){

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get_des('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $carrinho['produtos'] = $sql->select("CALL sp_carrinhosprodutos_list(".$carrinho['id_car'].")");

    $carrinho['total_car'] = number_format((float)$carrinho['total_car'], 2, ',', '.');
    $carrinho['subtotal_car'] = number_format((float)$carrinho['subtotal_car'], 2, ',', '.');
    $carrinho['frete_car'] = number_format((float)$carrinho['frete_car'], 2, ',', '.');

    echo json_encode($carrinho);

    return $carrinho;
});
$app->get('/carrinhoAdd-:id_prod', function($id_prod){

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get_des('".session_id()."')");

    $data = $result[0];

    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutos_add(".$data['id_car'].", ".$id_prod.")");

    header("location: carrinho");
    exit;

});
$app->post("/carrinho-produto", function(){

    $data = json_decode(file_get_contents("php://input"), true);

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get_des('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutos_add(".$carrinho['id_car'].", ".$data['id_prod'].")");

    echo json_encode(array(
        "success"=>true
    ));

});
$app->get("/calcular-frete-:cep", function($cep){

    require_once("inc/php-calculo-frete-master/frete.php");

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get_des('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $produtos = $sql->select("CALL sp_carrinhosprodutosfrete_list(".$carrinho['id_car'].")");

    $peso = 0; 
    $comprimento = 0;
    $altura = 0;
    $largura = 0;
    $valor = 0;

    foreach ($produtos as $produto) {
        $peso =+ $produto['peso'];
        $comprimento =+ $produto['comprimento'];
        $altura =+ $produto['altura'];
        $largura =+ $produto['largura'];
        $valor =+ $produto['prodvalor'];
    }

    $cep = trim(str_replace('-', '', $cep));

    $frete = new Frete(
        $cepDeOrigem = '22290270', 
        $cepDeDestino = $cep, 
        $peso, 
        $comprimento, 
        $altura, 
        $largura, 
        $valor
    );

    $sql = new Sql();

    $sql->query("
        UPDATE tb_carrinhos 
        SET 
            cep_car = '".$cep."', 
            frete_car = ".$frete->getValor().",
            prazo_car = ".$frete->getPrazoEntrega()."
        WHERE id_car = ".$carrinho['id_car']
    );

    echo json_encode(array(
        'success'=>true
    ));

});
$app->delete("/carrinho-produto", function(){

    $data = json_decode(file_get_contents("php://input"), true);

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get_des('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutos_rem(".$carrinho['id_car'].", ".$data['id_prod'].")");

    echo json_encode(array(
        "success"=>true
    ));

});
$app->delete("/carrinhoRemoveAll-:id_prod", function($id_prod){

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get_des('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutostodos_rem(".$carrinho['id_car'].", ".$id_prod.")");

    echo json_encode(array(
        "success"=>true
    ));

});
$app->run();
