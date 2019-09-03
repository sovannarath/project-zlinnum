<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class slider extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $filter = [];
        if(isset($request->limit)){
            $filter += ['limit'=>$request->limit];
        }
        if(isset($request->status) && $request->status!="all"){
            if($request->status=="enable"){
                $check = "true";
            }else{
                $check = "false";
            }
            $filter += ['status'=>$check];
        }
        if(isset($request->page)){
            $filter += ['page'=>$request->page];
        }
       $result =  $this->banner->slider_index($filter);
       if($result->status_code==200){
           $data = $result->result;
           $paginate = $result->paginate;
       }else {
           $data = [];
           $paginate = [];
       }
        $render_paginate = $this->created_paginate($paginate);
        $parameter = $request->all();
        return view('template.list-banner',compact('data','render_paginate','paginate','parameter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 'file');
        $token = Session::get('access');
        $file = $request->file('file');
        if (isset($file)) {
            $file = curl_file_create($file, $file->getMimeType(), $file->getClientOriginalName());
            $data += ['file' => $file];
        }

        $result = $this->banner->slider_store($data, $token);
        $re = json_decode($result, true);
        return response($re, (int)$re['status_code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $token = Session::get('access');
        $data = [
            'id'=>$id,
            'status'=>$request->status
        ];
        $result  =$this->banner->slider_update($data,$token);
        $data = json_decode($result,true);
        try{
            return response($data,(int)$data['status_code']);
        }catch (\Exception $ex){
            return response($result,500);
        }
    }
}
