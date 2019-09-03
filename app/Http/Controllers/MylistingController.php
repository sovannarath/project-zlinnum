<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MylistingController extends MasterController
{
    public function index(Request $request){
        $user = new UserController();
        $token = Session::get('access');
        $body = [];
        $parameter = [
            'by_user'=>"true"
        ];
        if(isset($request->limit)){
            $parameter += ['limit'=>$request->limit];
        }
        if(isset($request->page)){
            $parameter += ['page'=>$request->page];
        }
        if(isset($request->status)){
            if($request->status=="enable"){
                $body += ['status'=>"true"];
            }else if($request->status=="disable"){
                $body += ['status'=>"false"];
            }else{
                $body += ['status'=>"all"];
            }

        }

        if(isset($request->search)){
            $parameter += ['title'=>$request->search];
        }
        $result = $this->my_listing->list_project($parameter,$token,$body);
        if($result->status_code==200){
            $paginate = $result->paginate;
            $result = $result->result;

        }else{
            $result = [];
            $paginate = [];
        }
        $statistic = $this->my_listing->user_statistic($token);
        if ($statistic->status_code==200){
            $statistic_result = $statistic->result->project;
        }else{
            $statistic_result = [];
        }
        $userinfo = $user->show_information();
        $render = $this->created_paginate($paginate);
        $parameter = $request->all();
        return view('template.mylisting',compact('result','render','paginate','userinfo','statistic_result','parameter'));

    }
}
