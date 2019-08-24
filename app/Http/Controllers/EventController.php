<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends MasterController
{
    public function index(Request $request)
    {
        $result = $this->event_request->listing();
        if ($result->status_code == 200) {
            $data = $result->result;
            $paginate = $result->paginate;
        } else {
            $data = [];
            $paginate = [];
        }
        $render_paginate = $this->created_paginate($paginate);

        return view('template.event-listing', compact('data', 'paginate', 'render_paginate'));
    }

    public function add_event()
    {
        return view('template.new-event');
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
        return response($re, $re['status_code']);


    }
    public function delete($id){
        $token = Session::get('access');
        $data = [
        'eventID'=>$id,
        'status'=>'false'
        ];
        $this->event_request->change_status($data,$token);


    }
}
