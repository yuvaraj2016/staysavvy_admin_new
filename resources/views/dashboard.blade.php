@extends('layouts.app')
@section('content')




<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }

    tbody {
        /* height: 100px; */
        display: inline-block;
        width: 100%;
        overflow: auto;
    }

    .card .card-block table tr {
        padding-bottom: 0px !important;

    }

    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid green;
        padding: 10px;
        text-align: left;
        font-size: 11px !important;
    }

    th {
        font-size: 13px !important;
    }

    .ct-series-a .ct-bar,
    .ct-series-a .ct-line,
    .ct-series-a .ct-point,
    .ct-series-a .ct-slice-donut {
        stroke: green !important;

    }

    .ct-series-a .ct-area {
        fill: green !important;
    }
    .table td, .table th {

        border-top: 1px solid green!important;
    }
 
</style>
<!-- <script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }s
</script> -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end" style="margin-top:25px!important">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Dashboard</h4>
                                    <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <!-- <li class="breadcrumb-item"><a href="#!">Charts</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#">Echart</a>
                                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
                @endif
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-lg-6 col-sm-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <p style="width:222px;margin-top:18px;margin-left:-14px;"> <i class=" fa fa-newspaper-o"></i><b> Booking Overview</b></p>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:1px"><b>From</b></h6>
                                            <input type="date" id="sdate1" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 151px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:10px"><b>Until</b></h6>
                                            <input type="date" id="edate1" name="edate" class="form-control offset-1" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 150px;">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                                <button type="button" id="booksubmit1" class="btn btn-primary" style="margin-top: 16px;margin-left:23px;padding: 11px 11px 0px 19px;"> Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- </div>
                            <div class="" style="margin-top: -16px;">
                           
                                <div class=""> -->
                                {{-- <p id="cdempty" style="display: none;">No data found for chart</p> --}}

                                {{-- <div id="main" style="height:300px"></div> --}}

                                <div class="ct-chart" id="chart" style="margin-top: -40px!important;"></div>




                                <!-- </div> -->
                                <!-- </div>


                            <div class="card" style="padding: 0px 10px 0px 10px;">

                                <div class="card-block"> -->
                                <div id="" class="card-block" style="height:130px ;padding: 25px -2px 0px 28px;margin-top:-28px!important">


                                    <div class="form-group row " style="display: flex;
