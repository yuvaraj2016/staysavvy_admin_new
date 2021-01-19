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
                        <h4>Create Policies</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Policies</p>
                          
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
                        @endif-->
                        <!-- after on click funtion to remeove command lines start -->
                        @if(session('pcreateerror') !== null)

                                <div class="errorWrap"><strong>ERROR</strong>:  {{ session('pcreateerror') }} </div>

                            
                        @endif
                    <!-- after on click funtion to remeove command lines end -->
             
                     
                           <!-- after on click funtion to remeove command lines start -->
                            <div class="tab-pane fade @if(session('success') !== null) show active @else @endif  @if(session('perror') !== null) show active @endif" id="policies">
                             <!-- after on click funtion to remeove command lines end -->
                            <form action="{{ route('policies.store') }}" class="swa-confirm"  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row ">
<!-- after on click funtion to remeove command lines start -->
                                                                <input name="property_id" type="hidden" id="property_id" value="@if(session('success') !== null) {{ session('pid') }} @endif" class="summernote-simple form-control" required>
                                                                @php
                                                                $propdata = session('pdata');
                                                                var_dump($propdata);                                                             
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
                                                                            {{-- <div id="map" style="width: 200px; height: 200px;"></div>     --}}
                                                                            </div>
                                                                            <!-- after on click funtion to remeove command lines end -->
                                                                            {{-- <input type="text" id="input"/> --}}
                                        
                                                                  
                                                               

                                                                <div class="col-sm-4">
                                                               

                                                                <label class="col-form-label text-md-right ">confic Policies</label>
                                                        <select  class="js-example-basic-single col-sm-12 form-control selectric"  data-index="0" onchange=validateField(event) name="policy_id[]"  id="policies_0" placeholder="status" required  >
                                                            <option value="" selected >Select</option>
                                                            @foreach($confpolicies as $confpoliciess)
                                                                <option value="{{ $confpoliciess['id'] }}" {{ (old("policy_id") == $confpoliciess['id'] ? "selected":"") }}>{{ $confpoliciess['name'] }}</option>
                                                            @endforeach
                                                        </select>
                    
                                                                </div>
                                                                <div class="col-sm-4" id="pol">
                                                                   
                           
                                                                </div>
                                                                <div class="col-sm-4" >
                                                                <label class="col-form-label text-md-right "></label><br><br>
                                                                <input type="button" name="add" value="+Add" class="add-row" id="addrows" style="color:#3300FF; font-size:16px; " /><br><br><br>
</div><br><br><br>
<div class="col-sm-6" >
<table>
     
        <tbody>
            <tr>
              
            </tr>
        </tbody>
    </table><br><br><br>
</div>     

                                          <!-- <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please detail you children & extra bed policies including rates for cribs etc in rooms. StaySavvy will set this up in our system fir your property">Children Extra beds ( Min Character:5 )</label>
                                                                    <textarea name="child_extrabeds"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('child_extrabeds') }}</textarea>
                           
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Internet ( Min Character:5 )</label>
                                                                    <textarea name="internet"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('internet') }}</textarea>
                           
                                                                </div> -->

                                                                <!-- <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Parking ( Min Character:5 )</label>
                                                                    <textarea name="parking"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('parking') }}</textarea>
                           
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Pets ( Min Character:5 )</label>
                                                                    <textarea name="pets"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('pets') }}</textarea>
                           
                                                                </div> -->
                                  
        
                                                                <!-- <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Check In Time ( Min Character:5 )</label>
                                                                <input name="checkin_time" id="checkin_time" value="{{ old('checkin_time') }}"  minlength="5" maxlength="500" class="summernote-simple form-control" required>
                                                      
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Check Out Time ( Min Character:5 )</label>
                                                                    <input name="checkout_time" id="checkout_time" value="{{ old('checkout_time') }}"  minlength="5" maxlength="500" class="summernote-simple form-control" required>
                                                          
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Age Limit</label>
                                                                    <input type="number" name="age_limit" id="age_limit" value="{{ old('age_limit') }}" class="summernote-simple form-control" required>
                                                          
                                                                </div> -->

                                                                <!-- <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Curfew ( Min Character:5 )</label>
                                                                    <textarea name="curfew" class="summernote-simple form-control"  minlength="5" maxlength="500"  required>{{ old('curfew') }}</textarea>
                           
                                                                </div> -->
                                                       
                                                             
                                                                   
                                                                    <div class="col-sm-12 col-md-7 offset-5">
                                                                        <button type="submit" id="submit" class="btn btn-primary btn-lg">Submit</button>
                                                                    </div>
                                                              
                                                   
                                                                    
                                  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#policies_0').on('change', function() {

    var value = $(this).val();
    $('#pol').empty('');
    if(value !== '')
    $("#pol").append(' <label class="col-form-label text-md-right ">POL-'+value+' </label> <textarea name="description" class="summernote-simple form-control"></textarea>');
});
});

function validateField(event){
            // console.log(event.target);
            const selectedValue = event.target.value;
            const selectedId = event.target.id;
            const selectedField = selectedId.split('_');
            // console.log(selectedField[1]);
            var selectData = $('select[name= "id[]"]').map(function() { return $(this).val(); }).get();
            selectData.splice(selectData.length-1, 1);
            // console.log(selectData);
            const selectOptionFound = selectData.some(
                y => y == selectedValue
            );
            // console.log(selectData);
            // console.log(selectOptionFound);
            if(selectOptionFound){
              swal('Already selected')
            $('#policies_'+selectedField[1]).val('');
            }
            
            
            
        };

$(document).ready(function(){
    var selectOptionArray = @json($confpolicies);
    var index = $("input[name='id[]']").length;
        $(".add-row").click(function(){
            index ++;
            // var name = $("#name").val();
            // var email = $("#email").val();
            //  var mobile = $("#mobile").val();
            var markUp = '<tr class="col-md-12">'
            +'<td class="col-md-12">'
            +'<select class="js-example-basic-single col-sm-12" id=policies_'+index+'  data-index="'+index+'" onchange=validateField(event) name="policy_id[]" class="form-control selectric">'
            +'</select></td><td class="col-md-12">'
            +'<input type="text" name="description[]"></td></tr>'
            $("table tbody").append(markUp);
            selectOptionArray.forEach( item => {
                $('select[name="policy_id[]"]').append(
                        '<option value="' + item.id + '">' + item.name + "</option>"
                    );
            });
        });

       


        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>

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
