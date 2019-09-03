<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends MasterController
{
    public function index(Request $request)
    {
        $filter = [];
        if(isset($request->limit)){
            $filter += ['limit'=>$request->limit];
        }
        if(isset($request->status)){
            if($request->status=="enable"){
                $filter += ['status'=>'true'];
            }else if($request->status=="disable"){
                $filter += ['status'=>'false'];
            }

        }
        if(isset($request->page)){
            $filter += ['page'=>$request->page];
        }
        $result = $this->event_request->listing($filter);
        if ($result->status_code == 200) {
            $data = $result->result;
            $paginate = $result->paginate;
        } else {
            $data = [];
            $paginate = [];
        }
        $render_paginate = $this->created_paginate($paginate);
        $parameter = $request->all();
        return view('template.event-listing', compact('data', 'paginate', 'render_paginate','parameter'));
    }

    public function add_event()
    {
        if(strtolower(Session::get('role'))=="user"){
            $no_permission = true;
        }else{
            $no_permission = false;
        }
        return view('template.new-event',compact('no_permission'));
    }

    public function store_event(Request $request)
    {
        $data = $request->except('_token', 'file', 'event_date');
        if (isset($request->event_date)) {
            $date = date_create_from_format('d/m/Y', $request->event_date);
            $date = date_format($date, 'Y-m-d');
            $data += ['event_date' => $date];
        }
        $token = Session::get('access');
        $file = $request->file('file');
        if (isset($file)) {
            $file = curl_file_create($file, $file->getMimeType(), $file->getClientOriginalName());
            $data += ['file' => $file];
        }

        $result = $this->event_request->insert_event($data, $token);

        $re = json_decode($result, true);

        return response($re, (int)$re['status_code']);


    }
    public function delete($id,Request $request){
        $token = Session::get('access');
        $data = [
        'eventID'=>$id,
        'status'=>$request->status
        ];
        $result  = $this->event_request->change_status($data,$token);
        $data = json_decode($result,true);
        try{
        return response($data,(int)$data['status_code']);
        }catch (\Exception $ex){
        return response($result,500);
        }


    }
    public function detail($id=null){
        if($id!=null){
            $result = $this->event_request->detail($id);
            if(strtolower(Session::get('role'))=="user"){
                $no_permission = true;
            }else{
                $no_permission = false;
            }
            if($result->status_code==200){
                $data = $result->result;
                return view('template.edit-event',compact('data','no_permission'));
            }
        }
            return view('404');

    }
    public function update(Request $request){
        $data = $request->except('_token', 'file', 'event_date');
        if (isset($request->event_date)) {
            $date = date_create_from_format('d/m/Y', $request->event_date);
            $date = date_format($date, 'Y-m-d');
            $data += ['event_date' => $date];
        }
        $token = Session::get('access');
        $file = $request->file('file');
        if (isset($file)) {
            $file = curl_file_create($file, $file->getMimeType(), $file->getClientOriginalName());
            $data += ['file' => $file];
        }
        $result = $this->event_request->update_event($data, $token);
        $ar = json_decode($result,true);
        return response($ar,(int)$ar['status_code']);
    }
}
