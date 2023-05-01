<?php 

require __DIR__ . '/vendor/autoload.php';


//Dependecias
use \App\Awesome\Economy;

$obEconomy = new Economy;

//Verifica os argumentos
if(!isset($argv[2])){
    die('E necessario enviar duas moedas!');
}

//Moedas
$coinA = $argv[1];
$coinB = $argv[2];


//Executa a Requisição na API
$dadosCotacao = $obEconomy ->consultContaao('USD','BRL');


//AJUSTA O RESPONSE
$dadosCotacao = $dadosCotacao[$coinA.$coinB] ?? [];

//Imprimi o retorno da contação
echo 'Moedas:' . $coinA .'->' . $coinB."\n";
echo 'Compra '.($dadosCotacao['bid'] ?? 'Desconhecido') . "\n";
echo 'Compra '.($dadosCotacao['ask'] ?? 'Desconhecido') . "\n";