justify-content: space-between;
flex-direction: row;
flex-wrap: wrap;">

                                        <div class="col-sm-2 card" id="arai" style="text-align: center;margin-left: 22px;">
                                            <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;margin-top:23px ">Arrivals</label>

                                            <p id="ac" style="text-align: center;"><b style="font-size:14px">{{$bookingobverview['arrivals_count']}}</b></p>


                                        </div>

                                        <div class="col-sm-3  card" id="dep">
                                            <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;margin-top:23px">Departures</label>

                                            <p id="dc" style="text-align: center;"><b style="font-size:14px">{{$bookingobverview['departures_count']}}</b> </p>


                                        </div>


                                        <div class="col-sm-2 card" id="newbook">
                                            <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;width: 67px;margin-top:5px">New Bookings</label>

                                            <p id="nbc" style="text-align: center;"><b style="font-size:14px"> {{$bookingobverview['new_booking_count']}}</b></p>


                                        </div>
                                        <div class="col-sm-2  card" id="stayor" style="margin-right: 26px;">
                                            <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;width: 67px;margin-top:5px">Stay Overs</label>

                                            <p name="name" id="stover" style="text-align: center;"><b style="font-size:14px">{{$bookingobverview['stay_over']}}</b></p>

                                        </div>
                                        <!-- <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Enquries</label>

                                                <p name="name" style="text-align: center;">0</p>

                                            </div> -->
                                    </div>


                                    <!-- <div id="chart" style="height: 300px;"></div>             -->


                                </div>






                                <!-- </div> -->
                                <!-- </div> -->
                                <div class="card-block" id="" style="height:130px; display: inline-block;
    /* width: 100%; */
    overflow: auto;margin-top: 1px;">
                                <table class="table "  id="arr">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Date Range</th>
        <th>Total Guests</th>
        <th>Total Amount</th>
      </tr>
    </thead>
    <thead>
    @foreach($available as $avail)
                                                <tr>
                                                    <td class="" style="text-align:center;color:black" id="un">{{ $avail['user_name'] }}</td>

                                                    <td class="" style="text-align:center;color:black" id="pn">{{ $avail['date_range_human'] }}</td>

                                                    <td class="" style="text-align:center;color:black" id="br">{{ $avail['total_guests'] }}</td>

                                                    <td class="" style="text-align:center;color:black" id="ta">{{ $avail['total_amount'] }}</td>

                                                </tr>
                                                @endforeach
      </thead>
  </table>
                                </div>

                                <!-- <div class="card" style="margin-top: -16px;">

                                <div class="card-block"> -->
                                <!-- this code hidden on 31.05.2021 -->
                                <!-- <div class="card-block" id="" style="height:130px; display: inline-block;
    /* width: 100%; */
    overflow: auto;margin-top: 1px;">

                                    <div class="dt-responsive table-responsive">
                                        <table id="arr">
                                            <thead>
                                                <tr style="float: right;">
                                                    <th class="col-md-2">User Name</th>
                                                    <th class="col-md-2">Date Range</th>

                                                    <th class="col-md-2">Total Guests</th>
                                                    <th class="">Total Amount</th>




                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($available as $avail)
                                                <tr>
                                                    <td class="" style="text-align:center;width:25%" id="un">{{ $avail['user_name'] }}</td>

                                                    <td class="" style="text-align:center;width:25%" id="pn">{{ $avail['date_range_human'] }}</td>

                                                    <td class="" style="text-align:center;width:25%" id="br">{{ $avail['total_guests'] }}</td>

                                                    <td class="" style="text-align:center;width:25%" id="ta">{{ $avail['total_amount'] }}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div> -->
                                   <!-- this code hidden on 31.05.2021 -->
                            </div>
                            <!-- </div> -->

                      
                        </div>


                        <div class="col-xl-6 col-sm-6 col-lg-6 col-md-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <p style="width: 118px;margin-top:18px"> <i class="fa fa-line-chart"></i><b> Performance</b></p>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;"><b>From</b></h6>
                                            <input type="date" id="sdate" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 151px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:6px"><b>Until</b></h6>
                                            <input type="date" id="edate" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 151px;margin-left:6px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="booksubmit" class="btn btn-primary" style="margin-top: 16px;margin-left:22px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- </div>
                            <div class="card" style="margin-top: -16px;">
            
                                <div class="card-block"> -->
                                <div id="main" style="height:106px;margin-top: -16px;">


                                    <div class="form-group row ">
                                        <div class="col-sm-4 " style="text-align: center;">
                                            <label class="col-form-label text-md-right c">Average Daily Rate</label>

                                            <p id="dr" style="text-align: center;"><b style="font-size: 14px;">£ {{$performance['daily_rate']}}</b></p>


                                        </div>

                                        <div class="col-sm-4 " style="text-align: center;">
                                            <label class="col-form-label text-md-right c">Cancellation Rate</label>

                                            <p id="cr" style="text-align: center;"><b style="font-size: 14px;">{{$performance['cancel_rate']}}</b> </p>

                                        </div>

                                        <div class="col-sm-2 " style="text-align: center;">
                                            <label class="col-form-label text-md-right c">Revenue</label>

                                            <p id="rev" style="text-align: center; width:80px"><b style="font-size: 14px;">£ {{$performance['revenue']}}</b></p>
                                        </div>
                                        <div class="col-sm-2 " style="text-align: center;">
                                            <label class="col-form-label text-md-right c">Stayed</label>

                                            <p id="stay" style="text-align: center;"><b style="font-size: 14px;">{{$performance['nights_stayed']}}</b></p>

                                        </div>

                                    </div>

                                    <!-- <div id="chart" style="height: 300px;"></div>             -->

                                </div>
                                <!-- </div> -->
                                <!-- </div>


                            <div class="card" style="margin-top: -16px;">
                            
                                <div class="card-block"> -->
                                <div id="main" style="height:106px;margin-top: -16px;">


                                    <div class="form-group row ">
                                        <div class="col-sm-4 " style="text-align: center;">
                                            <label class="col-form-label text-md-right c">Eco-Score</label>

                                            <p id="ssc" style="text-align: center;"><b style="font-size: 14px;"> {{$performance['ss_score']}}</b></p>


                                        </div>


                                        <div class="col-sm-4 " style="text-align: center;">
                                            <label class="col-form-label text-md-right c">Bookings Made</label>

                                            <p id="bm" style="text-align: center;"><b style="font-size: 14px;">{{$performance['booking_made']}}</b></p>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <p style="width: 112px;margin-top:15px"> <i class="fa fa-heart text-green"></i><b> Eco Summary</b></p>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;"><b>From</b></h6>
                                            <input type="date" id="sdate2" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 151px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:6px"><b>Until</b></h6>
                                            <input type="date" id="edate2" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 151px;margin-left:6px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="reward" class="btn btn-primary" style="margin-top: 16px;margin-left:20px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- </div>

                            <div class="card" style="margin-top: -16px;">
                   
                                <div class="card-block"> -->

                                <div class="ct-chart " id="chart1" style="margin-top: -16px;"></div>

                                <!-- </div> -->

                                <!-- </div>-->

                                <div class="card" style="margin-top: -16px;">


                                    <div class="card-block">
                                        <h6 id="ecs" style="display: none;text-align: center;
