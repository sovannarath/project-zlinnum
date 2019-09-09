<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HttpRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use GuzzleHttp\Client;






class MasterLoginController extends Controller
{
    //
    public $http;
    public $client;
    public function __construct()
    {
        parent::__construct();
        $this->middleware('LoginCheck')->except('logout','LoginPost');
        $this->http = $http  = new HttpRequest();
        $this->client = new Client();


    }

    public function login(){
        return view('auth.masterlogin');
    }
    public function LoginPost(Request $request){
        $email = $request->email;
        $password = $request->pass;
        $remember = $request->remember;
        $rule = [
            'email'=>'required|email',
            'pass'=>'required|min:8',

        ];
        $message = [
            'email.required' =>'Please Enter Email',
            'email.email' =>'Your Enter Not Email',
            'pass.required' =>'Please Enter Password',
            'pass.min' =>'The Password must be 8 character',
            ];

        $validation = Validator::make($request->all(),$rule,$message);

        if($validation->fails()){
            return response(['errors'=>$validation->errors(),
                'field'=>['email'=>$request->email]
            ],"403");
        }else{

            $data = [
                'email'=> $email,
                'password'=> $password
            ];
            $response_result =  $this->http->loginRequest($data);
            if(isset($response_result->status_code) &&  $response_result->status_code=="200" ) {
                if($remember!="false"){
                    Cookie::queue('access',$response_result->result->access_token,60*24*30);
                    $check =  $this->http->UserDetail($response_result->result->access_token);
                    if(!$check){
                        return response(
                            ['errors'=>['pass'=>['Incorrect Password']],'field'=>['email'=>$request->email]],"403");
                    }else{
                        return response()->json([
                            'status'=>'ok',
                            'status_code'=>"200",
                            'data'=>route('dashboard')
                        ]);
                    }

                }else{
                    $check = $this->http->UserDetail($response_result->result->access_token);
                    if($check){
                        return response()->json([
                            'status'=>'ok',
                            'status_code'=>"200",
                            'data'=>route('dashboard')
                        ]);
                    }else{
                        return response(
                            ['errors'=>['pass'=>['Incorrect Password']],'field'=>['email'=>$request->email]],"403");
                    }
                }

            }else{
                return response(
                    ['errors'=>['pass'=>['Incorrect Password']],'field'=>['email'=>$request->email]],"403");
            }
        }




    }
    public function logout(){

        Session::forget('access');
        Session::forget('role');
        Session::forget('id');
        Session::forget('gender');
        Session::forget('email');
        Session::forget('first_name');
        Session::forget('last_name');
        Session::forget('phone_number');
        Session::forget('photo');
        Session::forget('account_type');
        Session::forget('access');
        Cookie::queue('access',null,-1);
        return redirect()->route('show-login');
    }
    public function signup(){
        $enable_email = url('api/enable-email');
        return view('auth.Register',['enable_email'=>$enable_email,'signup_post'=>url('api/sign-up-post')]);
    }
    public function signup_post(Request $request){
        $rule = [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
            'gender'=>'required'
        ];
        $validator = Validator::make($request->all(),$rule);
        if($validator->fails()){
            return \response(['status_code'=>400,'message'=>$validator->errors()],400);
        }else{
            $res = new user_request();
            $result = $res->sign_up_post(['email'=>$request->email]);
            if($result->status_code==200){
                return \response((array)$result);
            }else{
                try{
                    return \response(['status_code'=>$result->status_code,'message'=>['email_error'=>$result->message]],$result->status_code);
                }catch (\Exception $error){
                    return \response(['status_code'=>$result->status_code,'message'=>['general'=>'Error Server Please Try Again Later','dbug'=>$result]],$result->status_code);
                }

            }

        }

    }
}
