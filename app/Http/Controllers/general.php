<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HttpRequest;

class general extends Controller
{
    public $http;
    public function __construct(HttpRequest $httpRequest)
    {
        parent::__construct();
        $this->http = $httpRequest;
    }
    public function city(Request $request){
        $country_id = null;
        if(isset($request->country_id)){
        $country_id = $request->country_id;
        }
        $result = $this->http->get_city($country_id);
        return $result;
    }
}
