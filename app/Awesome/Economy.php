<?php

namespace App\Awesome;

/**
 * Summary of Economia
 */
class Economy
{

    /*
    *
    * URL base da API
     * @var string
     */
    const BASE_URL = 'https://economia.awesomeapi.com.br/json';

    /**
     * Metodo responsavel por consultar a contação atual das moedas
     * @param string  $coinA
     * @param string $coinB
     * @return array
     */
    public function consultContaao($coinA,$coinB) {
        return $this->get('/last/'.$coinA. '-' . $coinB);
    }

    /**
     * get Metodo responsavel por consultar a requisição na API de economia do awesome 
     * @return array
     */
    public function get($resource) {
        //End point
        $endpoint = self::BASE_URL.$resource;

        //Configuraçoes do CURL
        $curl = curl_init();
        curl_setopt_array($curl,[
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //Response
        $response = curl_exec($curl);

        //Fecha a conexao do CURL
        curl_close($curl);

        //Retorna o resultado em array
        return json_decode($response,true);
    }
}