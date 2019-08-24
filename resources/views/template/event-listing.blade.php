@extends('template.master')
@section('title') Event Listing @endsection
@section('content')
    @component('components.alert',
    [
    'title'=>'Wanning',
    'message'=>'Are Your Sure ?',
    'class_action'=>'delete-event',
    'action'=>'Delete'
    ])
    @endcomponent
    <span class="delete-event-link" datasrc="{{route('delete-event')}}"></span>
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
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

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
                                                <select placeholder="Search by name" name="title" class="form-control"
                                                        style="border-radius: 1px;">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="40">40</option>
                                                    <option value="100">100</option>
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
                                                <select placeholder="Search by name" name="title" class="form-control"
                                                        style="border-radius: 1px;">
                                                    <option value="10">All</option>
                                                    <option value="20">Enable</option>
                                                    <option value="40">Disable</option>
                                                </select>
                                            </div>

                                            </span>
                                                </div>
                                                <div class="col-sm-4">
                                                <span class="type-select">


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
                                                    style="width: auto;">Start Date
                                                </th>

                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column descending"
                                                    aria-sort="ascending">Status
                                                </th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $item)

                                                <tr class="odd">
                                                    <td id="event_id">{{$item->id}}</td>
                                                    <td class="">
                                                        <div
                                                            style="width:100px;height: auto;background: #ded9ff;margin: 0 auto">
                                                            <img
                                                                src="{{$item->banner}}">
                                                        </div>
                                                    </td>
                                                    <td class="" style="width: 400px;">
                                                        <p>{{$item->title}}</p></td>
                                                    <td class="">{{date_format(date_create($item->expired_date),'d M Y')}}</td>
                                                    <td class="sorting_1">
                                                        <div class="custom-control custom-switch"
                                                             style="text-align:center">
                                                            <input type="checkbox" class="custom-control-input event-status"
                                                                   id="customSwitch1"
                                                                   @if($item->status=="true") checked @endif>
                                                            <label class="custom-control-label"
                                                                   for="customSwitch1"></label>
                                                        </div>
                                                    </td>



                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
            $('.event-bar').addClass('active');
            $('.event-list').addClass('active');
        });
    </script>
@endsection
