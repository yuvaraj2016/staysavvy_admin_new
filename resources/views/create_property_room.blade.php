@extends('layouts.app')
@section('content')
<style>
.ss {
  display: inline-block;
  position: relative;
}

.let{
    border: 2px solid #c9c9c9;
  box-shadow: none;
  /* font-family: "Roboto Regular", sans-serif; */
  font-size:20px;
  height: 42px;
  padding-left: 20px;
}

.ss::before {
  content: "£";
  font-family: "Roboto Regular", sans-serif;
  font-size: 1.5em;
  position: absolute;
  left: 5px;
  top: 50%;
  transform: translateY(-50%);
}

</style>
{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Room</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Room</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Rooms</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">




<section class="section" >
    <!-- <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('status.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Status</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('status.index') }}">Statuses</a></div>
            <div class="breadcrumb-item">Create Status</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" class="swa-confirm"  method="post" id="addstatus"
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
                                                        <select id="prop" class="js-example-basic-single col-sm-12 form-control selectric" name="property_id"  placeholder="status" required  >
                                        <option value="" disabled>Select</option>
                                        @foreach($property as $propertys)
                                            <option value="{{ $propertys['id'] }}" {{ (old("property_id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                        <div class="col-sm-4" id="roomtype" style="display: none;">
                                                        <label class="col-form-label text-md-right ">Room Type</label>
                                                        <select id="room" class="js-example-basic-single col-sm-12" name="room_type_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="" disabled>Select</option>
                                        <!-- @foreach($confRoomType as $confRoomTypes)
                                            <option value="{{ $confRoomTypes['id'] }}" {{ (old("room_type_id") == $confRoomTypes['id'] ? "selected":"") }}>{{ $confRoomTypes['name'] }}</option>
                                        @endforeach -->
                                    </select>
                                                        </div>
                          

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">No Of Rooms</label>
                                                        <input type="number"  name="no_of_rooms" value="{{ old('no_of_rooms') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                          
                            </div>

                            <div class="form-group row ">
                         

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Available Rooms</label>
                                                        <input type="number" name="available_rooms" value="{{ old('available_rooms') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                          

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Max Adults</label>
                                                        <input type="number" name="max_adults" value="{{ old('max_adults') }}" class="summernote-simple form-control" required>
               
                                                        </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Max Children</label>
                                                        <input type="number" name="max_children" value="{{ old('max_children') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                          
                            </div>





                            <div class="form-group row ">
                            

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Max Occupancy</label>
                                                        <input type="number" name="max_occupancy" value="{{ old('max_occupancy') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Room Location</label>
                                                        <input  name="room_location" value="{{ old('room_location') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Price Of Room Per Night</label>
                                                       <span class="ss"> <input type="number"  step="any" name="amount" value="{{ old('amount') }}" class="summernote-simple form-control let" required></span>
               
                                                        </div>

                                                
                          
                            </div>







                            <div class="form-group row ">


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
                                                        <label class="col-form-label text-md-right ">Amenity</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="amenities[]" id="" multiple placeholder="status" required class="form-control selectric" >
                                        <option value="" disabled>Select</option>
                                        @foreach($amenity as $amenitys)
                                            <option value="{{ $amenitys['id'] }}" {{ (old("id") == $amenitys['id'] ? "selected":"") }}>{{ $amenitys['name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                        <div class="col-sm-12 text-center">
                                                                            
                                                            <label class="col-form-label text-md-right ">Photos</label>
                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control" required>
                                                            
                                                        </div>
                                                        {{-- <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Room Image Picture</label>
                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div> --}}
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create Room</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>

$(document).ready(function() {

    var prope_id = $('#prop').val();
   

   if (prope_id) {
       $.ajax({

           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
               'Content-Type': 'application/json',
               'Accept': 'application/vnd.api.v1+json'
           },
           url: "{{ url('proproomtype')}}" + "/" + prope_id,

           type: "GET",

           crossDomain: true,
           beforeSend: function() {
               $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
           },

           success: function(responsedata) {
               // $('#response').html('');
       
               // var rooms = responsedata.rooms;

                var roomtypes = responsedata;
                if(responsedata == ''){
                    swal("<h5>There Is No Room Type For This Property Please Create</h5>");
                    $("#roomtype").css('display','none');
                   
                    return;
                }

              console.log(responsedata);

      
       
               $.each(roomtypes, function (index, el) {
// alert(el);
$("#room").append("<option value="+el.id +" >" + el.name + "</option>");
});

$("#roomtype").css('display','block');
               // $('#room').html(aaaa);
           }
       })


   }
   
   






$('#prop').on('change', function(e) {
    // var prop = $("#Prop").val();
    var prope_id = e.target.value;
   

    if (prope_id) {
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/vnd.api.v1+json'
            },
            url: "{{ url('proproomtype')}}" + "/" + prope_id,

            type: "GET",

            crossDomain: true,
            beforeSend: function() {
                $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
            },

            success: function(responsedata) {
                // $('#response').html('');
                $("#room").empty();
                // var rooms = responsedata.rooms;

                 var roomtypes = responsedata;
                 if(responsedata == ''){
                     swal("<h5>There Is No Room Type For This Property Please Create</h5>");
                     $("#roomtype").css('display','none');
                     return;
                 }

               console.log(responsedata);

       
        
                $.each(roomtypes, function (index, el) {
// alert(el);
$("#room").append("<option value="+el.id +" >" + el.name + "</option>");
});

$("#roomtype").css('display','block');
                // $('#room').html(aaaa);
            }
        })


    }

});




});




</script>


    
 
</section>
    </div>
</div>
<style>
.jFiler-item-container
{
    width:210px!important;
    
}

.jFiler-item
{
    width:240px!important;
    
}

.jFiler-row
{
    margin-left:100px!important;

}

</style>
@endsection



