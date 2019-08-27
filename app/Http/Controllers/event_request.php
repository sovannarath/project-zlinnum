<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class event_request extends HttpRequest
{
    public function listing($filter = [])
    {
        $query = http_build_query($filter);
        try {
            $result = $this->client->get($this->host . "/api/events?" . $query);
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
    public function update_event($data, $token)
    {
        try {
            $result = $this->httpPost($this->host . "/apis/events/update", $data, $token);
            return $result;
        } catch (RequestException $requestException) {
            return $requestException->getMessage();
        }
    }

    public function change_status($data, $token)
    {
        $query = http_build_query($data);
        try {
            $result = $this->client->put($this->host . '/apis/events/change-status?' . $query, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);
            return $result->getBody()->getContents();
        } catch (RequestException $requestException) {
            return $requestException->getMessage();
        }

    }

    public function detail($id)
    {
        try {
            $result = $this->client->get($this->host . '/api/events/detail?eventID='.$id);
            return json_decode($result->getBody()->getContents());
        } catch (RequestException $requestException) {
            return (object)['status_code' => $requestException->getResponse()->getStatusCode(),
                    'error' => $requestException->getResponse()->getBody()->getContents() ];
        }
    }
}
