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
                    <div class="row align-items-end">
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
                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <h5 style="width:222px;margin-top:18px;margin-left:-9px;"> <i class=" fa fa-newspaper-o"></i> Booking Overview</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:16px">From</h6>
                                            <input type="date" id="sdate1" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;margin-left:16px">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:19px">Until</h6>
                                            <input type="date" id="edate1" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;margin-left:19px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="booksubmit1" class="btn btn-primary" style="margin-top: 16px;margin-left:23px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="card" style="margin-top: -16px;">
                                <!-- <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                <div class="card-block">
                                    {{-- <p id="cdempty" style="display: none;">No data found for chart</p> --}}

                                    {{-- <div id="main" style="height:300px"></div> --}}

                                    <div class="ct-chart" id="chart"></div>




                                </div>
                            </div>


                            <div class="card" style="padding: 0px 10px 0px 10px;">

                                <div class="card-block">
                                    <div id="" style="height:100px">


                                        <div class="form-group row ">

                                            <div class="col-sm-2 card" id="arai" style="text-align: center;">
                                                <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;margin-top:23px ">Arrivals</label>

                                                <p id="ac" style="text-align: center;"><b style="font-size:17px">{{$bookingobverview['arrivals_count']}}</b></p>


                                            </div>

                                            <div class="col-sm-3 offset-1 card" id="dep">
                                                <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;margin-top:23px">Departures</label>

                                                <p id="dc" style="text-align: center;"><b style="font-size:17px">{{$bookingobverview['departures_count']}}</b> </p>


                                            </div>


                                            <div class="col-sm-2 offset-1 card" id="newbook">
                                                <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;width: 67px;margin-top:5px">New Bookings</label>

                                                <p id="nbc" style="text-align: center;"><b style="font-size:17px"> {{$bookingobverview['new_booking_count']}}</b></p>


                                            </div>
                                            <div class="col-sm-2 offset-1 card" id="stayor">
                                                <label class="col-form-label text-md-right c" style=" cursor: pointer;text-align:center!important;width: 67px;margin-top:5px">Stay Overs</label>

                                                <p name="name" id="stover" style="text-align: center;"><b style="font-size:17px">{{$bookingobverview['stay_over']}}</b></p>

                                            </div>
                                            <!-- <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Enquries</label>

                                                <p name="name" style="text-align: center;">0</p>

                                            </div> -->
                                        </div>


                                        <!-- <div id="chart" style="height: 300px;"></div>             -->


                                    </div>
                                </div>
                            </div>


                            <div class="card" style="margin-top: -16px;">

                                <div class="card-block">
                                    <div id="" style="height:100px; display: inline-block;
    width: 100%;
    overflow: auto;">

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

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <h5 style="width: 130px;margin-top:18px"> <i class="fa fa-line-chart"></i> Performance</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">From</h6>
                                            <input type="date" id="sdate" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:12px">Until</h6>
                                            <input type="date" id="edate" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;margin-left:12px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="booksubmit" class="btn btn-primary" style="margin-top: 16px;margin-left:22px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="card" style="margin-top: -16px;">
                                <!-- <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                <div class="card-block">
                                    <div id="main" style="height:106px">


                                        <div class="form-group row ">
                                            <div class="col-sm-4 " style="text-align: center;">
                                                <label class="col-form-label text-md-right c">Average Daily Rate</label>

                                                <p id="dr" style="text-align: center;"><b style="font-size: 17px;">£ {{$performance['daily_rate']}}</b></p>


                                            </div>

                                            <div class="col-sm-4 " style="text-align: center;">
                                                <label class="col-form-label text-md-right c">Cancellation Rate</label>

                                                <p id="cr" style="text-align: center;"><b style="font-size: 17px;">{{$performance['cancel_rate']}}</b> </p>

                                            </div>

                                            <div class="col-sm-2 " style="text-align: center;">
                                                <label class="col-form-label text-md-right c">Revenue</label>

                                                <p id="rev" style="text-align: center; width:80px"><b style="font-size: 17px;">£ {{$performance['revenue']}}</b></p>
                                            </div>
                                            <div class="col-sm-2 " style="text-align: center;">
                                                <label class="col-form-label text-md-right c">Stayed</label>

                                                <p id="stay" style="text-align: center;"><b style="font-size: 17px;">{{$performance['nights_stayed']}}</b></p>

                                            </div>

                                        </div>

                                        <!-- <div id="chart" style="height: 300px;"></div>             -->

                                    </div>
                                </div>
                            </div>


                            <div class="card" style="margin-top: -16px;">
                                <!-- <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                <div class="card-block">
                                    <div id="main" style="height:106px">


                                        <div class="form-group row ">
                                            <div class="col-sm-4 " style="text-align: center;">
                                                <label class="col-form-label text-md-right c">Eco-Score</label>

                                                <p id="ssc" style="text-align: center;"><b style="font-size: 17px;"> {{$performance['ss_score']}}</b></p>


                                            </div>


                                            <div class="col-sm-4 " style="text-align: center;">
                                                <label class="col-form-label text-md-right c">Bookings Made</label>

                                                <p id="bm" style="text-align: center;"><b style="font-size: 17px;">{{$performance['booking_made']}}</b></p>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <h5 style="width: 260px;margin-top:15px"> <i class="fa fa-heart text-green"></i> Eco Summary</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">From</h6>
                                            <input type="date" id="sdate2" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:12px">Until</h6>
                                            <input type="date" id="edate2" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;margin-left:12px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="reward" class="btn btn-primary" style="margin-top: 16px;margin-left:20px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="card" style="margin-top: -16px;">
                                <!-- <div class="card-header">
                                                        <h5>Pie chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                <div class="card-block">
                                    <!-- <div id="pie-chart" style="height:300px"></div> -->
                                    <div class="ct-chart " id="chart1"></div>

                                </div>

                            </div>

                            <div class="card" style="margin-top: -16px;">


                                <div class="card-block">
                                    <h5 id="ecs" style="display: none;text-align: center;
