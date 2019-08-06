<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\MultipartStream;

class HttpRequest extends Controller
{
    public  $client;
    public function __construct()
    {
        $this->client = new Client(['headers'=>[ 'Content-Type' => 'application/json' ],'verify'=>false]);
    }

    public function loginRequest($data){
        try{
            $response = $this->client->post($this->host . "/api/sign-in", ['body' => json_encode($data)]);
            $response_result = json_decode((string)$response->getBody());

            if($response_result->status_code!=200){
                log::set_log('HttpRequest.php','18','can`t Sign In');
            }
            return $response_result;
        }catch (\Exception $exception){
            log::set_log('HttpRequest.php','18',$exception->getMessage());
        }



    }
    public function ChangeProfile($token,$data){
        $result = $this->client->put($this->host.'/apis/user/update',[
            'body'=>json_encode($data),
            'headers'=>[
                'Authorization'=>'Bearer '.$token,
            ]
        ]);
        return $result->getBody()->getContents();
    }

   public function change_profile_image($token,$file){
        $file = curl_file_create($file,$file->getMimeType(),$file->getClientOriginalName());
        $post = ['userImage'=>$file];
        $result =  $this->httpPost($this->host."/apis/user-upload-image",$post,$token);
        return $result;
    }



    public function UserDetail($token){
       try{
        $result = $this->client->get($this->host.'/apis/user-info',
            [ 'headers'=>
                ["Authorization" =>"Bearer ".$token]
                ,'verify'=>false]);

        $result = json_decode((string)$result->getBody());

        if($result->status_code=="200"){
            $user = $result->result;
            Session::put('role',$user->role);
            Session::put('id',$user->id);
            Session::put('gender',$user->gender);
            Session::put('email',$user->email);
            Session::put('first_name',$user->first_name);
            Session::put('last_name',$user->last_name);
            Session::put('phone_number',$user->phone_number);
            Session::put('photo',$user->photo);
            Session::put('account_type',$user->account_type);
            if(!Session::has('access')){
                Session::put('access',$token);
            }
            Session::put('photo',$user->photo);
            return 1;
        }else{
            return 0;
        }
       }catch (\Exception $exception){
           log::set_log('HttpRequest','45',$exception->getMessage());

       }



    }

