@extends('template.master')
@section('title') Dashboard @endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$totalproject}}</span></div>
                                        <div class="stat-heading">Total Project</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Disabled: {{$projectDisable}} | Enabled: {{$projectEnable}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$totalEvent}}</span></div>
                                        <div class="stat-heading">Total Event</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Disabled: {{$eventDisble}} | Enabled: {{$eventEnable}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$total_user}}</span></div>
                                        <div class="stat-heading">Total User</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Admin: {{$admin_count}} | Agent: {{$agent_count}} | User: {{$user_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$property_count}}</span></div>
                                        <div class="stat-heading">Propertys</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Disabled: {{$propertyoff_count}} | Enabled: {{$propertyon_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->
            <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Traffic </h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                    <!-- <canvas id="TrafficChart"></canvas>   -->
                                    {{--<div id="traffic-chart" class="traffic-chart"></div>--}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="progress-box progress-1">
                                        <h4 class="por-title">
                                            Apartment
                                        </h4>
                                        <div class="por-txt">{{$apartment_count}} ({{$apartment_percent}}%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: {{$apartment_percent}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">Condo</h4>
                                        <div class="por-txt">{{$condo_count}} ({{$condo_percent}}%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: {{$condo_percent}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">
                                            Borey
                                        </h4>
                                        <div class="por-txt">{{$borey_count}} ({{$borey_percent}}%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: {{$borey_percent}}%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div> <!-- /.card-body -->
                            </div>
                        </div> <!-- /.row -->
                        <div class="card-body"></div>
                    </div>
                </div><!-- /# column -->
            </div>
            <!--  /Traffic -->
            <div class="clearfix"></div>
            <!-- Orders -->

            <!-- /.orders -->
            <!-- To Do and Live Chat -->

            <!-- /To Do and Live Chat -->
            <!-- Calender Chart Weather  -->

            <!-- /Calender Chart Weather -->
            <!-- Modal - Calendar - Add New Event -->

            <!-- /#event-modal -->
            <!-- Modal - Calendar - Add Category -->

            <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
@endsection
@section('script')
    <script>
        var doc = $(document);
        $(document).ready(function () {
            $('.dashboard').addClass('active');
        });
    </script>
    <script>
        var apartment  = JSON.parse("{{json_encode($apartment_chart)}}");
        var borey  = JSON.parse("{{json_encode($borey_chart)}}");
        var condo  = JSON.parse("{{json_encode($condo_chart)}}");

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Apartment',
                    backgroundColor: 'rgb(255, 99, 132,0.4)',
                    borderColor: 'rgb(255, 99, 132)',

                    data: apartment,

                    pointRadius: 0


                },
                    {
                        label: 'Condo',
                        backgroundColor: 'rgb(255, 255, 102,0.4)',
                        borderColor: 'rgb(230, 230, 0)',

                        data: condo,

                        pointRadius: 0


                    },{
                        label: 'Borey',
                        backgroundColor: 'rgb(255, 153, 0,0.4)',
                        borderColor: 'rgb(255, 153, 0)',

                        data: borey,

                        pointRadius: 0


                    }],

            },



            // Configuration options go here
            options: {}
        });
    </script>



@endsection


