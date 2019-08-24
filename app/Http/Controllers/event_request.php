<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class event_request extends HttpRequest
{
    public function listing()
    {
        $query = http_build_query([]);
        try {
            $result = $this->client->get($this->host . "/api/events?".$query);
            return json_decode($result->getBody()->getContents());
        } catch (RequestException $requestException) {
            return $requestException->getMessage();
        }

    }

    public function insert_event($data, $token)
    {
        try {
            $result = $this->httpPost($this->host . "/apis/events/insert", $data, $token);
            return $result;
        } catch (RequestException $requestException) {
            return $requestException->getMessage();
        }
    }
    public function change_status($data,$token){
        $query = http_build_query($data);
        $result = $this->client->get('/apis/events/change-status?'.$query,[
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        return $result;

    }
}