margin: 0;
position: absolute;
top: 50%;
left: 50%;
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);color:black!important">No Data Found In Pie Chart</h6>
                                        <canvas id="oilChart" width="400" height="200"></canvas>
                                        <canvas id="oilChartBtnClick" width="400" height="200"></canvas>
                                        <div id="pieChartSpinner" class="loader" style="text-align: center;font-size: 40px;color: green;">
                                            <i class="fa fa-circle-o-notch fa-spin"></i>
                                        </div>
                                    </div>


                                </div>




                                <!-- </div> -->



                                <div class="card-block" id="" style="height:130px; display: inline-block;
    /* width: 100%; */
    overflow: auto;margin-top: 1px;">
       <p><b>Eco Reward</b></p>
                                <table class="table "  id="vrew">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Date Range</th>
        <th>Booking Ref</th>
        <th>Status</th>
      </tr>
    </thead>
    <thead>
    @foreach($reward as $avail)
                                                        <tr>
                                                            <td class="col-md-3" style="color:black" id="vun">{{ $avail['user_name'] }}</td>

                                                            <td class="col-md-3" style="color:black" id="vdr">{{ $avail['date_range_human'] }}</td>

                                                            <td class="col-md-3" style="color:black" id="vbr">{{ $avail['booking_reference'] }}</td>

                                                            <td class="col-md-3" style="color:black" id="vs">{{ $avail['conf_reward_status_name'] }}</td>

                                                        </tr>
                                                        @endforeach
    </thead>
                                </table>
                                </div>







