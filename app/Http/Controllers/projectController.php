<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class projectController extends MasterController
{
    //
    public function post_image(Request $request)
    {
        $gallery = $request->gallery;
        $id   = $request->id;
        $thumbnail = $request->thumbnail;
        $length_thumbnail = $request->length_thum;
        $role = [
            'thumbnail'=>'mimes:jpeg,bmp,png,jpg',
        ];
        $message = [
            'thumbnail.mimes'=>"Thumbnail Invalid Type",
        ];
        $request->validate($role,$message);
        $file = [];
        $gallery1 = [];
        $thumbnail1 = [];
        $file = $file + ['projectID'=>$id];
        if($request->length_gallery>0){
            $result  = $this->http->post_image($gallery,$request->length_gallery,'galleries');
            if($result){
              $gallery1 =$result;
              $file  = $file + $gallery1;
            }else{
                return Response(['galleries'=>"Gallery Error"],'500');
            }
        }

        if($length_thumbnail>0){
            $result  = $this->http->post_image($thumbnail,$length_thumbnail,'thumbnail');

            if($result){
                $thumbnail1 = ['thumbnail'=>$result];
                $file  = $file + $thumbnail1;
            }else{
                return Response(['thumbnail'=>"thumbnail Error"],'500');
            }
        }
        $reporse = $this->http->sent_image($file);
        return $reporse;





    }
    public function add_project(){
        $type_project = $this->project_request->project_type();
        $datalist = json_decode($this->http->all_title_project());
        if($type_project->status_code==200){
            $type = $type_project->result;
        }else{
            $type = [];

        }
        $country = $this->http->project_country();
        if($country->status_code==200){
            $country_list = $country->result;
        }else{
            $country_list = [];
        }
        $city = $this->http->project_city();
        if($city->status_code==200){
            $citylist = $city->result;
        }else{
            $citylist = [];
        }
        $data = [
            'citylist'=>$citylist,
            'country_list'=>$country_list,
            'type'=>$type,
            'datalist'=>$datalist,
        ];
        if(strtolower(Session::get('role'))=="user"){
            $data += ['no_permission'=>true];
        }

        return view('template.add-project',$data);

    }
    public function store_project(Request $request){
        $pro_type       = $request->pro_type;
        $pro_title      = $request->title;
        $buil_date      = $request->buil_date;
        $complete_date  = $request->complete_date;
        $grr            = $request->grr;
        $downpay        = $request->downpay;
        $sale_rent      = $request->sale_rent;
        $total_price    = $request->total_price;
        $pri_s          = $request->pri_s;
        $country        = json_decode($request->country);
        $city           = $request->city;
        $address1       = $request->address1;
        $address2       = $request->address2;
        $baseinfo       = $request->baseinfo;
        $featuretitle   = $request->featuretitle;
        $featureinfo    = $request->featureinfo;
        $propertytype   = $request->propertytype;
        $tower          = $request->tower;

                $rule  = [
                   'title'      =>'required',
                   'buil_date'      =>'required',
                   'grr'            =>['required',
                       function ($attribute, $value, $fail) {
                        if($value==0){
                            $fail('Please Enter GRR');
                        }
                       }
                   ],
                   'downpay'        =>'required',
                   'total_price'    =>['required',
                       function ($attribute, $value, $fail) {
                           if($value==0){
                               $fail('Please Enter Total Price');
                           }
                       }
                   ],
                   'from_price'=>['required',function ($attribute, $value, $fail) {
                       if($value==0){
                           $fail('Please Enter From Price');
                       }
                   }
                   ],
                   'to_price'=>['required',function ($attribute, $value, $fail) {
                        if($value==0){
                            $fail('Please Enter To Price');
                        }
                    }
                    ],
                   'country'        =>'required',
                   'city'           =>'required',
                   'address1'       =>'required',
                   'baseinfo'       =>['required',
                       function ($attribute, $value, $fail) {
                           if($value=="<p><br></p>"){
                               $fail('Please Enter Basic Information');
                           }
                       }
                   ],
                   'featuretitle'   =>'required',
                   'featureinfo'    =>['required',
                       function ($attribute, $value, $fail) {
                           if($value=="<p><br></p>"){
                               $fail('Please Enter Feature Description');
                           }
                       }
                   ],

                ];
                $message = [
                        'pro_title.required'    =>"Please Project Enter Title",
                    'buil_date.required'    =>"Please Select Buill Date",
                    'grr.required'          =>"Please Enter Guaranteed Rental Returns",
                    'downpay.required'      =>"Please Enter Down Payment",
                    'total_price.required'  =>"Please Enter Total Price",
                    'country.required'      =>"Please Select Country",
                    'city.required'         =>"Please Select City",
                    'address1.required'     =>"Please Enter Address",
                    'baseinfo.required'     =>"Please Enter Basic Introductions",
                    'featuretitle.required' =>"Please Enter Feature Title",
                    'featureinfo.required'  =>"Please Enter Feature Description",
                ];
       $validation = Validator::make($request->all(),$rule,$message);


        if ($validation->fails()) {
            return  response(['message'=>$validation->errors()],422);
         }else{
            $token = Session::get('access');
            $data = [
                'address_1'     =>$address1,
                'project_type_id'=>$pro_type,
                'address_2'     =>$address2,
                'title'         =>$pro_title,
                'built_date'    =>$buil_date,
                'status'        =>true,
                'rent_or_buy'   =>$sale_rent,
                'city_id'          =>$city,
                'completed_date'=>$complete_date,
                'country'       =>$country->name,
                'country_id'    =>$country->id,
                'description'   =>$baseinfo,
                'down_payment'  =>$downpay,
                'grr'           =>$grr,
                'tower_types'    =>$tower,
                 'introductions'=>[
                     array('name'=>$featuretitle,'description'=>$featureinfo)
                 ],
                'price'=>$total_price,
                'avg_annual_rent_from'=>$request->from_price,
                'avg_annual_rent_to'=>$request->to_price,
                'property_types'=>$propertytype,
                'sqm_price'=>$pri_s,
            ];

            $result = $this->project_request->addProject($token,$data);
            return $result;
        }


    }
    public function project_listing(Request $request){
        $page = 1;

        if (isset($request->page)){
            $page = $request->page;
        }
        $limit = 10;
        if(isset($request->limit)){
            $limit = $request->limit;
        }

        $other  = ['sort_type'=>'updated_at','sort_format'=>'desc'];
        if(isset($request->country)) {
            $country_data = $request->country;
            $other += ['country' => $country_data];
        }
        if(isset($request->city)){
            $city  = $request->city;
            $other += ['city'=>$city];
        }
        if(isset($request->project_type)){
            $project_type = $request->project_type;
            $other += ['project_type'=>$request->project_type];
        }
        if(isset($request->sall_or_rent)){
            $other += ['sall_or_rent'=>$request->sall_or_rent];
        }
        if(isset($request->min_price)){
            $other += ['min_price'=>$request->min_price];
        }
        if(isset($request->max_price)){
            $other += ['max_price'=>$request->max_price];
        }
        if(isset($request->room_select) && $request->room_select!="else"){
            $other += ['room'=>$request->room_select];
        }
        $body = [];
        $country = json_decode($this->http->get_country());
        $datalist = json_decode($this->http->all_title_project());
        if(isset($request->search)){
          $body = $body + ['name'=>$request->search];
          $search = $request->search;
        }else{
            $search = false;
        }
        $body += ['sort_type'=>'updated_at','sort_format'=>'desc'];
        $response    = $this->project_request->project_listing_show($body,$page,$limit,$other);
        $project = json_decode($response['result']);
        $project_type = $response['project_type'];
        if($project->status_code==200){
            $message = "";
            $result = $project->result;
            $paginate = $project->paginate;
            $city = $response['city'];

        }else{
            $paginate = [];
            $result = [];
           $message = $project->message;
            $city = [];
        }
        if(isset($request->country)
            ||isset($request->city)
            ||isset($request->project_type)
            ||isset($request->sall_or_rent)
            ||isset($request->min_price)
            ||isset($request->max_price)
            ||isset($request->room_select)){
            $filter = 1;
        }else{
            $filter = 0;
        }


        $parameter = $request->all();
        $render_paginate = $this->created_paginate($paginate);

        return view('template.project-listing',
            compact('result',
                'city',
                'message',
                'paginate',
                'render_paginate',
                'limit','parameter','search','datalist','country','project_type','filter'));
    }
    public function change_status(Request $request){

        if(Session::has('access')){
            $token = Session::get('access');

            $data = [
                'projectID'=> $request->id,
                'status'=>$request->status
            ];
            $check = $this->project_request->update_project($data,$token);
            $check = json_decode($check);
            if($check->status_code==200){
                return response()->json($check);
            }else{
                return response('',$check->status_code)->json($check);
            }
        }else{
            return response(['status_code'=>404,'message'=>'Invalid Auth']);
        }


    }
    public function detail($id){
        $project = $this->project_request->project_detail($id);
        try { $project = json_decode($project);}catch (\Exception $exception){}
        $type_project = $this->project_request->project_type();
        if($type_project->status_code==200){
            $type = $type_project->result;
        }else{
            $type = [];

        }
        if($project->status_code==200){
            $project_result = $project->result;
        }else{
            $project_result = [];
        }

        $country = $this->http->project_country();
        if($country->status_code==200){
            $country_list = $country->result;
        }else{
            $country_list = [];
        }
        if($project->status_code!=200){
            return view('404');
        }
        $data = [
        'country_list'=>$country_list,
        'type'=>$type,
         'project_result'=>$project_result
        ];
        if(strtolower(Session::get('role'))=="user"){
            $data += ['no_permission'=>true];
        }
        return view('template.project-detail',$data);

    }
    public function update_project(Request $request){
        $pro_type       = $request->pro_type;
        $pro_title      = $request->title;
        $buil_date      = $request->buil_date;
        $complete_date  = $request->complete_date;
        $grr            = $request->grr;
        $downpay        = $request->downpay;
        $sale_rent      = $request->sale_rent;
        $total_price    = $request->total_price;
        $pri_s          = $request->pri_s;
        $country_name   = $request->country_name;
        $country_id     = $request->country_id;
        $city           = $request->city;
        $address1       = $request->address1;
        $address2       = $request->address2;
        $baseinfo       = $request->baseinfo;
        $featuretitle   = $request->featuretitle;
        $featureinfo    = $request->featureinfo;
        $propertytype   = $request->propertytype;
        $tower          = $request->tower;

        $data = [
            'address_1'     =>$address1,
            'project_type_id'=>$pro_type,
            'address_2'     =>$address2,
            'title'         =>$pro_title,
            'built_date'    =>$buil_date,
            'status'        =>true,
            'rent_or_buy'   =>$sale_rent,
            'city_id'       =>$city,
            'id'            =>$request->id,
            'completed_date'=>$complete_date,
            'country'       =>$country_name,
            'country_id'    =>$country_id,
            'description'   =>$baseinfo,
            'down_payment'  =>$downpay,
            'grr'           =>$grr,
            'tower_types'    =>$tower,
            'introductions'=>[
                array('name'=>$featuretitle,
                    'description'=>$featureinfo,
                    'id'=>$request->feature_id)
            ],
            'price'=>$total_price,
            'avg_annual_rent_from'=>$request->from_price,
            'avg_annual_rent_to'=>$request->to_price,
            'property_types'=>$propertytype,
            'sqm_price'=>$pri_s,
        ];
        $token  = Session::get('access');
        $result = $this->project_request->change_project($data,$token);
        return $result;
    }
    public function update_image(Request $request){
        $gallery = $request->gallery;
        $id   = $request->id;
        $thumbnail = $request->thumbnail;
        $length_thumbnail = $request->length_thum;
        $role = [
            'thumbnail'=>'mimes:jpeg,bmp,png,jpg',
        ];
        $message = [
            'thumbnail.mimes'=>"Thumbnail Invalid Type",
        ];
        $request->validate($role,$message);
        $file = [];
        $gallery1 = [];
        $thumbnail1 = [];
        $file = $file + ['projectID'=>$id];
        if($request->length_gallery>0){
            $token = Session::get('access');
            $delete = $this->project_request->delete_image($id,$token);
            $result  = $this->http->post_image($gallery,$request->length_gallery,'galleries');
            if($result){
                $gallery1 =$result;
                $file  = $file + $gallery1;
            }else{
                return Response(['galleries'=>"Gallery Error"],'500');
            }
        }

        if($length_thumbnail>0){
            $result  = $this->http->post_image($thumbnail,$length_thumbnail,'thumbnail');

            if($result){
                $thumbnail1 = ['thumbnail'=>$result];
                $file  = $file + $thumbnail1;
            }else{
                return Response(['thumbnail'=>"thumbnail Error"],'500');
            }
        }

        $reporse = $this->http->sent_image($file);
       return $reporse;



    }


    }
