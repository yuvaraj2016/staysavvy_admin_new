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




<section class="section" >


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('adminbookings.store') }}" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                            @csrf

               
                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                                <!-- <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div> -->
                            @endif

                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)

                                   <div class="errorWrap"><strong>ERROR</strong>:  {{ $e }} </div>

                                   <!-- <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div> -->
                                   @endforeach

                                @endforeach
                            @endif

                            <!-- @if(session('success') !== null)
                                <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)
                                   <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div>
                                   @endforeach

                                @endforeach
                            @endif -->
                            <!-- <div class="form-group row">
                                                        <div class="col-sm-4 offset-5">
                                                        <label class="col-form-label text-md-right ">Status Desc</label>
                                                        <textarea name="status_desc" class="summernote-simple form-control" required>{{ old('status_desc') }}</textarea>
                                                        </div>
                            </div> -->




                            <div class="form-group row ">
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Property</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="property_id" id="property" placeholder="status" required class="form-control selectric" required>
                                        <option value="" >Select</option>
                                        @foreach($property as $propertys)
                                            <option value="{{ $propertys['id'] }}" {{ (old("property_id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Rooms</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="room_id[]" id="rooms" placeholder="Vendor" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        <!-- @foreach($rooms as $roomss) -->
                                        <!-- <option value="{{ $roomss['id'] }}" {{ (old("room_id[]") == $roomss['id'] ? "selected":"") }}>{{ $roomss['room_type_name'] }}</option> -->
                                           
                                        <!-- @endforeach -->
                                    </select>

                                                        <div id="response" style="position: absolute;
                                                        top: 10%;
                                                        left: 50%;
                                                        "></div>
                                
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Booking Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="booking_status_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="" disabled>Select</option>
                                        @foreach($bookingstauts as $bookingstautss)
                                            <option value="{{ $bookingstautss['id'] }}" {{ (old("booking_status_id") == $bookingstautss['id'] ? "selected":"") }}>{{ $bookingstautss['description'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                          

                                                 
                          
                            </div>

                            <div class="form-group row ">
                         
                            <div class="col-sm-2">
                                                        <label class="col-form-label text-md-right ">Check In Date </label>
                                                        <input type="date"  name="check_in_date" value="{{ old('starts_at') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-2">
                                                        <label class="col-form-label text-md-right ">Check In Time </label>
                                                        <input  type="time"  step="2" name="check_in_date_time"  class="summernote-simple form-control" require >
                                                        <!-- <input type="time" id="myTime" step="2"> -->
               
                                                        </div>
                            <div class="col-sm-2">
                                                        <label class="col-form-label text-md-right ">Check Out  Date </label>
                                                        <input type="date"  name="check_out_date" value="{{ old('starts_at') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-2">
                                                        <label class="col-form-label text-md-right ">Check Out Time </label>
                                                        <input  type="time"  step="2" name="check_out_date_time"  class="summernote-simple form-control" require >
                                                        <!-- <input type="time" id="myTime" step="2"> -->
               
                                                        </div>
                          

                                                        <div class="col-sm-2">
                                                        <label class="col-form-label text-md-right ">Book On  Date </label>
                                                        <input type="date"  name="booked_on" value="{{ old('starts_at') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-2">
                                                        <label class="col-form-label text-md-right ">Book On Time </label>
                                                        <input  type="time"  step="2" name="booked_on_time"  class="summernote-simple form-control" require >
                                                        <!-- <input type="time" id="myTime" step="2"> -->
               
                                                        </div>


                                                      
                          
                            </div>





                            <div class="form-group row ">
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Length Of Stay</label>
                                                        <input type="number" name="length_of_stay" value="{{ old('length_of_stay') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Card Type</label>
                                                        <input  name="card_type" value="{{ old('card_type') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Card Number</label>
                                                        <input type="number" step="any"  name="card_no" value="{{ old('card_no') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                                                       

                                                
                          
                            </div>







                            <div class="form-group row ">
                            <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Taxes</label>
                                                                    <select  class="js-example-basic-single col-sm-12" name="taxes[]" id="" multiple required class="form-control selectric" required>
                                                                        <option value="">Select</option>
                                                                        @foreach($tax as $taxs)
                                                                            <option value="{{ $taxs['id'] }}" {{ (old("id") == $taxs['id'] ? "selected":"") }}>{{ $taxs['name'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                            <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Tax Percentage</label>
                                                            <input type="number" step="any"  name="tax_percentage" value="{{ old('tax_percentage') }}" class="summernote-simple form-control" required>
                                                        </div>

                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="" disabled>Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                        
 
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Payment Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="payment_status_id" id="" multiple placeholder="status" required class="form-control selectric" >
                                        <option value="" disabled>Select</option>
                                        @foreach($paymentstatus as $paymentstatuss)
                                            <option value="{{ $paymentstatuss['id'] }}" {{ (old("id") == $paymentstatuss['id'] ? "selected":"") }}>{{ $paymentstatuss['payment_status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                   
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
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

// $(document).ready(function () {

          
             
// $('#property').on('change',function(e) {
 
//  var prope_id = e.target.value;

//   alert(prope_id);


// if (prope_id) {
//  $.ajax({
    
//     headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
// 'Content-Type':'application/json',
// 'Accept' : 'application/vnd.api.v1+json' },
//        url:"{{ url('getprodroom')}}" + "/" + prope_id,
   
//        type:"GET",
   
     

//        crossDomain:true,
//        beforeSend: function() {
//             $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
//         },

//        success:function (responsedata) {
//          console.log(responsedata);
//         $('#response').html('');

       

//         var subcategories = responsedata.SubCategories.data;

//         $('#sub_category').empty();
//         $('#sub_category').append('<option value="">Select</option>');

//         $.each(subcategories,function(index,subcategory){
//             // alert(subcategory.id);
//             $('#sub_category').append('<option value="'+subcategory.id+'{{ (old("sub_category_id") =='. subcategory.id '? "selected":"") }}">'+subcategory.sub_category_desc +'</option>');
//         })

//        }
//    })


// }






// });


// });
</script>
<script>
$(document).ready(function () {



$('#property').on('change',function(e) {
             
    var prope_id = e.target.value;

            //  alert(vendor_id);

//              $.ajaxSetup({
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//     'Content-Type':'application/json',
//     'Accept' : 'application/vnd.api.v1+json'
// });
if (prope_id) {
             $.ajax({
                
                headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    'Content-Type':'application/json',
    'Accept' : 'application/vnd.api.v1+json' },
    url:"{{ url('getprodroom')}}" + "/" + prope_id,
               
                   type:"GET",
               
                    // data: {
                    //   id : cat_id
                    // },

                   crossDomain:true,
                   beforeSend: function() {
                        $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                    },

                   success:function (responsedata) {
                    $('#response').html('');

                    // var data = JSON.parse(responsedata);
                  console.log(responsedata);

                    var rooms = responsedata;

                     console.log(rooms);

                    $('#rooms').empty();
                    $('#rooms').append('<option value="">Select</option>');

                    $.each(rooms,function(index,room){
                         alert(room.id);
                        $('#rooms').append('<option value="'+room.id+'{{ (old("room_id") =='. room.id '? "selected":"") }}">'+room.room_type_name +'</option>');
                    })

                   }
               })


}






            });


            $('#rooms').on('change',function(e) {
             
             var room_id = e.target.value;
         
                     // alert(room_id);
         
         //              $.ajaxSetup({
         //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         //     'Content-Type':'application/json',
         //     'Accept' : 'application/vnd.api.v1+json'
         // });
         if (room_id) {
                      $.ajax({
                         
                         headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             'Content-Type':'application/json',
             'Accept' : 'application/vnd.api.v1+json' },
             url:"{{ url('getrooms')}}" + "/" + room_id,
                        
                            type:"GET",
                        
                             // data: {
                             //   id : cat_id
                             // },
         
                            crossDomain:true,
                            beforeSend: function() {
                                 $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                             },
         
                            success:function (responsedata) {
                             $('#response').html('');
         
                             // var data = JSON.parse(responsedata);
                           //console.log(responsedata);
         
                            //  var rooms = responsedata;
         
                           //   console.log(rooms);
         
                            // $('#rooms').empty();
                            // $('#rooms').append('<option value="">Select</option>');
         
                            //  $.each(rooms,function(index,room){
                            //       alert(room.id);
                            //      $('#rooms').append('<option value="'+room.id+'{{ (old("room_id") =='. room.id '? "selected":"") }}">'+room.room_type_name +'</option>');
                            //  })
         
                            }
                        })
         
         
         }
         
         
         
         
         
         
                     });
















});

</script>


    </div>
</div>
@endsection



