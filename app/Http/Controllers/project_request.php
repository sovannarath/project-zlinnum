<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class project_request extends HttpRequest
{
    public function project_detail($id)
    {
        try {
            $result = $this->client->get($this->host . "/api/project/detail?projectID=" . $id);
            return $result->getBody()->getContents();
        } catch (RequestException $exception) {
            return $exception->getMessage();
        }

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

}
