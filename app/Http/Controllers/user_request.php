<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class user_request extends HttpRequest
{
    public function enable_email(Request $request){
        try {
            $result = $this->client->patch($this->host.'/api/enable-email',[
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
    public function change_role($data,$token){

        try {

            $result = $this->client->post($this->host . '/apis/admin/role/assign',[
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'body'=>json_encode($data)
            ]);

            return response(json_decode($result->getBody()->getContents(),true));
        } catch (RequestException $requestException) {
            $ar = json_decode($requestException->getResponse()->getBody()->getContents(),true);
            return response($ar,$requestException->getResponse()->getStatusCode());
        }
    }
    public function change_password(Request $request){
        try {
            $token = Session::get('access');
            $result = $this->client->post($this->host . '/apis/change-pass',[
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'body'=>json_encode($request->only('user_id','password','confirm_password'))
            ]);

            return response(json_decode($result->getBody()->getContents(),true));
        } catch (RequestException $requestException) {
            $ar = json_decode($requestException->getResponse()->getBody()->getContents(),true);
            return response($ar,$requestException->getResponse()->getStatusCode());
        }
    }
    public function change_status_user(Request $request){

        $data = [];
        if(isset($request->status)){
            if($request->status=="true"){
                $data += ['status'=>1];
            }else{
                $data += ['status'=>0];
            }

        }
        if(isset($request->user_id)){
            $data += ['user_id'=>$request->user_id];
        }
        try {
            $token = Session::get('access');

            $result = $this->client->put($this->host . '/apis/change-status',[
                'headers' => [
                    'Authorization' => 'Bearer '. $token,
                ],
                'body'=>json_encode($data)
            ]);
            return response(json_decode($result->getBody()->getContents(),true));
        } catch (RequestException $requestException) {
            $ar = json_decode($requestException->getResponse()->getBody()->getContents(),true);

            return response($ar,$requestException->getResponse()->getStatusCode());

        }
    }
}
