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
$dateCounting = $obEconomy ->consultContaao('USD','BRL');

//AJUSTA O RESPONSE
$dateCounting = $dadosCotacao[$coinA.$coinB] ?? [];

//Imprimi o retorno da contação
echo 'Moedas:' . $coinA .'->' . $coinB."\n";
echo 'Compra '.($dateCounting['bid'] ?? 'Desconhecido') . "\n";
echo 'Compra '.($dateCounting['ask'] ?? 'Desconhecido') . "\n";