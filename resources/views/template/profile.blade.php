@extends('template.master')
@section('meta')
    <meta name="CSRF_TOKEN" content="{{Session::get('access')}}">
    @endsection
@section('style')
    <style>
        .right-panel{
            position: relative;
        }
    </style>
    @endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="main-page1">
                <div style="position: relative">
                <div class="profile-image" style="background-image: url({{Session::get('photo')}})">
                    <div class="edit-profile-image"><i class="fas fa-camera-retro"></i><br>Update <input type="file" style="    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    font-size: 100px;
    opacity: 0;
    cursor: pointer;" title="" id="profile-image" datasrc="{{route('upload-profile-image')}}"></div>
                </div>
                </div>
                <ul class="list">
                   {{-- <li class="active">
                        <div class="row">
                            <div class="col-12 col-sm-2" style="text-align: center"><i class="fas fa-home"></i></div>
                            <div class="col-12 col-sm-10 pl-1 pr-1">Overview</div>
                        </div>
                    </li>--}}
                    <li class="active">
                        <div class="row">
                            <div class="col-1 col-sm-2"><i class="fas fa-cogs"></i></div>
                            <div class="col col-sm-10 pl-1 pr-1">Account Setting</div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-1    col-sm-2"><i class="fas fa-question-circle"></i></div>
                            <div class="col col-sm-10 pl-1 pr-1">Help</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-9">
            <div class="change-profile" datasrc="{{route('change-profile')}}"></div>
            <div class="main-page1" style="padding: 0 10px;">
                <h4 style="padding: 20px 10px;  margin-bottom: 0;  border-bottom: 1px solid #aaa; ">General Account Settings</h4>
                <div class="row click-change-main">
                    <div class="col-4">
                        <div class="title">Name</div>
                    </div>
                    <div class="col-7">
                        <div class="title-content">
                            <div class="old-name">{{Session::get('first_name')." ".Session::get('last_name')}}</div>
                                <div class="form-group position-relative input-change">
                                    <div class="input-group">
                                    <input type="text" class="form-control" name="first" value="{{Session::get('first_name')}}" placeholder="First Name">
                                    <input type="text" class="form-control" name="last" value="{{Session::get('last_name')}}" placeholder="Last Name">
                                    </div>
                                    <div class="input-group mt-3">
                                        <button class="btn btn-success action-change" style="margin-right: 5px;" type="name">Update</button>
                                        <button class="btn btn-danger cancel-change">Cancel</button>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="col-1">
                       <span class="click-change">Edit</span>
                    </div>
                </div>
                <div class="row click-change-main">
                    <div class="col-4">
                        <div class="title">Email</div>
                    </div>
                    <div class="col-7">
                        <div class="title-content">
                            <div class="old-name"> {{Session::get('email')}}</div>
                        </div>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
                <div class="row click-change-main">
                    <div class="col-4">
                        <div class="title">Phone Number</div>
                    </div>
                    <div class="col-7">
                        <div class="title-content">
                            <div class="old-name"> {{Session::get('phone_number')}}</div>
                            <div class="form-group position-relative input-change">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone_number" value="{{Session::get('phone_number')}}" placeholder="Phone Number">
                                </div>
                                <div class="input-group mt-3">
                                    <button class="btn btn-success action-change" style="margin-right: 5px;" type="phone_number">Update</button>
                                    <button class="btn btn-danger cancel-change">Cancel</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <span class="click-change">Edit</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="title">Position</div>
                    </div>
                    <div class="col-7">
                        <div class="title-content">
                            {{Session::get('role')}}
                        </div>
                    </div>
                    <div class="col-1">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    @endsection
