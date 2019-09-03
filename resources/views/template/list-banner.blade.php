@extends('template.master')
@section('content')
    <span class="delete-banner-link" datasrc="{{route('delete-banner')}}"></span>
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Event Listing </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{route('dashboard')}}">Admin</a></li>
                                <li><a href="#">Event Listing</a></li>
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
                            <div class="parameter" content="{{json_encode($parameter)}}"></div>
                            <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

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
                                                <select placeholder="Search by name" name="title" class="form-control banner-limit" style="border-radius: 1px;">
                                                    @foreach([10,20,40,100] as $value)
                                                        @if(isset($parameter['limit']) && $parameter['limit']==$value) @php $check = "selected"; @endphp
                                                        @else   @php $check =""; @endphp
                                                        @endif

                                                    <option value="{{$value}}" {{$check}}>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="type-select" style="width: 100%;">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Status</span>
                                                </div>
                                                <select placeholder="Search by name" name="title" class="form-control banner-status" style="border-radius: 1px;">
                                                    @foreach(['all','enable','disable'] as $value)
                                                        @if(isset($parameter['status']) && $parameter['status']==$value)
                                                            @php $check = "selected"; @endphp
                                                        @else   @php $check =""; @endphp
                                                        @endif
                                                    <option value="{{$value}}" {{$check}}>{{ucwords($value)}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            </span>
                                            </div>
                                                <div class="col-sm-4">
                                                <span class="type-select" >


                                            </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mt-1 mb-1" style="text-align: right"> Total Page: <strong
                                                style="margin-left: 5px;">@if(isset($paginate->total_page)) {{$paginate->total_page}} @else
                                                    0 @endif</strong> | Total Items: <strong
                                                style="margin-left: 5px;">@if(isset($paginate->total_item)) {{$paginate->total_item}} @else
                                                    0 @endif</strong></div>
                                    </div>

                                </div>


                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">#
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Image
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: auto;">Name
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column descending" aria-sort="ascending">Status
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $value)
                                            <tr class="odd">
                                                <td class="banner_id">{{$value->id}}</td>
                                                <td class=""><div style="width:100px;height: auto;background: #ded9ff;margin: 0 auto"><img src="{{$value->slider}}"></div></td>
                                                <td class="" style="width: 400px;"><p>{{$value->title}}</p></td>
                                                <td class="sorting_1">
                                                    @if(isset($value->status))
                                                        @if($value->status=="true")
                                                            @php $check = "checked"; @endphp
                                                            @else
                                                            @php $check = ""; @endphp
                                                            @endif
                                                        @endif
                                                        @if(strtolower(\Illuminate\Support\Facades\Session::get('role') )!="user")
                                                            <div class="v-switch-button banner_check" {{$check}}></div>
                                                            @else
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" readonly="true" {{$check}}>
                                                                <label class="custom-control-label" for="customSwitch1"></label>
                                                            </div>
                                                            @endif
                                                </td>



                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if(empty($data))
                                            <div class="alert alert-danger" role="alert">
                                                No Found
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        @php $showving = ($paginate->page * $paginate->limit) - $paginate->limit + 1; @endphp
                                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                             aria-live="polite">
                                            Showing @php if($showving>$paginate->total_item){ echo 0; }else { echo $showving;} @endphp
                                            to {{$paginate->total_item}} of {{$paginate->total_item}} entries
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
            $('.banner-bar').addClass('active');
            $('.list-banner').addClass('active');
        });
    </script>
@endsection
