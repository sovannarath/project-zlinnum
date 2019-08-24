<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class properties_request extends HttpRequest
{
    //
    public function update_property($data,$token){
        try{

            $result = $this->client->put($this->host."/apis/property/update",[
               'body' => json_encode($data),
               'headers' => [
                   'Authorization' => 'Bearer ' . $token,
               ]
           ]);
           $data = json_decode($result->getBody()->getContents());
          if($data->status_code==200){
              return response(['status_code'=>$data->status_code,'status'=>'OK']);
          }else{
              return response(['status_code'=>$data->status_code,'message'=>$data->message],$data->status_code);
          }

        }catch (RequestException $requestException){
            return $requestException->getMessage();
        }

    }
    public function delete_property($data, $token)
    {
        try {
            $data += ['status' => 'false'];
            $result = $this->client->put($this->host . "/apis/property/update", [
                'body' => json_encode($data),
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getMessage();
        }
    }
    public function insert_property($data, $token)
    {
        $result = "";
        try {
            $result = $this->client->post($this->host . "/apis/property/insert", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'body' => json_encode($data),
            ]);
            $respon = json_decode($result->getBody()->getContents());
            if ($result->getStatusCode() == 200) {
                return response(['status_code' => $result->getStatusCode(),
                    'result' => $respon->result]);
            }
        } catch (RequestException  $exception) {
            $respon = $exception->getResponse();
            return response(['status_code' => $respon->getStatusCode(),
                'message' => json_decode($respon->getBody()->getContents())->message],
                $respon->getStatusCode());
        }

        /*if($result->getStatusCode()==200){
            return response(['status_code'=>200,'status'=>'ok'],200);
        }else{
            return response(['status_code'=>$result->getStatusCode(),'message'=>$response->message],$result->getStatusCode());
        }*/
    }
    public function get_property_detail($id){
        try{
            $result = $this->client->get($this->host.'/api/property/detail/'.$id);

            $data = json_decode($result->getBody()->getContents());
            return $data;

        }catch (RequestException $requestException){
            return json_decode($requestException->getResponse()->getBody()->getContents());
        }


    }
    public function search_property($page = null, $data = [], $limit = null)
    {
        try {
            $query = [];
            if ($page != null) {
                $query += ['page' => $page];
            }
            if ($limit != null) {
                $query += ['limit' => $limit];
            }
            $query_build = http_build_query($query);
            $result = $this->client->post($this->host . "/api/property/filter?" . $query_build, ['body' => json_encode($data)]);
            return $result->getBody()->getContents();

        } catch (RequestException $exception) {

            return $exception->getResponse()->getBody()->getContents();
        }
    }
    public function delete_gallery($id,$token){
        try {
            $result = $this->client->delete($this->host . "/apis/property/delete/gallery", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'form_params' => [
                    'propertyID' => $id
                ]
            ]);
            return $result;
        }catch (RequestException $requestException){
            return $requestException->getResponse()->getBody()->getContents();
        }

    }

}
