@extends('layouts.app')
@section('content')
<script type="text/javascript">
    jQuery(document).on("click", ".submit", function (e) {
  
    if( document.getElementById("filer_input").files.length == 0 ){
    e.preventDefault();
    // alert('Please Upload Property Image');
    swal("Error","Please upload Property Image");
    }
    
    });

    jQuery(document).on("click", ".room_submit", function (e) {
  
    if( document.getElementById("room_image").files.length == 0 ){
    e.preventDefault();
    // alert('Please Upload Room Image');
    swal("Error","Please upload Room Image");
    }
    
    });
  
    </script>
{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Room Type</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Room Type</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('properties.index') }}">Properties</a>
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
                       

           
                        @if(session('success') !== null)
                        <div class="succWrap">
                        {{ session('success') }} 
                        </div>
                        
                        @endif

                        @if(session('psuccess') !== null)
                        <div class="succWrap">
                        {{ session('psuccess') }} 
                        </div>
                        
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

                        @if(session('perror') !== null)

                        @foreach(session('perror') as $v)
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
                        @endif-->
                        @if(session('pcreateerror') !== null)

                                <div class="errorWrap"><strong>ERROR</strong>:  {{ session('pcreateerror') }} </div>

                            
                        @endif
                    
                 
                            <div class="tab-pane @if(session('psuccess') !== null) show active @elseif(session('rsuccess') !== null) show active @else @endif fade" id="room-types">
                              
                                <form action="{{ route('prooms.create') }}" class="swa-confirm"  method="post" id="addstatus"
                                enctype="multipart/form-data">
                                @csrf

                
                                @if(session('rsuccess') !== null)
                                <div class="succWrap">
                                {{ session('rsuccess') }}
                                </div>
                                @endif

                                @if(session('rerror') !== null)

                                    @foreach(session('rerror') as $v)
                                    @foreach($v as $e)

                                    <div class="errorWrap"><strong>ERROR</strong>:  {{ $e }} </div>

                                    @endforeach

                                    @endforeach
                                @endif




                                <div class="form-group row mb-4">
                                    <input type="hidden" name="property_id" id="property_id" value="@if(session('psuccess') !== null) {{ session('pid') }} @elseif(session('rsuccess') !== null) {{ session('pid') }} @endif" class="summernote-simple form-control" required>
                                    @php
                                    $propdata = session('pdata');
                                  
                                    @endphp
                                 
                                        <div class="col-sm-4">
                                                <label class="col-form-label text-md-right ">Properties Name</label>
                                                <input name="name" value=" @if(session('pdata') !== null) {{ $propdata['name'] }} @endif" class="summernote-simple form-control" disabled>
        
                                                </div>

                                                <div class="col-sm-4">
                                                <label class="col-form-label text-md-right ">Properties Address</label>
                                                <input name="address" value=" @if(session('pdata') !== null) {{ $propdata['address'] }} @endif" class="summernote-simple form-control" disabled>
        
                                                </div>
                    

                                                <div class="col-sm-4">
                                                <label class="col-form-label text-md-right ">Properties Location</label>
                                                <input name="location" id="address" value=" @if(session('pdata') !== null) {{ $propdata['location'] }} @endif" class="summernote-simple form-control" disabled>
                                                </div>
                                                {{-- <div id="map" style="width: 200px; height: 200px;"></div>     --}}
                                                {{-- </div> --}}
                                                {{-- <input type="text" id="input"/> --}}

                                                {{-- @dd(session('roomdata')) --}}
                                                {{-- @if(session('roomdata') !== null)
                                                    
                                                @php 
                                                $roomdata=session('roomdata');
                                               foreach($roomdata['roomdata'] as $image){
                                                     return $image['Assets']['data'];
                                               }
                                                @dd($roomdata['roomdata']['Assets']['data']);
                                                // var_dump($roomdata);
                                                $imagedata = $roomdata['Assets']['data'];
                                                if(count($imagedata)==0)
                                                {
                                                    echo "<h5 class='alert alert-red'>There is no rooms for this Property.</h5>";

                                                }
                                                else {
                                                    # code...
                                               
                                            
                                                @endphp 

                                            @foreach ($imagedata as $image)
                                             
                                               <div class="col-sm-4">
                                                <a href=""><img src="{{ isset($image['links']) ? $image['links']['full'].'?width=100&height=100' : asset('img/no-image.gif')  }}"/></a>
                                               </div>

                                             
                                             
                                             @endforeach

                                            @php
                                            }
                                            @endphp

                                             --}}

                                                {{-- <div class="col-sm-4">
                                                        @foreach($roomdata['Assets']['data'] as $rds)
                                                            
                                                        @endforeach
                                                    
                                                </div>
                                                     --}}
                                                {{-- @endif --}}
                                           
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Room Type</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="room_type_id" id=""  required class="form-control selectric" required>
                                                            <option value="" selected disabled>Select</option>
                                                            @foreach($confRoomType as $confRoomTypes)
                                                                <option value="{{ $confRoomTypes['id'] }}" {{ (old("room_type_id") == $confRoomTypes['id'] ? "selected":"") }}>{{ $confRoomTypes['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                          

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">No Of Rooms</label>
                                                        <input type="number"  name="no_of_rooms" value="{{ old('no_of_rooms') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                         
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
                          
                            

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Max Occupancy</label>
                                                        <input type="number" name="max_occupancy" value="{{ old('max_occupancy') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Room Location ( Min Character:2 )</label>
                                                        <input  name="room_location" value="{{ old('room_location') }}"  minlength="2" maxlength="500" class="summernote-simple form-control" required>
               
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Amount</label>
                                                        <input type="number"  step="any" name="amount" value="{{ old('amount') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                                                
                          
                                                     <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id"  placeholder="status" required class="form-control selectric" required>
                                                            <option value="" selected disabled>Select</option>
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

                                                        <div class="col-sm-12">
                                                            <label class="col-form-label text-md-right ">Room Image Picture</label>
                                                            <input type="file" name="file[]" id="room_image" class="filer_input room_image" multiple="multiple" class="form-control"  required>
                                                        </div>
                                                </div>



                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right "></label>
                                                    <div class="col-sm-12 col-md-12 offset-5">
                                                        <button type="submit" id="submit" class="btn btn-primary btn-lg float-left room_submit">Create Room</button>
                                                        <a href="{{ route('properties.create') }}" id="alert" class="btn btn-primary btn-lg float-left" style="box-shadow: 0 2px 6px #acb5f6;
                                                        background-color: #6777ef; margin-left:8px!important;
                                                        border-color: #6777ef;border-radius:30px">Create New Property</a>
                                                    </div>
                                                </div>

                                            </form>
                        
                                            

                                </div>
                            </div>
                          
                        </div>
                      
        


                         

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>
    </div>
</div>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDo0SYQmZUcTfSLx1rAzBiNiE7H0QvSgg8&libraries=places&callback=initMap"></script>
<script>
    $(document).ready(function(){
	var map_input = $('#address')[0];
	setTimeout(function(){initMap()},'5000');
	function initMap() {
		var map = new google.maps.Map($('form #map'), {
			center: {lat: 33.8892846, lng: 35.539302},
			zoom: 11
		});
		
		var autocomplete = new google.maps.places.Autocomplete(map_input);
		var marker = new google.maps.Marker({
			map: map
		});

		autocomplete.addListener('place_changed', function() {
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				// User entered the name of a Place that was not suggested and
				// pressed the Enter key, or the Place Details request failed.
				window.alert("No details available for input: '" + place.name + "'");
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				//map.setCenter(place.geometry.location);
				//map.setZoom(17);  // Why 17? Because it looks good.
			}
			
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);
		});
	}
});
</script> --}}
<style>

.nav-tabs
{
height: 80px;
margin-top:20px!important;

/* border:2px solid #000; */
border-bottom:0px!important;
}

.nav-tabs .nav-item
{
    width:255px!important;

    
}

.nav-tabs .nav-link
{
padding-top:10px;

height:60px!important;
/* width:255px!important; */
margin:0!important;
border:5px solid #1B476B!important;
/* background-color:#1BF0B7!important; */
border-radius: 20px!important;
color:#000!important;
font-size:16px!important;

}

.nav-tabs .nav-link .active
{
padding-top:10px;
height:60px!important;
border:5px solid #1B476B;
background-color:#1BF0B7!important;
border-radius: 20px!important;

}

.nav-tabs .nav-item .disabled
{

background-color:#cccccc!important;
border:5px solid #cccccc!important;
}


</style>
