<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class slider_request extends HttpRequest
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slider_index($filter)
    {
        try{
            $query = http_build_query($filter);
        $result  = $this->client->get($this->host."/api/slider?".$query);
        return  json_decode($result->getBody()->getContents());
        }catch (RequestException $requestException){
        return (object)['status_code'=>$requestException->getResponse()->getStatusCode(),
                'message'=>$requestException->getMessage()];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slider_create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slider_store($data,$token)
    {
        try {
            $result = $this->httpPost($this->host . "/apis/slider/add", $data, $token);
            return $result;
        } catch (RequestException $requestException) {
            return $requestException->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function slider_show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function slider_edit($id)
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
    public function slider_update($data,$token)
    {
        $query = http_build_query($data);
        try {
            $result = $this->client->put($this->host . '/apis/slider/change-status?' . $query, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);
            return $result->getBody()->getContents();
        } catch (RequestException $requestException) {
            return $requestException->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function slider_destroy($id)
    {
        //
    }
}
