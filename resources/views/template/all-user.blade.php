@extends('template.master')
@section('title') User @endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>User</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">User</a></li>
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
                        {{--<div class="card-header">
                            <strong class="card-title">User</strong>
                        </div>--}}
                        <div class="card-body">
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Show</span>
                                                </div>
                                                <select placeholder="Search by name" name="show-select" class="form-control"
                                                        style="border-radius: 1px;")>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="40">40</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            </span>
                                            <span class="type-select" style="width: 200px;">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Type</span>
                                                </div>
                                                <select name="type" class="form-control"
                                                        style="border-radius: 1px;">
                                                    <option value="">All</option>
                                                    <option value="agent">Agent</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select" style="width: 100%">
                                                <div class="list-group" style="position: relative">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text search-button-click"><i class="fa fa-search"></i></span>
                                                </div>
                                                <div class="search-load" style="background-image:url({{asset('assets/media/loadem.svg')}});width: 35px;height: 35px;background-size: calc(400%);position: absolute;right: 5px;z-index: 10;    background-position: center;"></div>
                                                <input type="text" class="form-control search-user-option" placeholder="Search Name ..." datasrc="{{route('user-search')}}">
                                            </div>
                                                    <div class="list-box">
                                                        <ul class="list-search">
                                                        </ul>
                                                    </div>
                                                    </div>


                                            </span>

                                        </div>

                                    </div>

                                </div>
                                <br>
                                <span class="change-row">
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
                                                    aria-label="Name: activate to sort column ascending">Photo
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: 193px;">Full Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="">Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 139px;">Phone
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column descending"
                                                    aria-sort="ascending">Company
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user as $value)
                                                <tr class="odd">
                                                    <td class="">{{$value->id}}</td>
                                                    <td class="">
                                                        <div class="lazyload"
                                                             style="width:50px;height: 50px;background-size: cover;border-radius: 50px;;margin: 0 auto"
                                                             data-bgset="{{\App\Http\Controllers\UserController::check_image($value->photo,'photo')}}"></div>
                                                    </td>
                                                    <td class="">
                                                        <div> {{$value->first_name." ".$value->last_name}}</div>
                                                    </td>
                                                    <td class="">
                                                        <div
                                                            style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">{{$value->role}}</div>
                                                    </td>
                                                    <td class="">{{$value->phone_number}}</td>
                                                    <td class="sorting_1">Century 21 Apex Property</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        @if($paging!=false)
                                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                             aria-live="polite">Showing {{$paging->page*$paging->limit-$paging->limit+1}}
                                            to @if($paging->page*$paging->limit > $paging->total_item){{$paging->total_item}} @else {{$paging->page*$paging->limit}} @endif
                                            of {{$paging->total_item}} User
                                        </div>
                                            @else
                                            No Found

                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="bootstrap-data-table_paginate">
                                             @if($paging!=false)
                                            <ul class="pagination" style="float: right;">

                                                    <li class="paginate_button page-item previous @if($paging->page<=1){{'disabled'}}@endif"
                                                    id="bootstrap-data-table_previous">
                                                    <a href="{{route('all-user',['page'=>$paging->page-1])}}"
                                                       aria-controls="bootstrap-data-table"
                                                       data-dt-idx="0" tabindex="0"
                                                       class="page-link @if($paging->page>1) page-active-click @endif">Previous</a>
                                                </li>
                                                @for($i=0;$i<$paging->total_page;$i++)
                                                    @php
                                                        if($i==$paging->page-1) { $check = true;  }else{$check = false;}


                                                    @endphp
                                                <li class="paginate_button page-item @if($check) active @endif">
                                                    <a href="@if(!$check) {{route('all-user',['page'=>$i+1])}} @else{{'#'}}@endif"
                                                       aria-controls="bootstrap-data-table"
                                                       data-dt-idx="1"
                                                       tabindex="0"
                                                       class="page-link @if(!$check) page-active-click @endif ">{{$i+1}}</a>
                                                </li>
                                                @endfor

                                                <li class="paginate_button page-item next @if($paging->total_page <= $paging->page){{'disabled'}}@endif"
                                                    id="bootstrap-data-table_next">
                                                    <a href="{{route('all-user',['page'=>$paging->page+1])}}"
                                                       aria-controls="bootstrap-data-table"
                                                       data-dt-idx="2" tabindex="0"
                                                       class="page-link @if($paging->total_page > $paging->page) page-active-click @endif ">Next</a></li>

                                            </ul>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div>
@endsection
@section('script')
    <script>
        var doc = $(document);
        $(document).ready(function () {
            $('.all-user').addClass('active');
            @if($paging!=false)
            $('select[name="show-select"]').find('option[value="{{$paging->limit}}"]').attr('selected','selected');
            @endif
            $('select[name="type"]').find('option[value="{{$type}}"]').attr('selected','selected');
        });
    </script>
@endsection