margin: 0;
position: absolute;
top: 50%;
left: 50%;
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);">No Data Found In Pie Chart</h5>
                                    <canvas id="oilChart" width="400" height="200"></canvas>

                                </div>


                            </div>



                            <div class="card">

                                <div class="card-block">
                                    <div id="" style="height:100px; display: inline-block;
    width: 100%;
    overflow: auto;">
                                        <h6>Eco Reward</h6>
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
                            </div>
                        </div>

















                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <h5 style="width: 233px;margin-top:17px"> <i class="fa fa-pencil-square"></i> Eco Review</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>


                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">From</h6>
                                            <input type="date" id="reviewStartDate" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:11px">Until</h6>
                                            <input type="date" id="reviewEndDate" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;margin-left:13px">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button" id="booksubmit2" class="btn btn-primary" style="margin-top: 16px;margin-left:17px">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="card" style="margin-top: -16px;">

                                <div class="card-block">
                                    <div id="pie-chart" style="height:300px;display: inline-block;
    width: 100%;
    overflow: auto;">






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
                                        
                                            <h5 style="text-align: center;  margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No data Available</h5>
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
        var oilCanvas = document.getElementById("oilChart");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var lab = @php echo json_encode($piechart['labels']);
        @endphp;

        var ds = @php echo json_encode($piechart['datasets']);
        @endphp;

        if (lab == '' && ds == '') {
            // alert("hii");
            $('#ecs').css('display', 'block');

        } else {
            $('#ecs').css('display', 'none');
            var oilData = {
                labels: @php echo json_encode($piechart['labels']);@endphp,
                datasets: [{
                    data: @php echo json_encode($piechart['datasets']);@endphp,




                }]
            };

            var pieChart = new Chart(oilCanvas, {
                type: 'pie',
                data: oilData
            });
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

                    $('#dr').html(responsedata.daily_rate);
                    $('#cr').html(responsedata.cancel_rate);
                    $('#rev').html(responsedata.revenue);
                    $('#ssc').html(responsedata.ss_score);
                    $('#bm').html(responsedata.booking_made);
                    $('#stay').html(responsedata.nights_stayed);


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
                        arrival = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No Data Found In Arrival</p>';
                    } else {
                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                arrival = arrival + '  <thead>' +
                                    ' <tr style="float: right;">  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th >Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;


                            arrival = arrival + '<tr style="margin-padding:10px">' +
                                ' <td class="" style="text-align:center;width:25%" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="text-align:center;width:25%" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="text-align:center;width:25%" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="text-align:center;width:25%" id="ta">' + val.total_amount + '</td>' +

                                ' </tr> ';


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
                        bookingnew = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No Data Found In New Booking</p>';
                    } else {
                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                bookingnew = bookingnew + '  <thead>' +
                                    ' <tr style="float: right;">  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th>Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            bookingnew = bookingnew + '<tr style="margin-padding:0px;">' +
                                ' <td class="" style="width: 25%;text-align:center" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="ta">' + val.total_amount + '</td>' +

                                ' </tr> ';


                        })
                    }
                    $('#arr').html('');
                    $('#arr').html(bookingnew);
                }

            })

        });

        // end of New booking onclick fuction given below on 18.03.2021











        // reward onclick fuction given below on 18.03.2021

        $('#reward').on("click", function() {
            //  alert("hiiiii")

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

                    if (lab == '' && ds == '') {
                        // alert("hii");
                        $('#ecs').css('display', 'block');
                        $('#oilChart').css('display', 'none');

                    } else {
                        $('#ecs').css('display', 'none');
                        $('#oilChart').css('display', 'block');
                        var oilCanvas = document.getElementById("oilChart");

                        // Chart.defaults.global.defaultFontFamily = "Lato";
                        Chart.defaults.global.defaultFontSize = 18;

                        var oilData = {
                            labels: responsedata.labels,
                            datasets: [{
                                data: responsedata.datasets,

                            }]
                        };

                        var pieChart = new Chart(oilCanvas, {
                            type: 'pie',
                            data: oilData
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
                        reward = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No Data Found In Reward</p>';
                    } else {


                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                reward = reward + '  <thead>' +
                                    ' <tr  style="float: right;margin-right:16px" >  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Booking Ref</th>  <th  class="col-md-2">Status</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            reward = reward + '<tr style="margin-padding:0px">' +
                                ' <td class="" style="width: 25%;text-align:center" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="br">' + val.booking_reference + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="ta">' + val.conf_reward_status_name + '</td>' +

                                ' </tr> ';


                        })
                    }
                    $('#vrew').html('');
                    $('#vrew').html(reward);

                }

            })

        });

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
                        depature = '<p style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No Data Found In Depature</p>';
                    } else {


                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                depature = depature + '  <thead>' +
                                    ' <tr  style="float: right;" >  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th>Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            depature = depature + '<tr style="margin-padding:0px">' +
                                ' <td class="" style="width: 25%;text-align:center" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="ta">' + val.total_amount + '</td>' +

                                ' </tr> ';


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
                        stayover = '<h6 style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No Data Found In Stay-overs</h6>';
                    } else {
                        $.each(responsedata, function(key, val) {
                            if (x == 1) {
                                stayover = stayover + '  <thead>' +
                                    ' <tr style="float: right;">  <th class="col-md-2">User Name</th>  <th class="col-md-2">Date Range</th> <th class="col-md-2">Total Guests</th>  <th>Total Amount</th> ' +
                                    ' </tr>  </thead>';
                            }
                            x++;

                            stayover = stayover + '<tr style="margin-padding:0px">' +
                                ' <td class="" style="width: 25%;text-align:center" id="un">' + val.user_name + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="pn">' + val.date_range_human + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="br">' + val.total_guests + '</td>' +

                                '<td class="" style="width: 25%;text-align:center" id="ta">' + val.total_amount + '</td>' +

                                ' </tr> ';


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
                        reviewhtml = '<h6 style="text-align:center;margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">No Data Found In Reviews</h6>';
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