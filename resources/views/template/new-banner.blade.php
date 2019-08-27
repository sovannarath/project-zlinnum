@extends('template.master')
@section('title') New Banner @endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>New Banner </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{route('dashboard')}}">Admin</a></li>
                                <li><a href="#">New Banner</a></li>
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
                                <div class="row">
                                    <div class="col-sm-3 pb-4">
                                        <div style="font-size: 23px;">Picture</div>
                                    </div>
                                    <div class="col-sm-9 pb-4">
                                        <div style="font-size: 23px;">Banner Information</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="file" class="input-file new-event-image">
                                        <div
                                            style="width: 100%;height: 200px;background-image:url('{{asset('assets/media/no_image.f1ee5199.jpg')}}')" class="add-background receive-background"></div>
                                        <p style="text-align: center">Select to Chouse File</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group position-relative">
                                                <label>Title</label>
                                                <input type="text" class="form-control title-bannerphp" placeholder="Enter title">
                                            </div>
                                        </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-sm-12 mt-3">
                                                <button class="btn btn-success" style="width: 100%;">Save</button>
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
            $('.banner-bar').addClass('active');
            $('.new-banner').addClass('active');

        });
    </script>
@endsection
