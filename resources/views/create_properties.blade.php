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
                        <h4>Create Property</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Property</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('properties.index') }}">Properties</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">




<section class="section">
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
                        @endif-->
                        @if(session('pcreateerror') !== null)

                                <div class="errorWrap"><strong>ERROR</strong>:  {{ session('pcreateerror') }} </div>

                            
                        @endif
<!--                     
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item">
                                <a href="#general-info" class="nav-link @if(session('success') !== null) disabled @elseif(session('psuccess') !== null) disabled @elseif(session('rsuccess') !== null) disabled @else active @endif" data-toggle="tab">General Info</a>
                            </li>
                        
                            <li class="nav-item">
                                <a href="#policies" class="nav-link @if(session('success') !== null) active @else disabled @endif" data-toggle="tab">Policies</a>
                            </li>
                               <li class="nav-item">
                                <a href="#room-types" class="nav-link @if(session('psuccess') !== null) active @elseif(session('rsuccess') !== null) active @else disabled @endif"" data-toggle="tab">Room Types</a>
                            </li>
                        </ul> -->
                    
                            <div class="tab-pane fade @if(session('success') !== null) @elseif(session('psuccess') !== null) @elseif(session('rsuccess') !== null) @else show active @endif" id="general-info">
                                <form action="{{ route('properties.store') }}" class="swa-confirm"  method="post" id="addstatus"
                                enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group row ">
                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " >Vendor Name</label>

                                                                @if(collect(session('roles'))->contains('Vendor'))  
                                                                <input type="text" name="vendor_name" value="{{ session('username') }}" class="summernote-simple form-control" readonly>
                                                                <input type="hidden" name="vendor_id" value="{{ session('user_id') }}" class="summernote-simple form-control" required>
                                                                @else
                                                                <select  class="js-example-basic-single col-sm-12" name="vendor_id" id=""  required class="form-control selectric" required>
                                                                    <option value="" selected disabled>Select</option>
                                                                    @foreach($vendors as $vendorss)
                                                                        <option value="{{ $vendorss['user_id'] }}" {{ (old("user_id") == $vendorss['id'] ? "selected":"") }}>{{ $vendorss['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                                </div>
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right" >Properties Name ( Min Character:5 )</label>
                                                                <input name="name" value="{{ old('name') }}" minlength="5" maxlength="500" class="summernote-simple form-control" required>
                       
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Address ( Min Character:5 )</label>
                                                                <input name="address" value="{{ old('address') }}"  minlength="5" maxlength="500" class="summernote-simple form-control" required>
                       
                                                                </div>
                                </div>
                                <div class="form-group row ">
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Latitude </label>
                                                                    <input type="number" name="latitude" step="any" value="{{ old('latitude') }}" class="summernote-simple form-control" required>
                           
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Longitude </label>
                                                                    <input type="number" name="longitude" step="any" value="{{ old('longitude') }}" class="summernote-simple form-control" required>
                           
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">City/town </label>
                                                                    <input  name="area"  value="{{ old('area') }}" class="summernote-simple form-control" required>
                           
                                                                </div>
                                </div>
                                <div class="form-group row ">
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">postcode </label>
                                                                    <input type="number" name="pincode" step="any" value="{{ old('pincode') }}" class="summernote-simple form-control" required>
                           
                                                                </div>
                                                            
               <!-- <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Location ( Min Character:5 )</label>
                                                                <input name="location" id="address" value="{{ old('location') }}"  minlength="5" maxlength="500" class="summernote-simple form-control" required>
                                                                {{-- <div id="map" style="width: 200px; height: 200px;"></div>     --}}
                                                                </div> -->
                                                                {{-- <input type="text" id="input"/> --}}
                                    <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="<b>Professional host</b> <br>Any party who rents out a property or properties for purposes relating to their trade, business, or profession (e.g. this is your main business, you're a property management company, collect VAT, have a business name, etc.)<br><b>Private / Non-professional host</b> <br>Any party who rents out a property or properties for purposes outside their trade, business, or profession. (e.g. this is a side business, you only rent out occasionally, etc.)">Host Type</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="host_type_id" id=""  required class="form-control selectric" required>
                                                <option value="" selected disabled>Select</option>
                                                @foreach($host as $hosts)
                                                    <option value="{{ $hosts['id'] }}" {{ (old("host_type_id") == $hosts['id'] ? "selected":"") }}>{{ $hosts['name'] }}</option>
                                                @endforeach
                                            </select>
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Property Management System</label>
                                                                {{-- <input name="property_mgmt_system" value="{{ old('property_mgmt_system') }}" class="summernote-simple form-control" required> --}}
                                                                
                                                                <select  class="js-example-basic-single col-sm-12" name="property_mgmt_system_id" id=""  required class="form-control selectric" required>
                                                                    <option value="" selected disabled>Select</option>
                                                                    @foreach($pms as $spms)
                                                                        <option value="{{ $spms['id'] }}" {{ (old("property_mgmt_system_id") == $spms['id'] ? "selected":"") }}>{{ $spms['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                  
                                    </div>













        
                                    <div class="form-group row ">
                             
                                  
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please put 'None' in the above boxes if none are used">Central Reservation System</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="central_res_system_id" id="" required class="form-control selectric" required>
                                                                    <option value="" selected disabled>Select</option>
                                                                    @foreach($crs as $scrs)
                                                                        <option value="{{ $scrs['id'] }}" {{ (old("central_res_system_id") == $scrs['id'] ? "selected":"") }}>{{ $scrs['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                       
                                                                </div>
                                                     
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please state which best describes your property">Property Type</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="property_type_id" id=""  required class="form-control selectric" required>
                                                <option value="" selected disabled>Select</option>
                                                @foreach($property_type as $property_types)
                                                    <option value="{{ $property_types['id'] }}" {{ (old("property_type_id") == $property_types['id'] ? "selected":"") }}>{{ $property_types['name'] }}</option>
                                                @endforeach
                                            </select>
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Tell us about your property... maybe a bit of history, your values, attractions nearby etc"> General Desc ( Min Character:5 )</label>
                                                                <textarea name="general_description" value="{{ old('general_description') }}"  minlength="5" maxlength="800" class="summernote-simple form-control" required></textarea>
                       
                                                                </div>
                                    </div>
        
        
        
        
        
                                    <div class="form-group row ">
                                
                               

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Tell us about your property's offer"> What We Offer ( Min Character:5 )</label>
                                                                    <textarea name="what_we_offer" value="{{ old('what_we_offer') }}"  minlength="5" maxlength="800" class="summernote-simple form-control" required></textarea>
                           
                                                                </div>
                                                                
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Room Start Price </label><span class="ss"> </span>
                                                                       <input type="number" name="room_start_price" step="any" value="{{ old('room_start_price') }}" class="summernote-simple form-control let" required>
                           
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Status</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="status" required class="form-control selectric" required>
                                                <option value="" selected disabled>Select</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                                @endforeach
                                            </select>
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please state details of any taxes or charges that are included in your room rate">Taxes</label>
                                                                    <select  class="js-example-basic-single col-sm-12" name="taxes[]" id="" multiple required class="form-control selectric" required>
                                                    <option value="" disabled>Select</option>
                                                    @foreach($tax as $taxs)
                                                        <option value="{{ $taxs['id'] }}" {{ (old("id") == $taxs['id'] ? "selected":"") }}>{{ $taxs['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please list as many amenities as you would like to show  - for example, coffee making facilities, wifi etc">Amenity</label>
                                                                    <select  class="js-example-basic-single col-sm-12" name="amenities[]" id="" multiple  required class="form-control selectric" >
                                                    <option value="" disabled>Select</option>
                                                    @foreach($amenity as $amenitys)
                                                        <option value="{{ $amenitys['id'] }}" {{ (old("id") == $amenitys['id'] ? "selected":"") }}>{{ $amenitys['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" >Cool Things To Do</label>
                                                                    <select  class="js-example-basic-single col-sm-12" name="coolthings[]" id="" multiple  required class="form-control selectric" >
                                                    <option value="" disabled>Select</option>
                                                    @foreach($Coolthing as $Coolthings)
                                                        <option value="{{ $Coolthings['id'] }}" {{ (old("id") == $Coolthings['id'] ? "selected":"") }}>{{ $Coolthings['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                                    </div>
                                         
                        
                                                                        <div class="col-sm-12 text-center">
                                                                            
                                                                            <label class="col-form-label text-md-right ">General Photos</label>
                                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control" required>
                                                                            
                                                                        </div>
                                                                
                                                                        <div class="col-sm-12 col-md-7 offset-5">
                                                                            <button type="submit" id="submit" class="btn btn-primary btn-lg submit">Create Property</button>
                                                                        </div>
                                                                  
                                                                    </form>
                                  
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
