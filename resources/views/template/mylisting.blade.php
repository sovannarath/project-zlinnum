@extends('template.master')
@section('title') My Listing @endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/custom/css/my-listing.css')}}">
@endsection
@section('content')
    <div class="link-change-status" datasrc="{{route('change-status-project')}}"></div>
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>My Listing</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{route('dashboard')}}">Admin</a></li>
                                <li><a href="#">My Listing</a></li>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body" style="padding: 0">
                                    <div class="parameter" content="{{json_encode($parameter)}}"></div>
                                    <div class="main">
                                        <div class="row p-0 m-0 main1">
                                            <div class="col-lg-4">
                                                <div class="profile-image animated fadeInDown" style="background-image: url('{{$userinfo->photo}}');">

                                                </div>
                                            </div>
                                            <div class="col-lg-8 title-profile animated fadeInDown">
                                                <h4>{{$userinfo->first_name." ".$userinfo->last_name}}</h4>
                                                <p>{{ucwords(strtolower($userinfo->role))}}</p>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="row p-0 m-0 main2">
                                            <div class="col-lg-4 text">
                                                <div class="number animated fadeInDown">@if(isset($statistic_result->total)) {{number_format($statistic_result->total)}} @else {{0}} @endif</div>
                                                <div>Total</div>
                                            </div>
                                            <div class="col-lg-4 text">
                                                <div class="number animated fadeInDown">@if(isset($statistic_result->enable)) {{number_format($statistic_result->enable)}} @else {{0}} @endif</div>
                                                <div>Enable</div>
                                            </div>
                                            <div class="col-lg-4 text">
                                                <div class="number animated fadeInDown">@if(isset($statistic_result->disable)) {{number_format($statistic_result->disable)}} @else {{0}} @endif</div>
                                                <div>Disable</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="main-1">
                                        <div><span style="width: 50px;display: inline-block">Email:</span>{{$userinfo->email}}
                                        </div>
                                        @php
                                            $text = trim($userinfo->phone_number);
                                            $len  = strlen($text);
                                            $text1 = join(str_split($text,3),' ');
                                            @endphp
                                        <div><span style="width: 50px;display: inline-block">Phone:</span>
                                            {{$text1}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="row p-0 m-0">
                                        <div class="col-lg-3 p-1">
                                            <div class="form-group">
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Show</label>
                                                </div>
                                                <select name="" id="" class="custom-select limit-user-project">
                                                    @foreach([10,20,40,100] as $value)
                                                        @if(isset($parameter['status']) && $parameter['status']==$value)
                                                            @php $active = "selected" @endphp
                                                        @else
                                                            @php $active = "" @endphp
                                                        @endif
                                                    <option value="{{$value}}" {{$active}}>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 p-1">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">status</label>
                                                </div>
                                                <select name="" id="" class="custom-select status-user-project">
                                                    @foreach(['all','enable','disable'] as $value)
                                                        @if(isset($parameter['status']) && $parameter['status']==$value)
                                                            @php $active = "selected" @endphp
                                                            @else
                                                            @php $active = "" @endphp
                                                            @endif
                                                        <option value="{{$value}}" {{$active}}>{{ucwords($value)}}</option>
                                                        @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <datalist id="project-list-search">
                                        </datalist>
                                        <div class="col-lg-6 p-1">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control search-name-user-project" placeholder="Search Project Name" datasrc="{{route('search-user-project')}}" list="project-list-search" value="@isset($parameter['search']){{$parameter['search']}}@endisset">
                                                    <div class="input-group-append action-search-project-user-title">
                                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3" style="text-align: right"> Total Page: <strong style="margin-left: 5px;">{{$paginate->total_page}}</strong> |  Total Items: <strong style="margin-left: 5px;">{{$paginate->total_item}}</strong></div>
                                    <br>

                                    <table class="table table-striped table-bordered dataTable no-footer">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Project</th>
                                            <th>Price</th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                        @foreach($result as $value)
                                        <tr>
                                            <td class="odd">{{$value->id}}</td>
                                            <td>
                                                <div
                                                    style="width:100px;height: auto;background: #ded9ff;margin: 0 auto">
                                                    <img class=" lazyload"
                                                         data-src="{{$value->thumbnail}}">
                                                </div>
                                            </td>
                                            <td><a class="linker" href="{{route('project-detail',['id'=>$value->id])}}">{{$value->name}}</a></td>
                                            <td>{{$value->project_type}}</td>
                                            <td style="width: 100px;">{{number_format($value->price)." $"}}</td>
                                            <td>
                                                @if($value->status=="true")
                                                    @php $check = "checked" @endphp
                                                    @else
                                                    @php $check = "" @endphp
                                                    @endif
                                                <div class="v-switch-button custom-btn-project-user" {{$check}}></div></td>
                                        </tr>
                                            @endforeach
                                    </table>
                                    @if(count($result)<=0)
                                        <div class="alert alert-danger">Not Found Project</div>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            @php $showving = ($paginate->page * $paginate->limit) - $paginate->limit + 1; @endphp
                                            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing @php if($showving>$paginate->total_item){ echo 0; }else { echo $showving;} @endphp  to {{$paginate->total_item}} of {{$paginate->total_item}} entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate" style="text-align: right;float: right">
                                                @php echo $render @endphp
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
    </div>
@endsection
@section('script')
    <script>
        var doc = $(document);
        $(document).ready(function () {
            $('.my-listing').addClass('active');
            $('.new-banner').addClass('active');

        });
    </script>
@endsection
