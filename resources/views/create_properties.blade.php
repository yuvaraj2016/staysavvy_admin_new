@extends('layouts.app')
@section('content')
<script type="text/javascript">
    jQuery(document).on("click", ".submit", function (e) {
  
    if( document.getElementById("filer_input").files.length == 0 ){
    e.preventDefault();
    alert('Please Upload Image');
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
                        <h4>Create Property</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Property</i>
                          
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
                    
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item">
                                <a href="#general-info" class="nav-link @if(session('success') !== null) disabled @elseif(session('psuccess') !== null) disabled @else active @endif" data-toggle="tab">General Info</a>
                            </li>
                        
                            <li class="nav-item">
                                <a href="#policies" class="nav-link @if(session('success') !== null) active @else disabled @endif" data-toggle="tab">Policies</a>
                            </li>
                               <li class="nav-item">
                                <a href="#room-types" class="nav-link @if(session('psuccess') !== null) active @else disabled @endif"" data-toggle="tab">Room Types</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade @if(session('success') !== null) @elseif(session('psuccess') !== null) @else show active @endif" id="general-info">
                                <form action="{{ route('properties.store') }}" class="swa-confirm"  method="post" id="addstatus"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row ">
                                    <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Name</label>
                                                                <input name="name" value="{{ old('name') }}" class="summernote-simple form-control" required>
                       
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Address</label>
                                                                <input name="address" value="{{ old('address') }}" class="summernote-simple form-control" required>
                       
                                                                </div>
                                  
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Location</label>
                                                                <input name="location" id="address" value="{{ old('location') }}" class="summernote-simple form-control" required>
                                                                {{-- <div id="map" style="width: 200px; height: 200px;"></div>     --}}
                                                                </div>
                                                                {{-- <input type="text" id="input"/> --}}
        
                                  
                                    </div>
        
                                    <div class="form-group row ">
                                    <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Host Type</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="host_type_id" id="" placeholder="status" required class="form-control selectric" required>
                                                <option value="">Select</option>
                                                @foreach($host as $hosts)
                                                    <option value="{{ $hosts['id'] }}" {{ (old("host_type_id") == $hosts['id'] ? "selected":"") }}>{{ $hosts['name'] }}</option>
                                                @endforeach
                                            </select>
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Property Management System</label>
                                                                {{-- <input name="property_mgmt_system" value="{{ old('property_mgmt_system') }}" class="summernote-simple form-control" required> --}}
                                                                
                                                                <select  class="js-example-basic-single col-sm-12" name="property_mgmt_system_id" id="" placeholder="status" required class="form-control selectric" required>
                                                                    <option value="">Select</option>
                                                                    @foreach($pms as $spms)
                                                                        <option value="{{ $spms['id'] }}" {{ (old("property_mgmt_system_id") == $spms['id'] ? "selected":"") }}>{{ $spms['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                  
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Central Reservation System</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="central_res_system_id" id="" required class="form-control selectric" required>
                                                                    <option value="">Select</option>
                                                                    @foreach($crs as $scrs)
                                                                        <option value="{{ $scrs['id'] }}" {{ (old("central_res_system_id") == $scrs['id'] ? "selected":"") }}>{{ $scrs['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                       
                                                                </div>
                                  
                                    </div>
        
        
        
        
        
                                    <div class="form-group row ">
                                    <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Property Type</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="property_type_id" id="" placeholder="status" required class="form-control selectric" required>
                                                <option value="">Select</option>
                                                @foreach($property_type as $property_types)
                                                    <option value="{{ $property_types['id'] }}" {{ (old("property_type_id") == $property_types['id'] ? "selected":"") }}>{{ $property_types['name'] }}</option>
                                                @endforeach
                                            </select>
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">General Desc</label>
                                                                <input name="general_description" value="{{ old('general_description') }}" class="summernote-simple form-control" required>
                       
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Room Start Price</label>
                                                                    <input type="number" name="room_start_price" step="any" value="{{ old('room_start_price') }}" class="summernote-simple form-control" required>
                           
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Status</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="status" required class="form-control selectric" required>
                                                <option value="">Select</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                                @endforeach
                                            </select>
                                                                </div>
        
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
                                                                    <label class="col-form-label text-md-right ">Amenity</label>
                                                                    <select  class="js-example-basic-single col-sm-12" name="amenities[]" id="" multiple placeholder="status" required class="form-control selectric" >
                                                    <option value="">Select</option>
                                                    @foreach($amenity as $amenitys)
                                                        <option value="{{ $amenitys['id'] }}" {{ (old("id") == $amenitys['id'] ? "selected":"") }}>{{ $amenitys['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                                    </div>

                                                              
                        
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label text-md-right ">Photos</label>
                                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control" required>
                                                                        </div>
                                                                
                                                                        <div class="col-sm-12 col-md-7 offset-5">
                                                                            <button type="submit" id="submit" class="btn btn-primary btn-lg submit">Create Property</button>
                                                                        </div>
                                                                  
                                                                    </form>
                                  
                                    </div>
        
        
        
                            </div>
                           
                            <div class="tab-pane fade @if(session('success') !== null) show active @else @endif  @if(session('perror') !== null) show active @endif" id="policies">
                                <form action="{{ route('policies.create') }}" class="swa-confirm"  method="post"                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row ">

                                                                <input name="property_id" type="hidden" id="property_id" value="@if(session('success') !== null) {{ session('pid') }} @endif" class="summernote-simple form-control" required>

                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Cancellation Policies</label>
                                                                <textarea name="cancellation_policies" class="summernote-simple form-control" required>{{ old('cancellation_policies') }}</textarea>
                       
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Children Extra beds</label>
                                                                    <textarea name="child_extrabeds" class="summernote-simple form-control" required>{{ old('child_extrabeds') }}</textarea>
                           
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Internet</label>
                                                                    <textarea name="internet" class="summernote-simple form-control" required>{{ old('internet') }}</textarea>
                           
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Parking</label>
                                                                    <textarea name="parking" class="summernote-simple form-control" required>{{ old('parking') }}</textarea>
                           
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Pets</label>
                                                                    <textarea name="pets" class="summernote-simple form-control" required>{{ old('pets') }}</textarea>
                           
                                                                </div>
                                  
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Check In Time</label>
                                                                <input name="checkin_time" id="checkin_time" value="{{ old('checkin_time') }}" class="summernote-simple form-control" required>
                                                      
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Check Out Time</label>
                                                                    <input name="checkout_time" id="checkout_time" value="{{ old('checkout_time') }}" class="summernote-simple form-control" required>
                                                          
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Age Limit</label>
                                                                    <input type="number" name="age_limit" id="age_limit" value="{{ old('age_limit') }}" class="summernote-simple form-control" required>
                                                          
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Curfew</label>
                                                                    <textarea name="curfew" class="summernote-simple form-control" required>{{ old('curfew') }}</textarea>
                           
                                                                </div>
                                                       
                                                             
                                                                   
                                                                    <div class="col-sm-12 col-md-7 offset-5">
                                                                        <button type="submit" id="submit" class="btn btn-primary btn-lg">Save</button>
                                                                    </div>
                                                              
                                                   
                                                                    
                                  
                                    </div>

                                </form>


                            </div>
                            <div class="tab-pane @if(session('psuccess') !== null) show active @else @endif fade" id="room-types">
                              

                                <div class="form-group row mb-4">
                                    <input name="property_id" id="property_id" value="@if(session('psuccess') !== null) {{ session('pid') }} @endif" class="summernote-simple form-control" required>
                                    <label class="col-form-label text-md-right "></label>
                                    <div class="col-sm-12 col-md-7 offset-5">
                                        <a href="{{ route('rooms.create') }}" id="alert" class="btn btn-primary btn-lg" style="box-shadow: 0 2px 6px #acb5f6;
                                        background-color: #6777ef;
                                        border-color: #6777ef;border-radius:30px">Add New Room</a>
                                    </div>
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
    /* border:2px solid #000; */
    
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
