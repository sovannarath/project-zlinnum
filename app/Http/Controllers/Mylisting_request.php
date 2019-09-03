<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class Mylisting_request extends HttpRequest
{

    public function user_statistic($token){
        try {
            $result = $this->client->get($this->host . '/apis/user/statistic', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);
            return json_decode($result->getBody()->getContents());
        } catch (RequestException $exception) {
            return (object)['status_code' => $exception->getResponse()->getStatusCode(),
                'error' => $exception->getResponse()->getBody()->getContents() ];
        }
    }
    public function list_project($data, $token,$body=[])
    {
        try {
            $result = $this->client->post($this->host . '/api/project/listing?'.http_build_query($data), [
                'body'=>json_encode($body),
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);
            return json_decode($result->getBody()->getContents());
        } catch (RequestException $exception) {
            return (object)['status_code' => $exception->getResponse()->getStatusCode(),
                'error' => $exception->getResponse()->getBody()->getContents() ];
        }




    }
}
