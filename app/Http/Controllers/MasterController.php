<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public $date;
    public $http;
    public $property_request;
    public $project_request;
    public $event_request;
    public $banner;
    public $my_listing;
    public $user_request;
    public function __construct()
    {
        $this->date = date('d-m-Y h:i:s');
        $this->middleware('MasterAuth')
            ->except('signup','signup_post');
        $this->http = new HttpRequest();
        $this->property_request = new properties_request();
        $this->project_request = new project_request();
        $this->event_request = new event_request();
        $this->banner = new slider_request();
        $this->my_listing = new Mylisting_request();
        $this->user_request = new user_request();
    }

    static public function check_centen($str)
    {
        $newstr = [];
        $substr = explode(' ', $str);
        foreach ($substr as $value) {
            array_push($newstr, strtoupper($value[0]) . substr($value, 1, strlen($value)));
        }
        $result = join(' ', $newstr);
        return $result;
    }

}
