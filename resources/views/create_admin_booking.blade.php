@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Booking</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">

                            <p class="">Create Booking</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('adminbookings.index') }}">Booking</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">




        <section class="section">


            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('adminbookings.store') }}" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    @csrf


                                    @if(session('success') !== null)
                                    <div class="succWrap">
                                        {{ session('success') }}
                                    </div>
                                    <!-- <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div> -->
                                    @endif

                                    @if(session('errors') !== null)

                                    @foreach(session('errors') as $v)
                                    @foreach($v as $e)

                                    <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>


                                    @endforeach

                                    @endforeach
                                    @endif


                                    @if(session('error') !== null)
                                    <div class="errorWrap"><strong>ERROR</strong>: {{session('error') }} </div>

                                    @endif

                                    @if(session('message') !== null)
                                    <div class="errorWrap"><strong>ERROR</strong>: {{session('message') }} </div>

                                    @endif
                                    <!--
                             <div class="form-group row">
                                                        <div class="col-sm-4 offset-5">
                                                        <label class="col-form-label text-md-right ">Status Desc</label>
                                                        <textarea name="status_desc" class="summernote-simple form-control" required>{{ old('status_desc') }}</textarea>
                                                        </div>
                            </div> -->




                                    <div class="form-group row ">
                                    <div class="col-sm-2">
                                            <label class="col-form-label text-md-right ">Check In Date </label>
                                            <input type="date" id="sdate" name="check_in_date" value="{{ old('check_in_date') }}" class="summernote-simple form-control" required>

                                        </div>

                                        <div class="col-sm-2">
                                        <label class="col-form-label text-md-right ">Check Out Date </label>
                                        <input type="date" id="edate" name="check_out_date" value="{{ old('check_out_date') }}" class="summernote-simple form-control" required>

                                    </div>


                                        <div class="col-sm-4">
                                            <label class="col-form-label text-md-right ">Property</label>
                                            <select class="js-example-basic-single col-sm-12" name="property_id" id="property" placeholder="status" required class="form-control selectric" required>
                                                <option value="">Select</option>
                                                @foreach($property as $propertys)
                                                <option value="{{ $propertys['id'] }}" {{ (old("property_id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- <div class="col-sm-4">
                                            <label class="col-form-label text-md-right ">Booking Status</label>
                                            <select class="js-example-basic-single col-sm-12" name="booking_status_id" id="" placeholder="status" required class="form-control selectric" required>
                                                <option value="" disabled>Select</option>
                                                @foreach($bookingstauts as $bookingstautss)
                                                <option value="{{ $bookingstautss['id'] }}" {{ (old("booking_status_id") == $bookingstautss['id'] ? "selected":"") }}>{{ $bookingstautss['description'] }}</option>
                                                @endforeach
                                            </select>
                                        </div> -->
                                    

                                        {{-- <div class="col-sm-2">
                                            <label class="col-form-label text-md-right ">Check In Time </label>
                                            <input type="time" step="1" name="check_in_date_time" value="{{ old('check_in_date_time') }}" class="summernote-simple form-control" required>
                                        <!-- <input type="time" id="myTime" step="2"> -->

                                    </div> --}}
                                 
                                    <div class="col-sm-4">
                                        <label class="col-form-label text-md-right ">Length Of Stay</label>
                                        <input id="lens" type="number" min="0" name="length_of_stay" value="{{ old('length_of_stay') }}" class="summernote-simple form-control lens" required>

                                    </div>

                                    {{-- <div class="col-sm-2">
                                            <label class="col-form-label text-md-right ">Check Out Time </label>
                                            <input type="time" step="1" name="check_out_date_time" value="{{ old('check_out_date_time') }}" class="summernote-simple form-control" required>
                                    <!-- <input type="time" id="myTime" step="2"> -->

                            </div> --}}


                        </div>
                        <div class="form-group  ">
                            <div class="" id="room">
                                <!-- <label class="col-form-label text-md-right ">Rooms</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="room_id[]" id="rooms" placeholder="Vendor" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        @foreach($rooms as $roomss)
                                        <option value="{{ $roomss['id'] }}" {{ (old("room_id[]") == $roomss['id'] ? "selected":"") }}>{{ $roomss['room_type_name'] }}</option>
                                           
                                        @endforeach
                                    </select>

                                                        <div id="response" style="position: absolute;
                                                        top: 10%;
                                                        left: 50%;
                                                        "></div> -->


                            </div>
                        </div>
                        <div class="form-group row ">



                            {{--
                                        <div class="col-sm-2">
                                            <label class="col-form-label text-md-right ">Book On Date </label>
                                            <input type="date" name="booked_on" value="{{ old('starts_at') }}" class="summernote-simple form-control" required>

                        </div>

                        <div class="col-sm-2">
                            <label class="col-form-label text-md-right ">Book On Time </label>
                            <input type="time" step="2" name="booked_on_time" class="summernote-simple form-control" require>
                            <!-- <input type="time" id="myTime" step="2"> -->

                        </div> --}}





                    </div>





                    <div class="form-group row ">


                        <!-- <div class="col-sm-4">
                                            <label class="col-form-label text-md-right ">Card Type</label>
                                            <input name="card_type" value="{{ old('card_type') }}" class="summernote-simple form-control" required>

                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-form-label text-md-right ">Card Number</label>
                                            <input type="number" step="any" name="card_no" value="{{ old('card_no') }}" class="summernote-simple form-control" required>

                                        </div> -->


                        <div class="col-sm-4">
                            <label class="col-form-label text-md-right ">Taxes</label>
                            <select class="js-example-basic-single col-sm-12" name="tax_id" id="" required class="form-control selectric">
                                <option value="">Select</option>
                                @foreach($tax as $taxs)

                                <option value="{{ $taxs['id'] }}" {{ (( $taxs['name'] === 'Gst') ? "selected" : "")}}>{{ $taxs['name'] }}</option>
                                <!-- <option value="{{ $taxs['id'] }}" {{ (old("tax_id") == $taxs['id'] ? "selected":"") }}>{{ $taxs['name'] }}</option> -->
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label text-md-right ">Tax Percentage</label>
                            <input id="tp" type="number" min="0" step="any" name="tax_percentage" value="{{ $tax[0]['percentage']}}" class="summernote-simple form-control" required>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-right ">Total Adults</label>
                            <input id="toats" min="0" name="total_adults" value="{{ old('total_adults') }}" class="summernote-simple form-control toats" readonly>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-right ">Total Childrents</label>
                            <input id="tocds" min="0" name="total_childs" value="{{ old('total_childs') }}" class="summernote-simple form-control tocds" readonly>
                        </div>

                    </div>
                    <div class="form-group row ">

                        <div class="col-sm-4" id="eco">
                            <label class="col-form-label text-md-right ">Eco Causes</label>
                            <select class="js-example-basic-single col-sm-12" name="ecocauses[]" id="ecocauses" multiple required class="form-control selectric" required>

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label text-md-right ">Total Gust</label>
                            <input id="togst" min="0" name="total_guests" value="{{ old('total_guests') }}" class="summernote-simple form-control togst" readonly>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label text-md-right ">Tax Amount </label>
                            <input id="taxamt" min="0" name="tax_amount" value="{{ old('tax_amount') }}" class="summernote-simple form-control togst" readonly>
                        </div>


                        <div class="col-sm-4">
                            <label class="col-form-label text-md-right ">Total Amount</label>
                            <input id="toamt" name="total_amount" value="{{ old('total_amount') }}" class="summernote-simple form-control toamt" readonly>
                        </div>


                        <div class="col-sm-4">
                            <label class="col-form-label ">Status</label>
                            <select class="js-example-basic-single" name="status_id" id="" placeholder="status" required class="form-control selectric" required>
                                <option value="" disabled>Select</option>
                                @foreach($statuses as $status)
                                <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                @endforeach
                            </select>
                        </div>



                    </div>

                    {{-- <div class="form-group row ">

                                      
                                       


                                        <!-- <div class="col-sm-4">
                                            <label class="col-form-label text-md-right ">Payment Status</label>
                                            <select class="js-example-basic-single col-sm-12" name="payment_status_id" id="" placeholder="status" required class="form-control selectric">
                                                <option value="" disabled>Select</option>
                                                @foreach($paymentstatus as $paymentstatuss)
                                                <option value="{{ $paymentstatuss['id'] }}" {{ (old("id") == $paymentstatuss['id'] ? "selected":"") }}>{{ $paymentstatuss['payment_status_desc'] }}</option>
                    @endforeach
                    </select>
                </div> -->


            </div> --}}



            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right "></label>
                <div class="col-sm-12 col-md-7 offset-5">
                    <button id="generate" type="button" class="btn btn-warning waves-effect waves-light">Generate</button>
                    <button type="submit" id="submit" class="btn btn-primary">Create Booking</button>
                </div>
            </div>

            </form>
    </div>
</div>
</div>
</div>
</div>

</section>

<script>
    $(window).on("load", function() {
        if ($('#property').val() != "") {
            var prope_id = $('#property').val();
            // $("#property").destroy
            // $('#room').show();
            // var prope_id = e.target.value;
            $('#room').empty('');

            //  alert(vendor_id);

            //              $.ajaxSetup({
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            //     'Content-Type':'application/json',
            //     'Accept' : 'application/vnd.api.v1+json'
            // });
            if (prope_id) {
                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/vnd.api.v1+json'
                    },
                    url: "{{ url('getprodroom')}}" + "/" + prope_id,

                    type: "GET",

                    // data: {
                    //   id : cat_id
                    // },

                    crossDomain: true,
                    beforeSend: function() {
                        $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                    },

                    success: function(responsedata) {
                        $('#response').html('');

                        // var data = JSON.parse(responsedata);
                        //  console.log(responsedata);

                        var rooms = responsedata;

                        //   console.log(rooms);

                        //  $('#rooms').empty();
                        //  $('#rooms').append('');
                        var aaaa = "";
                        $.each(rooms, function(index, room) {
                            //  alert(room.id);



                            aaaa = aaaa + '<div class="row"><div class="col-sm-4">  <label class="col-form-label text-md-right ">Room Name</label><input name="room_type[]" class="summernote-simple form-control" style="background-color:#D3D3D3!important" value="' + room.room_type_name + '" readonly> <input type="hidden" name="room_id[]"  value="' + room.id + '" class="summernote-simple form-control"></div>' +
                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Room (Available Rooms: ' + room.available_rooms + ')</label><input id="norms" max="' + room.available_rooms + '" name="no_of_rooms[]" value="{{ old("no_of_rooms[]") }}" min="0" class="summernote-simple form-control norms" ></div>' +

                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Adults(Max Adult: ' + room.max_adults + ')</label><input id="sub1" max="' + room.max_adults + '" type="number" name="no_of_adults[]" value="{{ old("no_of_adults[]") }}" min="0" class="summernote-simple form-control sub1" required ></div>' +


                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Childrens (Max Children: ' + room.max_children + ')</label><input id="sub2" max="' + room.max_children + '" type="number" name="no_of_childs[]" value="{{ old("no_of_childs[]") }}" min="0" class="summernote-simple form-control sub2" required></div>' +


                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Occupancy (Max Occupancy: ' + room.max_occupancy + ')</label><input id="diff" type="number" value="{{ old("total_guests[]") }}" name="total_guests[]" min="0" class="summernote-simple form-control diff" ></div>' +


                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Amount</label><input id="amt" name="amount[]" class="summernote-simple form-control amt" style="background-color:#D3D3D3!important" value="' + room.amount + '" readonly></div></div>';

                            $(function() {
                                $(".sub1, .sub2").on("keydown keyup", diff);

                                function diff() {
                                    //alert('test');
                                    var sub1names = document.getElementsByName('no_of_adults[]');
                                    var sub2names = document.getElementsByName('no_of_childs[]');
                                    var diffnames = document.getElementsByName('total_guests[]');
                                    for (var i = 0, iLen = sub1names.length; i < iLen; i++) {

                                        var total = Number(sub1names[i].value) + Number(sub2names[i].value);

                                        diffnames[i].value = total;
                                        // alert(total);
                                    }
                                    // $("#diff").val(parseFloat(Number((Number($("#sub1").val()) + Number($("#sub2").val())))));
                                    //            $("#yrdiff").val(Number($("#plan1").val()) + Number($("#plan2").val()) + Number($("#plan3").val()) + Number($("#plan4").val()) + Number($("#plan5").val()));
                                }

                            });


                        })

                        $.each(ecocauses, function(index, el) {
                            // alert(el);
                            $("#ecocauses").append("<option value=" + el.id + " >" + el.name + "</option>");
                        });

                        $('#room').html(aaaa);
                    }
                })


            }


            // $("#property").val($('#property').val()).ch;
        }
    });

    $(document).ready(function() {



        $('#property').on('change', function(e) {

            var prope_id = e.target.value;
            var sdate = $("#sdate").val();
            // alert(sdate1);
            var edate = $("#edate").val();
            $('#room').empty('');
            // alert(sdate);
            //  alert(vendor_id);
            if(!sdate || !edate ){
                alert("Please Select Check In Check Out Date");
            }
         

            if (prope_id) {
                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/vnd.api.v1+json'
                    },
                    url: "{{ url('getprodroom')}}" + "/" + prope_id + "/" + sdate + "/" + edate,

                    type: "GET",

                    // data: {
                    //   id : cat_id
                    // },

                    crossDomain: true,
                    beforeSend: function() {
                        $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                    },

                    success: function(responsedata) {
                        $('#response').html('');

                        // var data = JSON.parse(responsedata);
                        //  alert(responsedata.rooms);
                        alert(responsedata);
                        // var rdata = responsedata.split("*");

                        var rooms = responsedata.rooms;

                        var ecocauses = responsedata.EcoCauses;

                        //    alert(rooms);

                        var aaaa = "";
                        $.each(rooms, function(index, room) {
                            //  alert(room);

                            aaaa = aaaa + '<div class="row"><div class="col-sm-4">  <label class="col-form-label text-md-right ">Room Name</label><input name="room_type[]" class="summernote-simple form-control" style="background-color:#D3D3D3!important" value="' + room.room_type_name + '" readonly> <input type="hidden" name="room_id[]"  value="' + room.id + '" class="summernote-simple form-control"></div>' +
                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Room (Available Rooms: ' + room.available_rooms + ')</label><input id="norms" max="' + room.available_rooms + '" name="no_of_rooms[]" min="0" class="summernote-simple form-control norms" ></div>' +

                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Adults(Max Adult: ' + room.max_adults + ')</label><input id="sub1" max="' + room.max_adults + '" type="number" name="no_of_adults[]" min="0" value="{{ old("no_of_adults[]") }}" class="summernote-simple form-control sub1" required ></div>' +


                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Childrens (Max Children: ' + room.max_children + ')</label><input id="sub2" max="' + room.max_children + '" type="number" min="0" name="no_of_childs[]" value="{{ old("no_of_childs[]") }}" class="summernote-simple form-control sub2" required></div>' +


                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Number Of Occupancy (Max Occupancy: ' + room.max_occupancy + ')</label><input id="diff" type="number" value="{{ old("total_guests[]") }}" min="0" name="total_guests[]" class="summernote-simple form-control diff" ></div>' +


                                '<div class="col-sm-4"><label class="col-form-label text-md-right ">Amount</label><input id="amt" name="amount[]" class="summernote-simple form-control amt" style="background-color:#D3D3D3!important" value="' + room.amount + '" readonly></div>' +

                                ' </div>';


                            //   var combo = $("<select class=\"js-example-basic-single col-sm-12  form-control selectric\" id=\"ecocauses[]\" name=\"ecocauses\"   / >");
                            //   combo.append("<option>" + "select" + "</option>");



                            // return combo;
                            // OR
                            // $("#ecocauses").append(combo);


                            $(function() {
                                $(".sub1, .sub2").on("keydown keyup", diff);

                                function diff() {
                                    //alert('test');
                                    var sub1names = document.getElementsByName('no_of_adults[]');
                                    var sub2names = document.getElementsByName('no_of_childs[]');
                                    var diffnames = document.getElementsByName('total_guests[]');
                                    for (var i = 0, iLen = sub1names.length; i < iLen; i++) {

                                        var total = Number(sub1names[i].value) + Number(sub2names[i].value);

                                        diffnames[i].value = total;
                                        // alert(total);
                                    }
                                    // $("#diff").val(parseFloat(Number((Number($("#sub1").val()) + Number($("#sub2").val())))));
                                    //            $("#yrdiff").val(Number($("#plan1").val()) + Number($("#plan2").val()) + Number($("#plan3").val()) + Number($("#plan4").val()) + Number($("#plan5").val()));
                                }

                            });


                        })
                        $.each(ecocauses, function(index, el) {
                            // alert(el);
                            $("#ecocauses").append("<option value=" + el.id + " >" + el.name + "</option>");
                        });


                        $('#room').html(aaaa);
                    }
                })


            }

        });


        //     $('#rooms').on('change',function(e) {

        //      var room_id = e.target.value;


        //  if (room_id) {
        //               $.ajax({

        //                  headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //      'Content-Type':'application/json',
        //      'Accept' : 'application/vnd.api.v1+json' },
        //      url:"{{ url('getrooms')}}" + "/" + room_id,

        //                     type:"GET",



        //                     crossDomain:true,
        //                     beforeSend: function() {
        //                          $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
        //                      },

        //                     success:function (responsedata) {
        //                      $('#response').html('');


        //                    console.log(responsedata);

        //                       var room = responsedata;

        //                       console.log(room);



        //                     }
        //                 })


        //  }



        //              });



    });
