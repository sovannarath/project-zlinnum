<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Exception\RequestException;

class HttpRequest extends Controller
{
    public $client;

    public function __construct()
    {
        $this->client = new Client(['headers' => ['Content-Type' => 'application/json'], 'verify' => false]);
    }

    public function project_detail($id)
    {
        try {
            $result = $this->client->get($this->host . "/api/project/detail?projectID=" . $id);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getMessage();
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

    public function all_title_property()
    {
        $title_property = [];
        $result = $this->client->post($this->host . "/api/property/listing", [
            'form_params' => [
                'limit' => 0
            ]
        ]);
        if ($result->getStatusCode() == 200) {

            $respon = json_decode($result->getBody()->getContents());
            $coller = collect($respon->result)->unique('title');
            foreach ($coller as $item) {
                array_push($title_property, $item->title);
            }
        }
        return $title_property;


    }

    public function get_city_from_property($country_id)
    {
        try {
            $query = http_build_query(['country_id' => $country_id]);
            $result = $this->client->get($this->host . '/api/city_property?' . $query);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getResponse()->getBody()->getContents();
        }

    }

    public function get_commune($district)
    {
        try {
            $query = http_build_query(['district' => $district]);
            $result = $this->client->get($this->host . '/api/commune?' . $query);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getResponse()->getBody()->getContents();
        }
    }

    public function get_distict($city_id)
    {
        try {
            $query = http_build_query(['city_id' => $city_id]);
            $result = $this->client->get($this->host . '/api/district?' . $query);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getResponse()->getBody()->getContents();
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


    public function loginRequest($data)
    {
        try {
            $response = $this->client->post($this->host . "/api/sign-in", ['body' => json_encode($data)]);
            $response_result = json_decode((string)$response->getBody());

            if ($response_result->status_code != 200) {
                log::set_log('HttpRequest.php', '18', 'can`t Sign In');
            }
            return $response_result;
        } catch (\Exception $exception) {
            log::set_log('HttpRequest.php', '18', $exception->getMessage());
        }


    }

    public function ChangeProfile($token, $data)
    {
        $result = $this->client->put($this->host . '/apis/user/update', [
            'body' => json_encode($data),
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        return $result->getBody()->getContents();
    }

    public function change_profile_image($token, $file)
    {
        $file = curl_file_create($file, $file->getMimeType(), $file->getClientOriginalName());
        $post = ['userImage' => $file];
        $result = $this->httpPost($this->host . "/apis/user-upload-image", $post, $token);
        return $result;
    }


    public function UserDetail($token)
    {
        try {
            $result = $this->client->get($this->host . '/apis/user-info',
                ['headers' =>
                    ["Authorization" => "Bearer " . $token]
                    , 'verify' => false]);

            $result = json_decode((string)$result->getBody());

            if ($result->status_code == "200") {
                $user = $result->result;
                Session::put('role', $user->role);
                Session::put('id', $user->id);
                Session::put('gender', $user->gender);
                Session::put('email', $user->email);
                Session::put('first_name', $user->first_name);
                Session::put('last_name', $user->last_name);
                Session::put('phone_number', $user->phone_number);
                Session::put('photo', $user->photo);
                Session::put('account_type', $user->account_type);
                if (!Session::has('access')) {
                    Session::put('access', $token);
                }
                Session::put('photo', $user->photo);
                return 1;
            } else {
                return 0;
            }
        } catch (\Exception $exception) {
            log::set_log('HttpRequest', '45', $exception->getMessage());

        }


    }

    public function ProjectStatistic($token)
    {
        /*$result = $this->httpPost($this->host.'/apis/project/statistic','',$token,'GET');*/
        $result = $this->client->get($this->host . '/apis/statistic', ['headers' => ['Authorization' => "Bearer " . $token]]);

        return json_decode((string)$result->getBody());

    }

    public function httpPost($url, $data, $token)
    {
        $headers = [
            'Content-Type: multipart/form-data',
            'Authorization: Bearer ' . $token,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;

    }

    public function Projectfind($find)
    {
        $result = $this->client->post($this->host . '/api/search', ['body' => json_encode($find)]);
        return json_decode((string)$result->getBody());
    }

    public function sent_image($file)
    {
        $key = Session::get('access');
        $result = $this->httpPost($this->host . '/apis/project/image/upload', $file, $key);
        return $result;
    }

    public function sent_image_property($file)
    {
        $key = Session::get('access');
        $result = $this->httpPost($this->host . '/apis/property/upload/gallery', $file, $key);
        return $result;
    }

    public function post_image($image, $len, $name)
    {
        $count_image = $len;
        $file = [];
        if ($count_image > 1) {
            $subfile = [];
            foreach ($image as $index => $value) {
                try {
                    if ($value->getError() != 1) {
                        $subfile['' . $name . '[' . $index . ']'] = curl_file_create($value, $value->getMimeType(), $value->getClientOriginalName());
                    }
                } catch (\Exception $exception) {
                    return false;
                }
            }
            $file = $subfile;
        } else if ($count_image > 0) {
            if ($name == "gallery") {
                try {
                    if ($image[0]->getError() != 1) {
                        $cfile['' . $name . '[0]'] = curl_file_create($image[0], $image[0]->getMimeType(), $image[0]->getClientOriginalName());
                        $file = $cfile;
                    } else {
                        return false;
                    }
                } catch (\Exception $exception) {
                    return false;
                }


            } else {
                try {


                    if ($image->getError() != 1) {
                        $cfile = curl_file_create($image, $image->getMimeType(), $image->getClientOriginalName());
                        $file = $cfile;
                    } else {
                        return false;
                    }
                } catch (\Exception $exception) {
                    return false;
                }

            }

        } else {
            return "File Not Found";
        }


        return $file;

    }

    public function project_country()
    {
        $result = $this->client->get($this->host . '/api/countries');
        if ($result->getStatusCode() == 200) {
            $result = json_decode($result->getBody()->getContents());
        } else {
            $result = (object)['status_code' => 404, 'can`t get project Country'];
        }
        return $result;
    }

    public function project_city()
    {
        $result = $this->client->get($this->host . '/api/project/city');
        if ($result->getStatusCode() == 200) {
            $result = json_decode($result->getBody()->getContents());
        } else {
            $result = (object)['status_code' => 404, 'can`t get project city'];
        }
        return $result;
    }

    public function project_type()
    {
        $result = $this->client->get($this->host . '/api/project-types');
        if ($result->getStatusCode() == 200) {
            return json_decode($result->getBody()->getContents());
        } else {
            return (object)['status_code' => 404, 'message' => 'can`t get project_type'];
        }

    }

    protected function http_image($url, $token, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: bearer ' . $token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respon = curl_exec($ch);
        return $respon;
    }

    public function addProject($token, $data)
    {
        $result = $this->client->post($this->host . "/apis/project/insert", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'body' => json_encode($data)
        ]);
        $data = json_decode($result->getBody()->getContents());
        if ($result->getStatusCode() == 200 && $data->status_code == 200) {
            return response(['status_code' => $data->status_code, 'result' => $data->result]);
        } else {
            if (isset($data->message)) {
                $message = $data->message;
            } else {
                $message = "can`t add project";
            }
            return response(['status_code' => 404, 'messge' => $message], 404);
        }

    }

    public function getuser($key, $type, $limit, $page = 1, $search)
    {
        $result = $this->client->get($this->host . '/apis/users', [
            'headers' => [
                'Authorization' => 'Bearer ' . $key,
            ],
            'query' => [
                'page' => $page,
                'limit' => $limit,
                'search' => $search
            ]

        ]);
        if ($result->getStatusCode() == 200) {
            return $result->getBody()->getContents();
        } else {
            $response = json_decode($result->getBody()->getContents());
            return response(['status_code' => $response->status_code, 'message' => $response->message]);

        }


    }

    public function property($data = [])
    {
        /*$result = $this->httpPost('https://app.c21apex.com/api/property/filter?limit=1000&page=1',json_encode($data),'','POST');

        return $result;*/
        return (object)['status_code' => 404];
    }

    public function country_and_city(&$data, &$other)
    {
        $other = (object)$other;
        $city_all = [];
        if (isset($other->country)) {
            $country = $this->client->get($this->host . "/api/countries?name=" . $other->country);
            if ($country->getStatusCode() == 200) {
                $country_id = json_decode($country->getBody()->getContents())->result[0]->id;
                $data += ['country_id' => $country_id];
                $query = http_build_query([
                    'country_id' => $country_id,
                    'city_in_listing' => 'true'
                ]);
                $city = $this->client->get($this->host . "/api/project/city?" . $query);
                $city_all = json_decode($city->getBody()->getContents())->result;
            }
        }
        if (isset($other->city)) {
            if (isset($other->country)) {
                $result = collect();
                foreach ($city_all as $value) {
                    $result->push($value);
                }
                $result = $result->where('country_id', $country_id);
                $result = $result->where('name', $other->city);
                $city = $result;
                if ($city->count() > 0) {
                    $data += ['city_id' => $city->first()->id];
                }

            } else {
                $city = $this->client->get($this->host . "/api/project/city?" . $query);
                if ($city->getStatusCode() == 200) {
                    $city_id = json_decode($city->getBody()->getContents())->result[0]->id;
                    $data += ['city_id' => $city_id];
                }
            }

        }
    }

    public function project_listing_show($data, $page, $limit, $other = [])
    {
        $city_all = [];
        $parameter = [
            'limit' => $limit,
            'page' => $page,
        ];
        $url = http_build_query($parameter);
        $host = $this->host . "/api/search";

        $country_id = false;
        $this->country_and_city($data, $other);
        $result = $this->client->post($host . "?" . $url, [
            'body' => json_encode($data)
        ]);
        $item = $result->getBody()->getContents();
        $project_type = json_decode($item);
        $project_type_item = collect();
        foreach ($project_type->result as $value) {
            $project_type_item->push($value);
        }
        $project_type_item = $project_type_item->groupBy('project_type')->toArray();
        $project_type_result = array_keys($project_type_item);


        if (isset($other->project_type)) {

            $project_type = $this->client->get($this->host . "/api/project-types?name=" . $other->project_type);

            if ($project_type->getStatusCode() == 200) {
                $data1 = collect(json_decode($project_type->getBody()->getContents())->result);
                $id = $data1->first()->id;
                $data += ['project_type_id' => $id];
            }

        }

        if (isset($other->sall_or_rent)) {
            $data += ['rent_or_buy' => $other->sall_or_rent];
        }
        if (isset($other->min_price)) {
            $data += ['from_price' => $other->min_price];
        }
        if (isset($other->max_price)) {
            $data += ['to_price' => $other->max_price];
        }
        if (isset($other->room)) {
            $data += ['room' => $other->room];
        }
        $result = $this->client->post($host . "?" . $url, [
            'body' => json_encode($data)
        ]);
        $item = $result->getBody()->getContents();


        $return = [
            'result' => $item,
            'city' => $city_all,
            'project_type' => $project_type_result,
        ];

        return $return;

    }

    public function get_country()
    {
        try {
            $http = $this->client->get($this->host . "/api/countries");
            if ($http->getStatusCode() == 200) {
                return $http->getBody()->getContents();
            } else {
                log::set_log('HttpRequest.php', '238', $http->getBody()->getContents());
                return $http->getBody()->getContents();
            }
        } catch (\Exception $exception) {
            return response(['status_code' => 404, 'message' => $exception->getMessage()]);
        }
    }

    public function all_title_project()
    {
        $result = $this->client->get($this->host . "/api/project/all-title-project");
        return $result->getBody()->getContents();
    }

    public function update_project($data, $token)
    {
        $result = $this->client->put($this->host . '/apis/visible-project', [
            'form_params' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);
        return $result->getBody()->getContents();

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

    public function get_city($country_id = null, $city_in_listing = "false")
    {
        $data = [
            'city_in_listing' => $city_in_listing,
        ];
        if ($country_id != null) {
            $data += ['country_id' => $country_id];
        }

        $query = http_build_query($data);
        $result = $this->client->get($this->host . "/api/project/city?" . $query);
        $raw = json_decode($result->getBody()->getContents());
        if ($result->getStatusCode() == 200) {
            return response(['status_code' => 200, 'result' => $raw->result]);
        } else {
            return response(['status_code' => $raw->status_code, 'message' => $raw->message], $raw->status_code);
        }

    }

    public function change_project($data, $token)
    {

        try {
            $result = $this->client->put($this->host . "/apis/project/update", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'body' => json_encode($data),
            ]);
            $final_result = json_decode($result->getBody()->getContents());
            if ($final_result->status_code == 200) {
                return response(['status_code' => $final_result->status_code, 'status' => 'OK', 'result' => ['id' => $data['id']]]);
            } else {
                return response(['status_code' => $final_result->status_code, 'message' => $final_result->message], $final_result->status_code);
            }

        } catch (RequestException $exception) {
            return response(['status_code' => $exception->getResponse()->getStatusCode(), 'message' => 'invalid Body', 'dbug' => json_encode($data)], $exception->getResponse()->getStatusCode());
        }

    }

    public function delete_image($id, $token)
    {
        try {
            $result = $this->client->delete($this->host . "/apis/project/image/upload", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'body' => json_encode(['projectID' => $id]),
            ]);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getMessage();
        }


    }

    public function property_detail(){
        $result = $this->client->post

    }


}
