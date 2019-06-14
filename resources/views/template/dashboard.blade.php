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
                                    <i class="fa fa-building-o"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">43</span></div>
                                        <div class="stat-heading">Total Project</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Disabled: 38 | Enabled: 5</div>
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
                                    <i class="pe-7s-cart"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">3</span></div>
                                        <div class="stat-heading">Total Event</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Disabled: 0 | Enabled: 3</div>
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
                                        <div class="stat-text"><span class="count">11</span></div>
                                        <div class="stat-heading">Total User</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Admin: 3 | Agent: 1 | User: 7</div>
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
                                        <div class="stat-text"><span class="count">15</span></div>
                                        <div class="stat-heading">Propertys</div>
                                    </div>
                                </div>
                                <div class="stat-content custom">
                                    <div class="stat-heading">Disabled: 9 | Enabled: 6</div>
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
                                        <div class="por-txt">1 (2%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 2%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">Condo</h4>
                                        <div class="por-txt">8 (19%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 19%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">
                                            borey
                                        </h4>
                                        <div class="por-txt">34 Users (79%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 79%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
                    data: [0, 10, 5, 2, 20, 30, 45],
                    pointRadius: 0


                }],

            },


            // Configuration options go here
            options: {}
        });
    </script>



@endsection


