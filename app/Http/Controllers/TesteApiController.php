<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TesteApiController extends Controller
{


    protected function chamadaApi()
    {
        /*
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');

                echo $res->getBody();
                // '{"id": 1420053, "name": "guzzle", ...}'
        */

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET',
            'http://api.sefaz.al.gov.br/sfz_nfce_api/api/public/consultarPrecosPorDescricao',
            ['headers' => [
                'Content-type' => 'application/json',
                'AppToken' => '84a57ce11ac1cf23adc5bd70b822f9db50dca9dd'
            ]],
            ['body' => [
                'descricao' => 'coca',
                'dias' => 3,
                'latitude' => -9.6432331,
                'longitude' => -35.7190686,
                'raio' => 15
            ]]);

        echo $res->getBody();
    }

    protected function chamadaApi2()
    {

        $client = new Client();

        $response = $client->post('http://api.sefaz.al.gov.br/sfz_nfce_api/api/public/consultarPrecosPorDescricao', [
            'headers' => [
                'Content-Type' => 'application/json',
                'AppToken' => '84a57ce11ac1cf23adc5bd70b822f9db50dca9dd'
            ],
            'body' => json_encode([
                'descricao' => 'coca',
                'dias' => 3,
                'latitude' => -9.6432331,
                'longitude' => -35.7190686,
                'raio' => 15
            ])

        ]);

        $body = $response->getBody();

        echo $body;

    }

}
