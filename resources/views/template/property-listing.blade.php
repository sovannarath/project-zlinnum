@extends('template.master')
@section('title') Property Listing @endsection

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Property Listing </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{route('dashboard')}}">Admin</a></li>
                                <li><a href="#">Property Listing</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <datalist id="property_title">
                                @foreach($alltitle_property as $item)
                                <option>{{$item}}</option>
                                @endforeach
                            </datalist>

                            <div class="parameter" content="{{json_encode($parameter)}}"></div>
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                {{-- Fillter Bar --}}
                                <div class="filter-blog" @if($filter) style="display: block" @endif>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 pr-1">
                                                <div class="input-group" style="padding: 0;margin: 5px 0px;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Project</span>
                                                    </div>
                                                    <select  name="title"
                                                            class="form-control project_id" style="border-radius: 1px;">
                                                        <option value="">-- All Project --</option>
                                                        @foreach($alltitle->result as $value)
                                                            @php
                                                            if(isset($parameter['project_id']) && (int)$parameter['project_id']==$value->id){
                                                            $active = "selected='selected'";
                                                            }else{
                                                            $active = "";
                                                            }
                                                                @endphp
                                                            <option value="{{$value->id}}" {{$active}}>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                        </div>
                                        <div class="col-12 col-sm-6 pl-1">
                                            <div class="input-group" style="padding: 0;margin: 5px 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Country</span>
                                                </div>
                                                <select placeholder="Search by name" name="title"
                                                        class="form-control property-country"
                                                        style="border-radius: 1px;">
                                                    <option value="">-- All Country --</option>
                                                    @foreach($get_country->result as $value)
                                                        @if(isset($parameter['country_id']) && $value->id==$parameter['country_id'])
                                                            @php $active = 'selected="selected"'; @endphp
                                                        @else
                                                            @php $active = ''; @endphp
                                                        @endif
                                                        <option
                                                            value="{{$value->id}}" {{$active}}>{{$value->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-3 pr-1">
                                            <div class="input-group" style="padding: 0px 0rem;margin: 5px 0px;">
                                                <select
                                                    name="select" id="select" class="form-control city_filter">
                                                    <option value="">--All City/Provices--</option>
                                                    @foreach($city_list as $item)
                                                        @if(isset($parameter['city_id']) && $item->id==$parameter['city_id'])
                                                            @php $active = 'selected="selected"'; @endphp
                                                        @else
                                                            @php $active = ''; @endphp
                                                        @endif
                                                        <option
                                                            value="{{$item->id}}" {{$active}}>{{{$item->name}}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 pr-1 pl-1">
                                            <div class="input-group" style="padding: 0px 0rem;margin: 5px 0px;">
                                                <select name="select" id="select" class="form-control district_filter">
                                                    <option value="">--All Districts--</option>
                                                    @foreach($distict_data as $item)
                                                        @if(isset($parameter['district']) && strtolower($parameter['district'])== strtolower($item))
                                                            @php $active = "selected='selected'"; @endphp
                                                        @else
                                                            @php$active = ""; @endphp

                                                        @endif
                                                        <option value="{{$item}}" {{$active}}>{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 pr-1 pl-1">
                                            <div class="input-group" style="padding: 0px 0rem;margin: 5px 0px;">
                                                <select name="select" id="select" class="form-control commune_filter">
                                                    <option value="">--All Communces--</option>
                                                    @foreach($commune_data as $item)
                                                        @if(isset($parameter['commune']) && strtolower($parameter['commune'])== strtolower($item))
                                                            @php $active = "selected='selected'"; @endphp
                                                        @else
                                                            @php $active = ""; @endphp

                                                        @endif

                                                        <option {{$active}}>{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 pl-1">
                                            <div class="input-group" style="padding: 0px 0rem;margin: 5px 0px;">
                                                <select name="select" id="select" class="form-control property_types_filter">
                                                    <option value="">--All Projects--</option>
                                                    @php $property_type = ['Land','Flat','Condo','Villa'];  @endphp
                                                    @foreach($property_type as $item)
                                                        @php
                                                            if(isset($parameter['property_type']) && strtolower($parameter['property_type'])==strtolower($item)){
                                                               $property_type = "selected='selected'";
                                                               }else{
                                                               $property_type = "";

                                                               }


                                                        @endphp
                                                        <option value="{{$item}}" {{$property_type}}>{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-12 col-sm-3 pr-1">
                                                <div class="input-group" style="padding: 0px 0rem;margin:  5px 0px;">
                                                    <select
                                                        name="select" id="select" class="form-control sale_of_rent_filter">
                                                        <option value="">--Sale or Rent--</option>
                                                        @foreach(['Rent','Sale'] as $item)
                                                            @php
                                                                if(isset($parameter['sale_or_rent']) && strtolower($parameter['sale_or_rent'])==strtolower($item)){
                                                                    $activate = "selected='selected'";
                                                                }else{
                                                                    $activate ="";
                                                                }
                                                            @endphp
                                                            <option {{$item}} {{$activate}}>{{$item}}</option>
                                                        @endforeach
                                                        @php
                                                            if(isset($parameter['max_price'])){
                                                                $max_price= $parameter['max_price'];
                                                            }else{
                                                                $max_price = "";
                                                            }

                                                            if(isset($parameter['min_price'])){
                                                                $min_price= $parameter['min_price'];
                                                            }else{
                                                                $min_price = "";
                                                            }

                                                        @endphp
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-4 pr-1 pl-1">
                                                <div class="input-group" style="padding: 0px 0rem; margin:  5px 0px;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input placeholder="--Min Price" name="title" type="text"
                                                           class="form-control min_price_filter" value="{{$min_price}}"
                                                           style=" border-right: none; text-align: center;">
                                                    <input placeholder="Max Price--" name="title" type="text"
                                                           class="form-control max_price_filter" value="{{$max_price}}"
                                                           style=" border-left: none;text-align: center">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                </div>


                                            </div>
                                        <div class="col-12 col-sm-5 pl-1 pr-0">
                                            <div class="row m-0">
                                                <div class="col-12 col-sm-6 pl-0 pr-1">
                                                    <div class="input-group" style="padding: 0px 0rem; margin:  5px 0px;">
                                                        <select  name="select" id="select" class="form-control bathroom_filter">
                                                            <option value="">--All Bathrooms--</option>
                                                            @for($i=1;$i<=5;$i++)
                                                                @php
                                                                    if(isset($parameter['bathroom']) && (int)$parameter['bathroom']==$i){
                                                                        $activate = "selected='selected'";
                                                                    }else{
                                                                        $activate = "";
                                                                    }

                                                                @endphp
                                                                <option value="{{$i}}" {{$activate}}>{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 pl-1">
                                                    <div class="input-group" style="padding: 0px 0rem; margin: 5px 0px;">
                                                        <select  name="select" id="select" class="form-control bedroom_filter"
                                                                 style=" text-align: center;">
                                                            <option value="">--All bedrooms--</option>
                                                            @for($i=1;$i<=5;$i++)
                                                                @php
                                                                    if(isset($parameter['bedroom']) && (int)$parameter['bedroom']==$i){
                                                                        $activate = "selected='selected'";
                                                                    }else{
                                                                        $activate = "";
                                                                    }

                                                                @endphp
                                                                <option value="{{$i}}" {{$activate}}>{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                {{-- End Fillter Bar --}}
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-sm-12 col-md-6">

                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <span class="type-select" style="width: 100%;">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Show</span>
                                                </div>
                                                <select placeholder="Search by name" name="title" class="form-control limit-property"
                                                        style="border-radius: 1px;">
                                                    @foreach([10,20,40,100] as $value)
                                                        @php
                                                        if(isset($parameter['limit']) && $parameter['limit']==$value){
                                                        $active = "selected='selected'";
                                                        }else{
                                                        $active = "";
                                                        }

                                                            @endphp
                                                        <option value="{{$value}}" {{$active}}>{{$value}}</option>
                                                        @endforeach

                                                </select>
                                            </div>
                                            </span>
                                                </div>
                                                <div class="col-sm-6">
                                                </div>
                                                <div class="col-sm-4">
                                                <span class="type-select">
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select" style="width: 100%">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend btn-hover search-property">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                </div>
                                                @php
                                                if(isset($parameter['search'])){
                                                  $search = $parameter['search'];
                                                }else{
                                                  $search = "";
                                                }

                                                    @endphp
                                                <input type="text" class="form-control data-search-property" placeholder="Search ..." value="{{$search}}" list="property_title">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary filter-action"><i
                                                            class="fa fa-filter ml-2 mr-2"></i>Filter</button>
                                                </div>
                                            </div>
                                            </span>

                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3" style="text-align: right"> Total Page: <strong
                                        style="margin-left: 5px;">{{$paginate->total_page}}</strong> | Total Items:
                                    <strong style="margin-left: 5px;">{{$paginate->total_item}}</strong></div>

                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table"
                                               class="table table-striped table-bordered dataTable no-footer"
                                               role="grid" aria-describedby="bootstrap-data-table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending">#
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending">Image
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: auto;">Name
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: auto;">Country
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending" style="">
                                                    Property
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 250px;">Price
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 250px;">Price / sqm
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column descending"
                                                    aria-sort="ascending">Remove
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($result as $item)
                                                @php
                                                    if($item->photo!=null){
                                                     $photo = $item->photo;
                                                    }else{
                                                     $photo = asset('assets/media/catalog-default-img.webp');
                                                    }

                                                @endphp
                                                <tr class="odd">
                                                    <td class="">{{$item->id}}</td>
                                                    <td class="">
                                                        <div
                                                            style="width:100px;height: auto;background: #ded9ff;margin: 0 auto">
                                                            <img class="lazyload" data-src="{{$photo}}"></div>
                                                    </td>
                                                    <td class="" style="width: 400px;"><a class="linker" href="{{route('property-detail',['id'=>$item->id])}}">{{$item->title}}</a></td>
                                                    <td class="">
                                                        <div style="text-align: center">
                                                            @if(strtolower($item->country)=="cambodia")
                                                                <i class="flag-icon flag-icon-kh h4 mb-0" title="kh"
                                                                   id="kh"></i>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="">{{$item->type}}</td>
                                                    <td class="">{{number_format($item->unit_price,2)." $"}}</td>
                                                    <td class="">{{number_format($item->sqm_price,2)." $"}}</td>
                                                    @if(strtolower(\Illuminate\Support\Facades\Session::get('role') )!="user" && \Illuminate\Support\Facades\Session::get('role') != 'agent' )
                                                        @if($item->status=="true")
                                                            @php
                                                                $active = "checked";
                                                            @endphp
                                                        @else
                                                            @php
                                                                $active = "";
                                                            @endphp
                                                        @endif
                                                        <td><div class="v-switch-button delete-property" id="{{$item->id}}" datasrc="{{route('delete-property')}}" {{$active}}>
                                                                <label class="switch">
                                                                    <input type="checkbox" class="event-status" {{$active}}>
                                                                    <span class="slider round move-left"></span>
                                                                </label>
                                                            </div></td>
                                                       {{-- <td class="delete-property" style="text-align: center;font-size: 12px;color: darkred;cursor: pointer" id="{{$item->id}}" datasrc="{{route('delete-property')}}">
                                                        <i class="fas fa-trash"></i>
                                                    </td>--}}
                                                        @else
                                                    <td>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" readonly="true" @if($item->status=="true") checked @endif>
                                                                <label class="custom-control-label" for="customSwitch1"></label>
                                                            </div>

                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        @if(isset($data) && empty($data))
                                            <div class="alert alert-danger" role="alert">
                                                No Found
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        @php $showving = ($paginate->page * $paginate->limit) - $paginate->limit + 1;
                                        $iteminpage1= ($paginate->page * $paginate->limit);
                                        if($iteminpage1>$paginate->total_item){
                                        $iteminpage = $paginate->total_item;
                                        }else{
                                        $iteminpage = $iteminpage1;
                                        }

                                        @endphp
                                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                             aria-live="polite">
                                            Showing @php if($showving>$paginate->total_item){ echo 0; }else { echo $showving;} @endphp
                                            to {{$iteminpage}} of {{$paginate->total_item}} entries
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="bootstrap-data-table_paginate" style="text-align: right;float: right">
                                            @php echo $render_paginate @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var doc = $(document);
        $(document).ready(function () {
            $('.project-bar')
                .addClass('active show')
                .find('.property-list')
                .addClass('active')
                .closest('.project-bar')
                .find('.sub-menu')
                .addClass('show');
            $('.custom-pagination')
                .removeClass('custom-pagination')
                .addClass('custom-pagination-property');
        });
    </script>
@endsection