    public function ProjectStatistic($token){
        /*$result = $this->httpPost($this->host.'/apis/project/statistic','',$token,'GET');*/
        $result  = $this->client->get($this->host.'/apis/statistic',['headers'=>['Authorization'=>"Bearer ".$token]]);

        return json_decode((string)$result->getBody());

    }
    public function httpPost($url,$data,$token){
        $headers = [
            'Content-Type: multipart/form-data',
            'Authorization: Bearer '.$token,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;

    }
    public function Projectfind($find){
        $result = $this->client->post($this->host.'/api/search',['body'=>json_encode($find)]);
        return json_decode((string)$result->getBody());
    }
    public function sent_image($file){
        $key = Session::get('access');
        $result = $this->http_image($this->host.'/apis/project/image/upload',$key,$file);
        return $result;

    }
    public function post_image($image,$len,$name){

        $count_image  = $len;
        $file = [];
        if($count_image>1){
            $subfile = [];
            foreach($image as $index => $value){
                if($value->geterror()!=1){
                    $subfile[''.$name.'[' . $index . ']']  = curl_file_create($value,$value->getMimeType(),$value->getClientOriginalName());
                }
            }
             $file = $subfile;
        }else if($count_image>0){
            if($name=="gallery"){
              if($image[0]->geterror()!=1){
                    $cfile[''.$name.'[0]'] = curl_file_create($image[0],$image[0]->getMimeType(),$image[0]->getClientOriginalName());
                    $file = $cfile;
                }else{
                    return false;
                }

            }else{
                if($image->geterror()!=1){
                    $cfile = curl_file_create($image,$image->getMimeType(),$image->getClientOriginalName());
                    $file = $cfile;
                }else{
                    return false;
                }

            }

        }else{
            return "File Not Found";
        }


      return $file;

    }
    public function project_city(){
        $result = $this->httpPost($this->host.'/api/project/city','','','GET');
        return json_decode($result);
    }
    public function project_type(){
        $result = $this->httpPost($this->host.'/api/project-types','','','GET');
        return json_decode($result);
    }
    protected function http_image($url,$token,$data){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: bearer '.$token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respon = curl_exec($ch);
        return $respon;
    }
    public function addProject($token,$data){
        $result = $this->httpPost($this->host."/apis/project/insert",json_encode($data),$token);
        /*print_r($result);*/
        return $result;
    }

    public function getuser($key,$type,$limit,$page=1,$search){
        $result = $this->client->get($this->host.'/apis/users',[
            'headers'=>[
                'Authorization'=>'Bearer '.$key,
            ],
            'query'=>[
                'page'=>$page,
                'limit'=>$limit,
                'search'=>$search
            ]

        ]);
        if($result->getStatusCode()==200){
            return $result->getBody()->getContents();
        }else{
           $response =  json_decode($result->getBody()->getContents());
            return response(['status_code'=>$response->status_code,'message'=>$response->message]);

        }



    }
    public function property($data=[]){
        /*$result = $this->httpPost('https://app.c21apex.com/api/property/filter?limit=1000&page=1',json_encode($data),'','POST');

        return $result;*/
        return (object)['status_code'=>404];
    }
    public function project_listing_show($data,$page,$limit,$other=[]){
        $city_all = [];
        $parameter = [
        'limit'=>$limit,
         'page'=>$page,
        ];
        $url = http_build_query($parameter);
        $host = $this->host."/api/search";

        $country_id = false;
        $other = (object)$other;
        if(isset($other->country)){
            $country = $this->client->get($this->host."/api/countries?name=".$other->country);
            if($country->getStatusCode()==200){
                $country_id = json_decode($country->getBody()->getContents())->result[0]->id;
                $data += ['country_id'=>$country_id];
                $query = http_build_query([
                    'country_id'=>$country_id,
                    'city_in_listing'=>'true'
                ]);
                $city = $this->client->get($this->host."/api/project/city?".$query);
                $city_all  = json_decode($city->getBody()->getContents())->result;
            }
        }
        if(isset($other->city)){
            if(isset($other->country)){
                $result =  collect();
                foreach($city_all as $value){
                   $result->push($value);
                }
               $result = $result->where('country_id',$country_id);
               $city_all = $result;
               $result = $result->where('name',$other->city);
               $city  = $result;
               if($city->count()>0){
                   $data += ['city_id'=>$city->first()->id];
               }

            }else{
                $city = $this->client->get($this->host."/api/project/city?".$query);
                $city_all  = json_decode($city->getBody()->getContents());
                if($city->getStatusCode()==200){
                    $city_id = json_decode($city->getBody()->getContents())->result[0]->id;
                    $data += ['city_id'=>$city_id];
                }
            }

        }
        $result = $this->client->post($host."?".$url,[
            'body'=>json_encode($data)
        ]);
        $item = $result->getBody()->getContents();
        $project_type = json_decode($item);
        $project_type_item = collect();
        foreach ($project_type->result as $value){
            $project_type_item->push($value);
        }
        $project_type_item = $project_type_item->groupBy('project_type')->toArray();
        $project_type_result  = array_keys($project_type_item);


        if(isset($other->project_type)){

            $project_type = $this->client->get($this->host."/api/project-types?name=".$other->project_type);

            if($project_type->getStatusCode()==200){
                $data1 = collect(json_decode($project_type->getBody()->getContents())->result);
                $id = $data1->first()->id;
                $data += ['project_type_id'=>$id];
            }

        }

        if(isset($other->sall_or_rent)){
            $data += ['rent_or_buy'=>$other->sall_or_rent];
        }
        if(isset($other->min_price)){
            $data += ['from_price'=>$other->min_price];
        }
        if(isset($other->max_price)){
            $data += ['to_price'=>$other->max_price];
        }
        if(isset($other->room)){
            $data += ['room'=>$other->room];
        }
        $result = $this->client->post($host."?".$url,[
            'body'=>json_encode($data)
        ]);
        $item = $result->getBody()->getContents();


        $return = [
            'result'=>$item,
            'city'=>$city_all,
            'project_type'=>$project_type_result,
        ];

        return $return ;

    }
    public function get_country(){
        try{
        $http = $this->client->get($this->host."/api/countries");
        if($http->getStatusCode()==200){
            return $http->getBody()->getContents();
        }else{
            log::set_log('HttpRequest.php','238',$http->getBody()->getContents());
            return $http->getBody()->getContents();
        }
        }catch (\Exception $exception){
            return response(['status_code'=>404,'message'=>$exception->getMessage()]);
        }
    }
    public function all_title_project(){
        $result = $this->client->get($this->host."/api/project/all-title-project");
        return $result->getBody()->getContents();
    }
    public function update_project($data,$token){
        $result  = $this->client->put($this->host.'/apis/visible-project',[
            'form_params' => $data,
            'headers'=>[
                'Authorization'=>'Bearer '.$token,
            ],
        ]);
        return $result->getBody()->getContents();

    }


}
