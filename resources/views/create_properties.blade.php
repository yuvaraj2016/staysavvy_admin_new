@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Properties</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Properties</i>
                          
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
                        <form action="{{ route('properties.store') }}" class="swa-confirm"  method="post" id="addstatus"
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
                                                        <label class="col-form-label text-md-right ">Central System</label>
                                                        <input name="central_res_system" value="{{ old('central_res_system') }}" class="summernote-simple form-control" required>
               
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
    
                                
                          
                            </div>







                            <div class="form-group row ">
                        
                                                        <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Properties Image Picture</label>
                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create Property</button>
                                </div>
                            </div>

                        </form>
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
