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
                            <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                {{-- Fillter Bar --}}
                                <div class="filter-blog">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group" style="padding: 0px 0rem;margin: 10px 0px;"><select
                                                name="select" id="select" class="form-control"
                                                style="margin-right: 10px;">
                                                <option value="">--All City/Provices--</option>
                                                <option value="P001">Banteay Meanchey</option>
                                                <option value="P002">Battambang</option>
                                                <option value="P003">Kampong Cham</option>
                                                <option value="P004">Kampong Chhnang</option>
                                                <option value="P005">Kampong Speu</option>
                                                <option value="P006">Kampong Thom</option>
                                                <option value="P007">Kampot</option>
                                                <option value="P008">Kandal</option>
                                                <option value="P009">Koh Kong</option>
                                                <option value="P010">Kratie</option>
                                                <option value="P011">Mondul Kiri</option>
                                                <option value="P012">Phnom Penh</option>
                                                <option value="P013">Preah Vihear</option>
                                                <option value="P014">Prey Veng</option>
                                                <option value="P015">Pursat</option>
                                                <option value="P016">Ratanak Kiri</option>
                                                <option value="P017">Siemreap</option>
                                                <option value="P018">Preah Sihanouk</option>
                                                <option value="P019">Stung Treng</option>
                                                <option value="P020">Svay Rieng</option>
                                                <option value="P021">Takeo</option>
                                                <option value="P022">Oddar Meanchey</option>
                                                <option value="P023">Kep</option>
                                                <option value="P024">Pailin</option>
                                                <option value="P025">Tboung Khmum</option>
                                            </select> <select name="select" id="select" class="form-control"
                                                              style="margin-right: 10px;">
                                                <option value="">--All Districts--</option>
                                            </select><select name="select" id="select" class="form-control"
                                                             style="margin-right: 10px;">
                                                <option value="">--All Communces--</option>
                                            </select><select name="select" id="select" class="form-control"
                                                             style="margin-right: 10px;">
                                                <option value="">--All Projects--</option>
                                                <option value="Agricultural Land">Agricultural Land</option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="Borey">Borey</option>
                                                <option value="Factory">Factory</option>
                                                <option value="Guesthouse">Guesthouse</option>
                                                <option value="Hotal">Hotal</option>
                                                <option value="Shop">Shop</option>
                                                <option value="Warehouse">Warehouse</option>
                                            </select></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group" style="padding: 0px 0rem; margin: 10px 0px;"><select
                                                name="select" id="select" class="form-control"
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
                                                <option value="">--All Bathrooms--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select><select name="select" id="select" class="form-control"
                                                             style="margin-right: 10px; text-align: center;">
                                                <option value="">--All Bedrooms--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select></div>
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
                                                <select placeholder="Search by name" name="title" class="form-control" style="border-radius: 1px;">
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
                                                <select placeholder="Search by name" name="title" class="form-control" style="border-radius: 1px;">
                                                    <option value="10">All</option>
                                                    <option value="20">Enable</option>
                                                    <option value="40">Disable</option>
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
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <span class="type-select" style="width: 100%">
                                            <div class="input-group" style="padding: 0px 0rem; margin: 0px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Search ...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary filter-action"><i class="fa fa-filter ml-2 mr-2"></i>Filter</button>
                                                </div>
                                            </div>
                                            </span>

                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3" style="text-align: right"> Total Page: <strong style="margin-left: 5px;">4</strong> |  Total Items: <strong style="margin-left: 5px;">35</strong></div>

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
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: auto;">Country
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="">Property
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 250px;">Price
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column descending" aria-sort="ascending">status
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i=0;$i<5;$i++)
                                            <tr class="odd">
                                                <td class="">01</td>
                                                <td class=""><div style="width:100px;height: auto;background: #ded9ff;margin: 0 auto"><img src="{{asset('assets/media/catalog-default-img.webp')}}"></div></td>
                                                <td class="" style="width: 400px;"><p>Land for Sale(15*20)</p></td>
                                                <td class=""><div style="text-align: center"> <i class="flag-icon flag-icon-gb h4 mb-0" title="kh" id="kh"></i></div></td>
                                                <td class="">Borey</td>
                                                <td class="">600000$  GRR: 0.5</td>
                                                <td class="sorting_1">
                                                    <div class="custom-control custom-switch" style="text-align:center">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                </td>


                                            </tr>
                                                @endfor
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
            $('.project-bar').addClass('active');
            $('.property-list').addClass('active');
        });
    </script>
@endsection
