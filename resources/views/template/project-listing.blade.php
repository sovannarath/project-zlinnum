@extends('template.master')
@section('title') Project Listing @endsection
@section('content')
    @component('components.alert',['title'=>'Change Status','message'=>'','class_action'=>'project','action'=>'OK'])
        @endcomponent
    <datalist id="project_list">
        @foreach($datalist->result as $value)
        <option value="{{$value->name}}"></option>
            @endforeach
        
    </datalist>
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Project Listing </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Project Listing</a></li>
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
                            <div class="parameter" content="{{$parameter}}"></div>
                            <script>
                                $('.limit-page option[value="{{$limit}}"]').attr('selected','selected');
                            </script>
                            <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                {{-- Fillter Bar --}}
                                <div class="filter-blog">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="position-relative form-group">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 1.5rem 0px;">
                                                <select name="select" id="select" class="form-control"
                                                        style="margin-right: 10px;">
                                                    <option value="0">--All Countres--</option>
                                                    @foreach($country->result as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach

                                                </select> <select name="select" id="select" class="form-control"
                                                                  style="margin-right: 10px;">
                                                    <option value="">--All Cities--</option>
                                                </select> <select name="select" id="select" class="form-control"
                                                                  style="margin-right: 10px;">
                                                    <option value="0">--All Projects--</option>
                                                </select> <select name="select" id="select" class="form-control"
                                                                  style="margin-right: 10px;">
                                                    <option value="">--Sale And Rent--</option>
                                                    <option value="Rent">Rent</option>
                                                    <option value="Sale">Sale</option>
                                                </select><input placeholder="--Min Price" name="title" type="text"
                                                                class="form-control" value=""
                                                                style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-right: none; text-align: center;">
                                                <input placeholder="Max Price--" name="title" type="text"
                                                       class="form-control" value=""
                                                       style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-left: none; margin-right: 10px;"><select
                                                        name="select" id="select" class="form-control"
                                                        style="margin-right: 10px; text-align: center;">
                                                    <option value="">--All Rooms--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="else">Else</option>
                                                </select></div>
                                        </div>
                                    </div>


                                </div>
                                </div>
                                {{-- End Fillter Bar --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Show</span>
                                                </div>
                                                    <select placeholder="Search by name" name="title" class="form-control limit-page" style="border-radius: 1px;">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="40">40</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            </span>
                                            <span class="type-select" style="width: 200px;">

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select" style="width: 100%">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text goto-search" data><i class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control search-project-listing" placeholder="Search ..." value="{{$search}}" list="project_list">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary filter-action"><i class="fa fa-filter ml-2 mr-2"></i>Filter</button>
                                                </div>
                                            </div>
                                            </span>

                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3" style="text-align: right"> Total Page: <strong style="margin-left: 5px;">{{$paginate->total_page}}</strong> |  Total Items: <strong style="margin-left: 5px;">{{$paginate->total_item}}</strong></div>

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
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: auto;">Country
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="">Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 250px;">Price
                                                </th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column descending" aria-sort="ascending" style="width: 15px;">Remove
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($result as $item)
                                            <tr class="odd item-project">
                                                <td class="id_project" id="{{$item->id}}">{{$item->id}}</td>
                                                <td class=""><div style="width:100px;height: auto;background: #ded9ff;margin: 0 auto">
                                                        <img class="lazyload" data-src="{{$item->thumbnail}}"></div>
                                                </td>
                                                <td style="width: 500px;">
                                                    <p>{{$item->name}}</p>
                                                </td>
                                                <td class="">
                                                    <div style="text-align: center">
                                                        <i class="flag-icon flag-icon-kh h4 mb-0" title="kh" id="kh"></i>
                                                    </div>
                                                </td>
                                                <td class="">{{$item->project_type}}</td>
                                                <td class="">{{$item->price}}  GRR: {{$item->grr}}</td>
                                             {{--   <td class="sorting_1">
                                                    <div class="custom-control custom-switch" style="text-align:center" datasrc="{{route('change-status-project')}}">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" @if($item->status=="true") checked @endif>
                                                        <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                </td>--}}
                                                <td style="text-align: center;font-size: 12px;color: darkred" class="delete-project"><i class="fas fa-trash"></i></td>

                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if($paginate->total_item<=0)
                                        <div class="alert alert-danger">Project not Found</div>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        @php $showving = ($paginate->page * $paginate->limit) - $paginate->limit + 1; @endphp
                                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing @php if($showving>$paginate->total_item){ echo 0; }else { echo $showving;} @endphp  to {{$paginate->total_item}} of {{$paginate->total_item}} entries
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate" style="text-align: right;float: right">
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
            $('.project-bar').addClass('active');
            $('.project-list').addClass('active');
        });
    </script>
@endsection
