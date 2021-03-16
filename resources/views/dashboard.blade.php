@extends('layouts.app')
@section('content')




<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }
</style>
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


                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <h5 style="font-size: 12px;width:222px;margin-top:18px""> <i class="fa fa-newspaper-o"></i> Booking Overview</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:11px">From</h6>
                                            <input type="date" id="sdate1" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;margin-left:11px">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;margin-left:17px">Until</h6>
                                            <input type="date" id="edate1" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;margin-left:17px">

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


                            <div class="card" style="margin-top: -16px;">
                                <!-- <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                <div class="card-block">
                                    <div id="" style="height:100px">


                                        <div class="form-group row ">
                                            <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Arrivals</label>

                                                <p id="ac" style="text-align: center;">{{$bookingobverview['arrivals_count']}}</p>


                                            </div>

                                            <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Departures</label>

                                                <p id="dc" style="text-align: center;">{{$bookingobverview['departures_count']}} </p>


                                            </div>


                                            <div class="col-sm-3 ">
                                                <label class="col-form-label text-md-right c">New Bookings</label>

                                                <p id="nbc" style="text-align: center;"> {{$bookingobverview['new_booking_count']}}</p>


                                            </div>
                                            <div class="col-sm-3 ">
                                                <label class="col-form-label text-md-right c">Stay-Overs</label>

                                                <p name="name" style="text-align: center;">0</p>

                                            </div>
                                            <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Enquries</label>

                                                <p name="name" style="text-align: center;">0</p>

                                            </div>
                                        </div>


                                        <!-- <div id="chart" style="height: 300px;"></div>             -->


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
                                    <div id="main" style="height:296px">


                                        <div class="form-group row ">
                                            <div class="col-sm-4 ">
                                                <label class="col-form-label text-md-right c">Average Daily Rate</label>

                                                <p id="dr">£ {{$performance['daily_rate']}}</p>


                                            </div>

                                            <div class="col-sm-4 ">
                                                <label class="col-form-label text-md-right c">Cancellation Rate</label>

                                                <p id="cr">{{$performance['cancel_rate']}} %</p>


                                            </div>


                                            <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Revenue</label>

                                                <p id="rev">£ {{$performance['revenue']}}</p>


                                            </div>
                                            <div class="col-sm-2 ">
                                                <label class="col-form-label text-md-right c">Stayed</label>

                                                <p id="stay">0</p>


                                            </div>

                                        </div>


                                        <!-- <div id="chart" style="height: 300px;"></div>             -->


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
                                                <h5> <i class="fa fa-heart text-green"></i> Eco Summary</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>



                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">From</h6>
                                            <input type="date" name="" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">To</h6>
                                            <input type="date" name="" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 16px;">Submit</button>
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
                                    <div id="pie-chart" style="height:300px"></div>
                                </div>
                            </div>
                        </div>

















                        <div class="col-xl-6">
                            <div class="card">
                                <form action="" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    <div class="form-group row ">



                                        <div class="col-sm-3">
                                            <div class="card-header">
                                                <h5> <i class="fa fa-pencil-square"></i> Eco Review</h5>
                                                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                            </div>
                                        </div>


                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">From</h6>
                                            <input type="date" id="sdate2" name="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;">
                                        </div>

                                        <div class="col-sm-3 ">
                                            <h6 style="margin-top: 11px;">To</h6>
                                            <input type="date" id="edate2" name="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;">

                                        </div>

                                        <div class="form-group  ">
                                            <label class="col-form-label text-md-right "></label>
                                            <div class="col-sm-2 col-md-7 ">
                                                <button type="button"  id="booksubmit2" class="btn btn-primary" style="margin-top: 16px;">Submit</button>
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
                                    <div id="pie-chart" style="height:300px">

       
                            
                                       
                              <div  id="revcontant">



                              @foreach($review as  $rev)
           
<div class="form-group row" >
<div class="col-sm-4">
   
   <p  id="ue" style="margin-top: 11px;">{{$rev['user_email']}}</p>
  
</div>
<div class="col-sm-4 ">

    <p id="rw" style="margin-top: 11px;">{{$rev['review']}}</p>

</div>
<div class="col-sm-4 ">

    <p id="rat" style="margin-top: 11px;">{{$rev['rating']}}<i class="fa fa-star"></i></p>
   
</div>
</div>
@endforeach
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
    $(function () {

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
    })],
        })

    });

</script>
 <link rel="stylesheet" type="text/css" href="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.min.css"/>
 <link rel="stylesheet" type="text/css" href="https://rawgit.com/Globegitter/chartist-plugin-tooltip/master/dist/chartist-plugin-tooltip.css"/>

 <script type="text/javascript" src="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.js"></script>
 <script type="text/javascript" src="https://rawgit.com/Globegitter/chartist-plugin-tooltip/master/dist/chartist-plugin-tooltip.min.js"></script>
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


            }

        })




    });








    $('#booksubmit2').on("click", function() {
        var sdate = $("#sdate2").val();
        var edate = $("#edate2").val();
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

          var reviewhtml='';
    $.each(responsedata, function (key, val) {
        // alert(val.user_email);


        reviewhtml =reviewhtml + ' <div class="form-group row"> <div class="col-sm-4">'+
   
   '<p  id="ue" style="margin-top: 11px;">'+val.user_email+'</p>'+
  
'</div>'+
'<div class="col-sm-4 ">'+

    '<p id="rw" style="margin-top: 11px;">'+val.review+'</p>'+

'</div>'+
'<div class="col-sm-4 ">'+

    '<p id="rat" style="margin-top: 11px;">'+val.rating+'<i class="fa fa-star"></i></p>'+
   
'</div></div>';
        // $('#ue').html(responsedata.user_email);
        //         $('#rw').html(responsedata.review);
        //         $('#rat').html(responsedata.rating);
    });
    // alert(reviewhtml.replace("NaN",""));
    var revhtml= reviewhtml.replace("NaN","");
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
                })],
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

                $('#ac').html(responsedata.arrivals_count);
                $('#dc').html(responsedata.departures_count);
                $('#nbc').html(responsedata.new_booking_count);


            }

        })



   


    });




</script>


</section>
@endsection