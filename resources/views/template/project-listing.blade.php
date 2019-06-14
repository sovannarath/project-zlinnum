@extends('template.master')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>New Project</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">New Project</a></li>
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
                            <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-7 col-1">
                                        div.input-
                                    </div>
                                    <div class="col-7 col-1"></div>
                                    <div class="col-7 col-1"></div>
                                    <div class="col-7 col-1"></div>
                                    <div class="col-7 col-1"></div>
                                    <div class="col-7 col-1"></div>
                                    <div class="col-7 col-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Show</span>
                                                </div>
                                                <select placeholder="Search by name" name="title" class="form-control" style="border-radius: 1px;">
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
                                                <select placeholder="Search by name" name="title" class="form-control" style="border-radius: 1px;">
                                                    <option value="10">All</option>
                                                    <option value="20">Agent</option>
                                                    <option value="40">Admin</option>
                                                    <option value="100">User</option>
                                                </select>
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select" style="width: 100%">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Search ...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fa fa-filter ml-2 mr-2"></i>Filter</button>
                                                </div>
                                            </div>
                                            </span>

                                        </div>

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
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Photo
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 193px;">Full Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="">Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 139px;">Phone
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column descending" aria-sort="ascending">Company
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                <td class="">01</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">02</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">03</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">04</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">05</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">06</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">07</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">08</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">09</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="">010</td>
                                                <td class=""><div style="width:50px;height: 50px;background: #ded9ff;border-radius: 50px;;margin: 0 auto"></div></td>
                                                <td class=""><div> Sparth</div></td>
                                                <td class=""><div style="    width: auto;border-radius: 30px;background: #337ab7;padding: 1px 1px;color: white;text-align: center">Admin</div></td>
                                                <td class="">086 48 33 36</td>
                                                <td class="sorting_1">Century 21 Apex Property</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing 1 to 57 of 57 entries
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate" style="text-align: right">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                                </li>
                                                <li class="paginate_button page-item next disabled" id="bootstrap-data-table_next"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
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
            $('.project').addClass('active');
            $('.project-list').addClass('active');
        });
    </script>
@endsection