</script>
<script>
    $("#edate").change(function() {
        // alert("hii");
        var edate = new Date($('#edate').val());
        var sdate = new Date($('#sdate').val());

        days = (edate - sdate) / (1000 * 60 * 60 * 24);
        // days=days+1;
        // alert (days);
        $("#lens").val(days);
    });
</script>
<script>
    $(document).on("keydown keyup", ".sub1", function() {
        var sum = 0;
        $(".sub1").each(function() {
            sum += +$(this).val();
        });
        $(".toats").val(sum);
    });
    $(document).on("keydown keyup", ".sub2", function() {
        var sum = 0;
        $(".sub2").each(function() {
            sum += +$(this).val();
        });
        $(".tocds").val(sum);
    });

    $(document).ready(function() {

        $('#generate').on("click", function() {
            const selectedPropertyVal = $('#property').val();
            if (selectedPropertyVal !== '') {
                var totaladults = $("#toats").val() !== '' ? parseInt($("#toats").val()) : 0;
                var totalchild = $("#tocds").val() !== '' ? parseInt($("#tocds").val()) : 0;
                // alert(totalchild+totaladults);
                var taxpercentage = $("#tp").val() !== '' ? parseInt($("#tp").val()) : 0;
                var tar = totaladults + totalchild;

                const noOfRoomsData = $('#addstatus').find('input[name= "no_of_rooms[]"]').map(function() {
                    return $(this).val();
                }).get();
                const roomAmtData = $('#addstatus').find('input[name= "amount[]"]').map(function() {
                    return $(this).val();
                }).get();
                const lengthOfStayValue = $(".lens").val() !== '' ? $(".lens").val() : 0;


                var totalAmt = 0;
                noOfRoomsData.forEach((item, idx) => {
                    // alert (idx);
                    let roomValue = item !== '' ? item : 0;
                    let roomAmt = roomAmtData[idx] !== '' ? roomAmtData[idx] : 0;
                    totalAmt += parseInt(roomValue) * parseFloat(roomAmt) * parseInt(lengthOfStayValue);
                });
                taxperc = (taxpercentage / 100) * totalAmt;
                // alert (taxperc);
                let alertMsg = '';

                // $('#tp').val(taxperc);
                if (parseFloat(tar) > 0)
                    $('#togst').val(tar);
                else
                    alertMsg = 'Total Adults, Total Children';

                if (parseFloat(taxperc) > 0)
                    $('#taxamt').val(taxperc);
                else
                    alertMsg = 'Total percent, Total amount';

                if (parseFloat(totalAmt) > 0)
                    $('.toamt').val(totalAmt + taxperc);
                else
                    alertMsg += ' & No of Rooms';

                if (alertMsg !== '')
                    swal(`Please enter ${alertMsg}`);

            } else {
                swal('Please choose a Property');
            }
        });
    });
</script>

</div>
</div>
@endsection