<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PropertyController extends MasterController
{

    public function index(Request $request)
    {
        $data = ['sort_type' => 'id', 'sort_type_mode' => 'DESC', 'status' => 'true'];
        $page = "";
        $limit = "";
        $distict_data = [];
        $city_list = [];
        $commune_data = [];
        $alltitle = json_decode($this->http->all_title_project());
        $alltitle_property = $this->http->all_title_property();
        $get_country = json_decode($this->http->get_country());
        $filter = false;
        if (isset($request->page)) {
            $page = $request->page;
        }
        if (isset($request->search)) {
            $data += ['title' => $request->search];
        }
        if (isset($request->limit)) {
            $limit = $request->limit;
        }
        if (isset($request->project_id)) {
            $data += ['project_id' => $request->project_id];
            $filter = true;
        }
        if (isset($request->country_id)) {
            $data += ['country_id' => $request->country_id];
            $filter = true;
            $result = $this->http->get_city_from_property($request->country_id);
            if (isset($result)) {
                $city_list = json_decode($result)->result->city;
            }
        };
        if (isset($request->city_id)) {
            $distict = $this->http->get_distict($request->city_id);
            $data += ['city_id' => $request->city_id];
            if (isset($distict)) {
                $distict_data = json_decode($distict)->result->district;
            }
            $filter = true;
        }
        if (isset($request->district)) {
            $data += ['district' => $request->district];
            $commune = $this->http->get_commune($request->district);
            if (isset($commune)) {
                $commune_data = json_decode($commune)->result->commune;
            }
            $filter = true;
        }
        if (isset($request->commune)) {
            $data += ['commune' => $request->commune];
            $filter = true;
        }
        if (isset($request->property_type)) {
            $data += ['type' => $request->property_type];
            $filter = true;
        }
        if (isset($request->sale_or_rent)) {
            $data += ['sale_or_rent' => $request->sale_or_rent];
            $filter = true;
        }
        if (isset($request->min_price)) {
            $data += ['from_price' => $request->min_price];
            $filter = true;
        }
        if (isset($request->max_price)) {
            $filter = true;
            $data += ['to_price' => $request->max_price];
        }
        if (isset($request->bathroom)) {
            $data += ['bathroom' => $request->bathroom];
            $filter = true;
        }
        if (isset($request->bedroom)) {
            $data += ['bedroom' => $request->bedroom];
            $filter = true;
        }
        $result = $this->property_request->search_property($page, $data, $limit);

        $repon = json_decode($result);

        if (isset($repon->status_code) && $repon->status_code == 200) {
            $result = $repon->result;
        } else {
            $result = [];
        }
        if (isset($repon->paginate)) {
            $paginate = $repon->paginate;
        } else {
            $paginate = (object)['total_page' => 0, 'total_item' => 0, 'page' => 0, 'limit' => 0];
        }
        $render_paginate = $this->created_paginate($paginate, 'custom-pagination-property');
        $parameter = $request->all();
        return view('template.property-listing',
            compact('result',
                'paginate',
                'render_paginate',
                'parameter',
                'filter',
                'alltitle',
                'get_country',
                'city_list',
                'distict_data',
                'commune_data',
                'alltitle_property'));
    }

    public function store_property(Request $request)
    {
        $country = "";
        if (isset($request->country)) {
            $country = json_decode($request->country)->id;
        }
        $general = [
            'country' => $country,
            'title' => $request->property_title, // ☑
            'commune' => $request->sangkat, // ☑
            'city' => $request->city,// ☑
            'description' => $request->descriptionproperty,// ☑
            'district' => $request->khan,// ☑
            'land_length' => $request->land_length,// ☑
            'land_width' => $request->land_width,// ☑
            'lat' => $request->lat,// ☑
            'lng' => $request->lng,// ☑
            'rent_or_sell' => $request->sale_or_rent,// ☑
            'show_map' => $request->show_map,
            'street_no' => $request->st_no,// ☑
            'sqm_price' => $request->sqm_price,// ☑
            'total_land_area' => $request->total_land,// ☑
            'unit_price' => $request->unitprice,// ☑
            'village' => $request->village,// ☑
            /* Property Type Select */
            'property_types' => $request->property_select
        ];
        if ($request->enable_project == "true") {
            $general += ['project_id' => $request->project_id];// ☑
        }
        $property = [
            'building_width' => $request->buildingwidth,// ☑
            'building_height' => $request->buildingheight,// ☑
            'bathroom' => $request->bathroom,// ☑
            'bedroom' => $request->bed_room,// ☑
            'living_room' => $request->living_room,// ☑
            'dinning_room' => $request->dinning_room,// ☑
            'kitchen' => $request->kitchen,// ☑
            'air_conditioner' => $request->aircon,// ☑
            'parking' => $request->parking,// ☑
            'balcony' => $request->balcony,// ☑

            'common_area' => $request->commentarea,// ☑
            'floor_no' => $request->floor_no,// ☑
            'house_no' => $request->house_no,// ☑

            'private_area' => $request->private_area,// ☑
            'total_area' => $request->total_build_area,// ☑
            'total_building' => $request->total_build_area,// ☑
            'mazzaninefloor' => $request->mazzaninefloor,// ☑


        ];
        $neighborhood = [];
        if (isset($request->location)) {
            foreach ($request->location as $item) {
                array_push($neighborhood, ['address' => $item['address'], 'distance' => $item['property']]);
            }
        }
        $data = $property + $general + ['neighborhood' => $neighborhood];
        $token = Session::get('access');
        $result = $this->property_request->insert_property($data, $token);
        return $result;

    }
    public function update_image(Request $request){
        $gallery = $request->gallery;
        $id = $request->id;
        $token = Session::get('access');
        $this->property_request->delete_gallery($id,$token);

        $file = [];
        $gallery1 = [];
        $file += ['propertyID' => $id];
        if ($request->length_gallery > 0) {
            $result = $this->http->post_image($gallery, $request->length_gallery, 'galleries');
            if ($result) {
                $file += $result;
            } else {
                return Response(['galleries' => "Gallery Error"], '500');
            }
        }
        $reporse = $this->http->sent_image_property($file);
        return $reporse;

    }

    public function post_image(Request $request)
    {
        $gallery = $request->gallery;
        $id = $request->id;
        $file = [];
        $gallery1 = [];
        $file += ['propertyID' => $id];
        if ($request->length_gallery > 0) {
            $result = $this->http->post_image($gallery, $request->length_gallery, 'galleries');
            if ($result) {
                $file += $result;
            } else {
                return Response(['galleries' => "Gallery Error"], '500');
            }
        }
        $reporse = $this->http->sent_image_property($file);
        return $reporse;

    }

    public function delete($id)
    {
        if (isset($id)) {
            $token = Session::get('access');
            $data = ['id' => $id];
            $result = $this->property_request->delete_property($data, $token);
            return $result;
        } else {
            return response(['status_code' => 400, 'message' => 'invalid id']);
        }


    }

    public function detail($id)
    {
      $data = $this->property_request->get_property_detail($id);
      if($data->status_code==404){
          return view('404');
      }
      $data = $data->result;
      $datalist = json_decode($this->http->all_title_project());
      $country = $this->http->project_country();
        if($country->status_code==200){
            $country_list = $country->result;
        }else{
            $country_list = [];
      }
      return view('template.property-detail',compact('country_list','datalist','data'));

    }
    public function update_property(Request $request){
        $country = "";
        if (isset($request->country)) {
            $country = json_decode($request->country)->id;
        }
        $general = [
            'id'=>$request->id,
            'country' => $country,
            'title' => $request->property_title, // ☑
            'commune' => $request->sangkat, // ☑
            'city' => $request->city,// ☑
            'description' => $request->descriptionproperty,// ☑
            'district' => $request->khan,// ☑
            'land_length' => $request->land_length,// ☑
            'land_width' => $request->land_width,// ☑
            'lat' => $request->lat,// ☑
            'lng' => $request->lng,// ☑
            'rent_or_sell' => $request->sale_or_rent,// ☑
            'show_map' => $request->show_map,
            'street_no' => $request->st_no,// ☑
            'sqm_price' => $request->sqm_price,// ☑
            'total_land_area' => $request->total_land,// ☑
            'unit_price' => $request->unitprice,// ☑
            'village' => $request->village,// ☑
            /* Property Type Select */
            'property_types' => $request->property_select
        ];
        if ($request->enable_project == "true") {
            $general += ['project_id' => $request->project_id,'enable_project'=>$request->enable_project];// ☑
        }else{
            $general += ['enable_project'=>$request->enable_project];// ☑
        }
        $property = [
            'building_width' => $request->buildingwidth,// ☑
            'building_height' => $request->buildingheight,// ☑
            'bathroom' => $request->bathroom,// ☑
            'bedroom' => $request->bed_room,// ☑
            'living_room' => $request->living_room,// ☑
            'dinning_room' => $request->dinning_room,// ☑
            'kitchen' => $request->kitchen,// ☑
            'air_conditioner' => $request->aircon,// ☑
            'parking' => $request->parking,// ☑
            'balcony' => $request->balcony,// ☑

            'common_area' => $request->commentarea,// ☑
            'floor_no' => $request->floor_no,// ☑
            'house_no' => $request->house_no,// ☑

            'private_area' => $request->private_area,// ☑
            'total_area' => $request->total_build_area,// ☑
            'total_building' => $request->total_build_area,// ☑
            'mazzaninefloor' => $request->mazzaninefloor,// ☑


        ];
        $neighborhood = [];
        if (isset($request->location)) {
            foreach ($request->location as $item) {
                array_push($neighborhood, ['address' => $item['address'], 'distance' => $item['property']]);
            }
        }
        $data = $property + $general + ['neighborhoods' => $neighborhood];
        $token = Session::get('access');
        $result = $this->property_request->update_property($data, $token);
        return $result;
    }


}
