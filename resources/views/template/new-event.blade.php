@extends('template.master')
@section('title') New Event @endsection
@section('style')
    <style>
        .has-error-text{
            display: none;
        }
    </style>
    @endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>New Event </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{route('dashboard')}}">Admin</a></li>
                                <li><a href="#">New Event</a></li>
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
                                        <div style="font-size: 23px;">Event Information</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="file" class="input-file new-event-image">
                                        <div style="width: 100%;height: 200px;background-image:url('{{asset('assets/media/no_image.f1ee5199.jpg')}}')" class="add-background receive-background" check_image="false">

                                        </div>
                                        <p style="text-align: center;margin-top: 10px;">Select to Chouse File</p>
                                        <p style="text-align: center;margin-top: 10px;display: none" class="message">Select to Chouse File</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group position-relative">
                                                    <label>Title</label>
                                                        <input type="text" class="form-control title-event"
                                                               placeholder="Enter title">
                                                    <small class="form-text has-error-text"></small>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Event start Date</label>
                                                <div class="form-group position-relative">
                                                <input type="text" class="form-control event-date" placeholder="Enter Event Date">
                                                    <small class="form-text has-error-text"></small>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-sm-12" style="font-size: 23px;">Description</div>
                                        </div>
                                        <div class="d-lg-block position-relative">
                                            <div class="col-sm-12 pl-0 mt-3">
                                                <div class="form-group position-relative">
                                                <div id="des-event" style="height: 200px;">

                                                </div>
                                                    <div class="form-group position-relative">
                                                <small class="form-text has-error-text"></small>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mt-3">
                                                <button class="btn btn-success save-event" style="width: 100%;" datasrc="{{route('store-event')}}">Save</button>
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        var doc = $(document);
        $(document).ready(function () {
            $('.event-bar').addClass('active');
            $('.new-event').addClass('active');
            $('.event-date').datetimepicker({
                format:"DD/MM/Y"
            });
            new Quill('#des-event', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                },
                placeholder: 'write something ...',
            });

        });
    </script>
@endsection
