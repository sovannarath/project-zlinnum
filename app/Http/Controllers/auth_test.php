<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class auth_test extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('api_auth');
    }

    public function index(){

    }
    public function login(Request $request){

       $result =   $this->httpPost('https://app.c21apex.com/api/sign-in',['email'=>$request->email,'password'=>$request->password]);

    }
    protected function httpPost($url, $data)
    {
        $cURL = curl_init($url);
        curl_setopt($cURL, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($cURL, CURLOPT_POST, 1);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
        curl_close($cURL);
        return $result;

    }

}