<!-- this code hidden on 31.05.2021 -->
<!-- 
                                <div class="card" style="margin-top: -29px!important;">

                                    <div class="card-block">
                                        <div id="" style="height:100px; display: inline-block;
    width: 100%;
    overflow: auto;">
                                            <p><b>Eco Reward</b></p>
                                            <div class="dt-responsive table-responsive">
                                                <table id="vrew">
                                                    <thead style="float: left;width:100%">
                                                        <tr>
                                                            <th class="col-md-3" style="max-width:28%!important">User Name</th>
                                                            <th class="col-md-3" style="max-width:28%!important">Date Range</th>

                                                            <th class="col-md-3" style="max-width:28%!important">Booking Ref</th>
                                                            <th class="col-md-3" style="max-width:28%!important">Status</th>




                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($reward as $avail)
                                                        <tr>
                                                            <td class="col-md-3" id="vun">{{ $avail['user_name'] }}</td>

                                                            <td class="col-md-3" id="vdr">{{ $avail['date_range_human'] }}</td>

                                                            <td class="col-md-3" id="vbr">{{ $avail['booking_reference'] }}</td>

                                                            <td class="col-md-3" id="vs">{{ $avail['conf_reward_status_name'] }}</td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->
                                <!-- this code hidden on 31.05.2021 -->
                            </div>


                        </div>

















                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <p style="width: 133px;margin-top:17px"> <i class="fa fa-pencil-square"></i><b> Eco Review</b></p>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>


                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;"><b>From</b></h6>
                                            <input type="date" id="reviewStartDate" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 151px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:6px"><b>Until</b></h6>
                                            <input type="date" id="reviewEndDate" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 151px;margin-left:6px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="booksubmit2" class="btn btn-primary" style="margin-top: 16px;margin-left:17px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- </div>

                            <div class="card" style="margin-top: -16px;"> -->

                                <div class="card-block">
                                    <div id="pie-chart" style="height:300px;display: inline-block;
    width: 100%;
    overflow: auto;margin-top: -16px;">






                                        <div id="revcontant">

                                            @php if(count($review) > 0){@endphp

                                            @foreach($review as $rev)

                                            <div class="form-group row">
                                                <div class="col-sm-4">

                                                    <p id="ue" style="margin-top: 11px;">{{$rev['user_email']}}</p>

                                                </div>
                                                <div class="col-sm-4 ">

                                                    <p id="rw" style="margin-top: 11px;">{{$rev['review']}}</p>

                                                </div>
                                                <div class="col-sm-4 ">

                                                    <p id="rat" style="margin-top: 11px;">{{$rev['rating']}}<i class="fa fa-star"></i></p>

                                                </div>
                                            </div>
                                            @endforeach
                                            @php } else{ @endphp

                                            <h6 style="text-align: center;  margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);color:black!important;">No data Available</h6>
                                            @php }@endphp

                                        </div>








                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>


    <script>
        $(function() {

            new Chartist.Line('#chart', {
                labels: @php echo json_encode($chart['labels']);@endphp,
                series: [
                    @php echo json_encode($chart['datasets']);@endphp
                ]
            }, {
                low: 0,
                showArea: true,

                axisY: {
                    onlyInteger: true,
                    metaIsHTML: true,
                },

                plugins: [
                    Chartist.plugins.tooltip({
                        currency: 'New Bookings ',
                        class: 'class1 class2',
                        appendToBody: true
                    })
                ],
            })

        });



        $(function() {

            new Chartist.Line('#chart1', {
                labels: @php echo json_encode($vendorline['labels']);@endphp,
                series: [
                    @php echo json_encode($vendorline['datasets']);@endphp
                ]
            }, {
                low: 0,
                showArea: true,

                axisY: {
                    onlyInteger: true,
                    metaIsHTML: true,
                },

                plugins: [
                    Chartist.plugins.tooltip({
                        currency: 'Eco Impact ',
                        class: 'class1 class2',
                        appendToBody: true
                    })
                ],
            })

        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.min.css" />
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/Globegitter/chartist-plugin-tooltip/master/dist/chartist-plugin-tooltip.css" />

    <script type="text/javascript" src="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.js"></script>
    <script type="text/javascript" src="https://rawgit.com/Globegitter/chartist-plugin-tooltip/master/dist/chartist-plugin-tooltip.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
    <script src="./script.js"></script>


    <script>
        $('#pieChartSpinner').show();
        $('#oilChartBtnClick').css('display', 'none');
        let onLoadPieChartData = [];
        var oilCanvas = document.getElementById("oilChart");
        var ctx = oilCanvas.getContext('2d');

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var lab = @php echo json_encode($piechart['labels']);
        @endphp;

        var ds = @php echo json_encode($piechart['datasets']);
        @endphp;

        onLoadPieChartData = ds;
        if (lab == '' && ds == '') {
            // alert("hii");
            $('#ecs').css('display', 'block');
            $('#pieChartSpinner').hide();

        } else {
            $('#pieChartSpinner').hide();
            $('#ecs').css('display', 'none');
            var oilData = {
                labels: @php echo json_encode($piechart['labels']);@endphp,
                datasets: [{
                    data: @php echo json_encode($piechart['datasets']);@endphp,
                    backgroundColor: getRandomColorForOnLoadData(),
                }]
            };

            console.log('OnLoadPieChartData', oilData)

            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: oilData
            });
        }

        function getRandomColorForOnLoadData() {
            console.log('onLoadPieChartData', onLoadPieChartData)
            var letters = '0123456789ABCDEF'.split('');
            var color = [];
            for (var i = 0; i < onLoadPieChartData.length; i++) {
                var max2 = 150;
                var min2 = 100;
                var max1 = 100;
                var min1 = 50;
                var green1 = Math.floor(Math.random() * (max2 - min2 + 1)) + min2;
                var green2 = Math.floor(Math.random() * (max1 - min1 + 1)) + min1;
                color.push(`rgb(0,${green1},${green2})`);
            }
            console.log(color)
            return color;

        }
    </script>
    <script>
        $('#booksubmit').on("click", function() {
            var sdate = $("#sdate").val();
            var edate = $("#edate").val();
            var propid = <?php echo session()->get('property_id'); ?>

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('performanceajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    // alert(responsedata.cancel_rate);

                    $('#dr').html(responsedata.daily_rate).css("font-weight", "Bold").css("font-size", "13px");
                    $('#cr').html(responsedata.cancel_rate).css("font-weight", "Bold").css("font-size", "13px");
                    $('#rev').html(responsedata.revenue).css("font-weight", "Bold").css("font-size", "13px");
                    $('#ssc').html(responsedata.ss_score).css("font-weight", "Bold").css("font-size", "13px");
                    $('#bm').html(responsedata.booking_made).css("font-weight", "Bold").css("font-size", "13px");
                    $('#stay').html(responsedata.nights_stayed).css("font-weight", "Bold").css("font-size", "13px");


                }

            })




        });





        // arrival onclick fuction given below on 18.03.2021

        $('#arai').on("click", function() {
            //  alert("hiiiii")

            var sdate = $("#sdate1").val();
            // alert(sdate1);
            var edate = $("#edate1").val();
            // alert(edate1);
            var propid = <?php echo session()->get('property_id'); ?>

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('availableajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {




                    var arrival = '';

                    var x = 1;
                    if (responsedata.length == 0) {
                        arrival = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);margin-top: 132px!important;color: black;">No Data Found In Arrival</p>';
                    } else {
                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                arrival = arrival + '  <thead>' +
                                    ' <tr">  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th >Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;


                            arrival = arrival + '<thead><tr style="margin-padding:0px">' +
                                ' <td class="" style="text-align:center;color:black!important;" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="ta">' + val.total_amount + '</td>' +

                                ' </tr></thead> ';


                        })
                    }
                    $('#arr').html('');
                    $('#arr').html(arrival);
                    // alert("hii")

                }

            })

        });

        // end of arrival onclick fuction given below on 18.03.2021







        // new Booking onclick fuction given below on 18.03.2021

        $('#newbook').on("click", function() {
            //  alert("hiiiii")

            var sdate = $("#sdate1").val();
            // alert(sdate1);
            var edate = $("#edate1").val();
            // alert(edate1);
            var propid = <?php echo session()->get('property_id'); ?>

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('newbookingajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    //    alert(responsedata);
                    var bookingnew = '';

                    var x = 1;

                    if (responsedata.length == 0) {
                        bookingnew = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);margin-top: 132px!important;color: black;">No Data Found In New Booking</p>';
                    } else {
                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                bookingnew = bookingnew + '  <thead>' +
                                    ' <tr >  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th>Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            bookingnew = bookingnew + '<thead><tr style="margin-padding:0px;">' +
                                ' <td class="" style="text-align:center;color:black!important;" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="ta">' + val.total_amount + '</td>' +

                                ' </tr></thead> ';


                        })
                    }
                    $('#arr').html('');
                    $('#arr').html(bookingnew);
                }

            })

        });

        // end of New booking onclick fuction given below on 18.03.2021










        let pieChartData = [];
        // reward onclick fuction given below on 18.03.2021

        $('#reward').on("click", function() {
            $("#pieChartSpinner").show();
            //  alert("hiiiii")
            pieChartData = [];
            var sdate = $("#sdate2").val();
            // alert(sdate1);
            var edate = $("#edate2").val();
            // alert(edate1);
            var propid = <?php echo session()->get('property_id'); ?>



            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('rewardchartajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    //  alert(responsedata.labels);



                    new Chartist.Line('#chart1', {
                        labels: responsedata.labels,
                        series: [
                            responsedata.datasets
                        ]
                    }, {
                        low: 0,

                        showArea: true,
                        axisY: {
                            onlyInteger: true,
                        },

                        plugins: [
                            Chartist.plugins.tooltip({
                                currency: 'Eco Impact ',
                                class: 'class1 class2',
                                appendToBody: true
                            })
                        ],
                    })


                }



            })





            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('piedchartajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    //  alert(responsedata.labels);


                    var lab = responsedata.labels;

                    var ds = responsedata.datasets;
                    pieChartData = ds;
                    if (lab == '' && ds == '') {
                        // alert("hii");
                        $('#ecs').css('display', 'block');
                        $('#oilChartBtnClick').css('display', 'none');
                        $('#oilChart').css('display', 'none');
                        $("#pieChartSpinner").hide();

                    } else {
                        // $("#pieChartSpinner").hide();
                        // $('#oilChart').html('');
                        // $('#ecs').css('display', 'none');
                        // $('#oilChart').css('display', 'block');
                        $("#pieChartSpinner").hide();
                        $('#ecs').css('display', 'none');
                        $('#oilChart').css('display', 'none');
                        $('#oilChartBtnClick').css('display', 'block');

                        var oilBtnClickCanvas = document.getElementById("oilChartBtnClick");
                       var ctx = oilBtnClickCanvas.getContext('2d');
                        // Chart.defaults.global.defaultFontFamily = "Lato";
                        Chart.defaults.global.defaultFontSize = 18;

                        var oilBtnClickData = {
                            labels: responsedata.labels,
                            datasets: [{
                                data: responsedata.datasets,
                                backgroundColor: getRandomColor(),
                            }]
                        };

                        var pieChart = new Chart(ctx, {
                            type: 'pie',
                            data: oilBtnClickData
                        });


                    }

                }

            })








            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('vrewardajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    // console.log(responsedata);
                    // alert(responsedata.length);
                    // if(responsedata >0){

                    // }else{

                    // }
                    var reward = '';
                    var x = 1;
                    if (responsedata.length == 0) {
                        reward = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);color: black;margin-top: 279px;">No Data Found In Reward</p>';
                    } else {


                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                reward = reward + '  <thead>' +
                                    ' <tr >  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Booking Ref</th>  <th  class="col-md-2">Status</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            reward = reward + '<thead><tr style="margin-padding:0px">' +
                                ' <td class="" style="text-align:center;color:black!important;" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="br">' + val.booking_reference + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="ta">' + val.conf_reward_status_name + '</td>' +

                                ' </tr></thead> ';


                        })
                    }
                    $('#vrew').html('');
                    $('#vrew').html(reward);

                }

            })

        });



        function getRandomColor() {
            console.log('pieChartData', pieChartData)
            var letters = '0123456789ABCDEF'.split('');
            var color = [];
            for (var i = 0; i < pieChartData.length; i++) {
                var max2 = 150;
                var min2 = 100;
                var max1 = 100;
                var min1 = 50;
                var green1 = Math.floor(Math.random() * (max2 - min2 + 1)) + min2;
                var green2 = Math.floor(Math.random() * (max1 - min1 + 1)) + min1;
                color.push(`rgb(0,${green1},${green2})`);
            }
            console.log(color)
            return color;

        }

        // end of Reward onclick fuction given below on 18.03.2021

















        // depature onclick fuction given below on 18.03.2021

        $('#dep').on("click", function() {
            //  alert("hiiiii")

            var sdate = $("#sdate1").val();
            // alert(sdate1);
            var edate = $("#edate1").val();
            // alert(edate1);
            var propid = <?php echo session()->get('property_id'); ?>

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('depatureajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    console.log(responsedata);

                    var depature = '';
                    var x = 1;
                    if (responsedata.length == 0) {
                        depature = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);margin-top: 132px!important;color:black!important">No Data Found In Depature</p>';
                    } else {


                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                depature = depature + '  <thead>' +
                                    ' <tr  >  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th>Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            depature = depature + '<thead><tr style="margin-padding:0px">' +
                                ' <td class="" style="text-align:center;color:black!important;" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="ta">' + val.total_amount + '</td>' +

                                ' </tr> </thead>';


                        })
                    }
                    $('#arr').html('');
                    $('#arr').html(depature);

                }

            })

        });

        // end of depature onclick fuction given below on 18.03.2021



        // stay over onclick fuction given below on 18.03.2021

        $('#stayor').on("click", function() {
            //  alert("hiiiii")

            var sdate = $("#sdate1").val();
            // alert(sdate1);
            var edate = $("#edate1").val();
            // alert(edate1);
            var propid = <?php echo session()->get('property_id'); ?>

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('stayoverajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    console.log(responsedata);
                    //   alert(responsedata);
                    var stayover = '';
                    var x = 1;
                    if (responsedata.length == 0) {
                        stayover = '<h6 style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);margin-top: 132px!important;color:black!important;">No Data Found In Stay-overs</h6>';
                    } else {
                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                stayover = stayover + '  <thead>' +
                                    ' <tr>  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th>Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            stayover = stayover + '<thead><tr style="margin-padding:0px">' +
                                ' <td class="" style="text-align:center;color:black!important;" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="text-align:center;color:black!important;" id="ta">' + val.total_amount + '</td>' +

                                ' </tr> </thead>';


                        })
                    }
                    $('#arr').html('');
                    $('#arr').html(stayover);
                }

            })

        });

        // end of depature onclick fuction given below on 18.03.2021








        $('#booksubmit2').on("click", function() {
            $('#revcontant').empty('');
            var sdate = $("#reviewStartDate").val();
            var edate = $("#reviewEndDate").val();
            var propid = <?php echo session()->get('property_id'); ?>

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('reviewajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    //   alert(responsedata);

                    var reviewhtml = '';

                    var x = 1;
                    if (responsedata.length == 0) {
                        reviewhtml = '<h6 style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);color:black!important">No Data Found In Reviews</h6>';
                    } else {

                        $.each(responsedata, function(key, val) {
                            // alert(val.user_email);


                            reviewhtml = reviewhtml + ' <div class="form-group row reviewData"> <div class="col-sm-4">' +

                                '<p  id="ue" style="margin-top: 11px;">' + val.user_email + '</p>' +

                                '</div>' +
                                '<div class="col-sm-4 ">' +

                                '<p id="rw" style="margin-top: 11px;">' + val.review + '</p>' +

                                '</div>' +
                                '<div class="col-sm-4 ">' +

                                '<p id="rat" style="margin-top: 11px;">' + val.rating + '<i class="fa fa-star"></i></p>' +

                                '</div></div>';
                            // $('#ue').html(responsedata.user_email);
                            //         $('#rw').html(responsedata.review);
                            //         $('#rat').html(responsedata.rating);
                        });
                    }
                    // alert(reviewhtml.replace("NaN",""));
                    var revhtml = reviewhtml.replace("NaN", "");
                    $('#revcontant').html('');
                    $('#revcontant').html(revhtml);

                    // $.each(responsedata as rdata){
                    //     alert(rdata.user_email);
                    //                 $('#ue').html(responsedata.user_email);
                    //                 $('#rw').html(responsedata.review);
                    //                 $('#rat').html(responsedata.rating);
                    // }

                }

            })




        });







        $('#booksubmit1').on("click", function() {
            var sdate = $("#sdate1").val();
            var edate = $("#edate1").val();
            // alert(sdate);
            var propid = <?php echo session()->get('property_id'); ?>
            // alert();

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('bochartajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    //  alert(responsedata.labels);



                    new Chartist.Line('#chart', {
                        labels: responsedata.labels,
                        series: [
                            responsedata.datasets
                        ]
                    }, {
                        low: 0,

                        showArea: true,
                        axisY: {
                            onlyInteger: true,
                        },

                        plugins: [
                            Chartist.plugins.tooltip({
                                currency: 'New Bookings ',
                                class: 'class1 class2',
                                appendToBody: true
                            })
                        ],
                    })


                }



            })





            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/vnd.api.v1+json'
                },
                url: "{{ url('bookingoverviewajax')}}" + "/" + propid + "/" + sdate + "/" + edate,

                type: "GET",


                crossDomain: true,
                beforeSend: function() {
                    $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                },

                success: function(responsedata) {
                    // alert(responsedata.departures_count);

                    $('#ac').html("<b style='font-size:17px'>" + responsedata.arrivals_count + "</b>");
                    $('#dc').html("<b style='font-size:17px'>" + responsedata.departures_count + "</b>");
                    $('#nbc').html("<b style='font-size:17px'>" + responsedata.new_booking_count + "</b>");

                    $('#stover').html("<b style='font-size:17px'>" + responsedata.stay_over + "</b>");


                }

            })






        });
    </script>


    </section>
    @endsection