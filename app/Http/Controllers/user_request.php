<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class user_request extends HttpRequest
{
    public function enable_email(Request $request){
        try {
            $result = $this->client->patch($this->host . '/api/enable-email',[
                'body'=>json_encode($request->only('code','email'))
            ]);
            return response(json_decode($result->getBody()->getContents(),true),$result->getStatusCode());
        } catch (RequestException $requestException) {
            return response(['status_code' => $requestException->getResponse()->getStatusCode(),
                'message' => json_decode($requestException->getResponse()->getBody()->getContents())->message],$requestException->getResponse()->getStatusCode());
        }

    }
    public function sign_up(Request $request){
        try {
            $result = $this->client->post($this->host . '/api/sign-up',[
                'body'=>json_encode($request->only('first_name','last_name','gender','email','password','confirm_password','phone_number'))
            ]);
            return response(json_decode($result->getBody()->getContents(),true),$result->getStatusCode());
        } catch (RequestException $requestException) {
            return response(['status_code' => $requestException->getResponse()->getStatusCode(),
                'message' => json_decode($requestException->getResponse()->getBody()->getContents())->message],$requestException->getResponse()->getStatusCode());
        }
    }
    public function sign_up_post($data){
        try {
            $query = http_build_query($data);
            $result = $this->client->get($this->host . '/api/send-email-verification-code?'.$query,[
                'headers'=>[
                    'x-auth'=>'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJteXVzZXIifQ.3Qd2PmDWFxM1mCQtk3F4LI9tbV5FdFQAp1ySQgXeV_k'
                ]
            ]);
            return json_decode($result->getBody()->getContents());
        } catch (RequestException $requestException) {
            return (object)['status_code' => $requestException->getResponse()->getStatusCode(),
                'error' => $requestException->getResponse()->getBody()->getContents() ];
        }



    }
}
