@extends('layouts.app')
@section('content')
<script type="text/javascript">
    jQuery(document).on("click", ".submit", function(e) {

        if (document.getElementById("filer_input").files.length == 0) {
            e.preventDefault();
            // alert('Please Upload Property Image');
            swal("Error", "Please upload Property Image");
        }

    });

    jQuery(document).on("click", ".room_submit", function(e) {

        if (document.getElementById("room_image").files.length == 0) {
            e.preventDefault();
            // alert('Please Upload Room Image');
            swal("Error", "Please upload Room Image");
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

                            <p class="">Create Policy</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('policies.index') }}">Policy</a>
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

                                <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>

                                <!-- <div class='alert alert-danger'>
                                   {{ $e }}
                                </div> -->
                                @endforeach

                                @endforeach
                                @endif

                                @if(session('perror') !== null)

                                @foreach(session('perror') as $v)
                                @foreach($v as $e)

                                <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>

                                <!-- <div class='alert alert-danger'>
                               {{ $e }}
                            </div> -->
                                @endforeach

                                @endforeach
                                @endif

                                @if(session('errorm') !== null)
                                    <div class='errorWrap'>
                                        {{ session('errorm') }}
                                    </div>
                                    @endif
                                <!-- @if(session('success') !== null)
                            <div class='alert alert-success'>
                                {{ session('success') }}  
                            </div>
                        @endif-->
                                <!-- after on click funtion to remeove command lines start -->
                                <!-- @if(session('pcreateerror') !== null)

                                <div class="errorWrap"><strong>ERROR</strong>: {{ session('pcreateerror') }} </div>


                                @endif -->
                                <!-- after on click funtion to remeove command lines end -->


                                <!-- after on click funtion to remeove command lines start -->
                                <!-- <div class="tab-pane fade @if(session('success') !== null) show active @else @endif  @if(session('perror') !== null) show active @endif" id="policies"> -->
                                    <!-- after on click funtion to remeove command lines end -->
                                    <form action="{{ route('store_policies') }}" class="swa-confirm" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row ">
                                            <!-- after on click funtion to remeove command lines start -->
                                            <!-- <input name="property_id" type="hidden" id="property_id" value="@if(session('success') !== null) {{ session('pid') }} @endif" class="summernote-simple form-control" required>
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
                                                {{-- <div id="map" style="width: 200px; height: 200px;"></div>     --}}
                                            </div> -->
                                            <!-- after on click funtion to remeove command lines end -->
                                            {{-- <input type="text" id="input"/> --}}

                                          
                                          


<!-- <label class="col-form-label text-md-right ">Cancellation Policies</label> -->
<!-- <input type="hidden" name="add" value=""  style="color:#3300FF; font-size:16px; " /> -->


<div class="form-group row mb-4 offset-3 col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Property</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="property_id" id="" placeholder="Status" required class="form-control js-example-basic-single selectric"  required>
                                        <option value="">Select</option>
                                        @foreach($property as $properties)
                                            <option value="{{ $properties['id'] }}" {{ (old("property_id") == $properties['id'] ? "selected":"") }}>{{ $properties['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
<div class="form-group row mt-4">
@foreach($confpolicies as $confpoliciess)
<div class="col-sm-4 offset-1">
      <label class="col-form-label float-right ">{{ ucfirst($confpoliciess['name'])}} (Min Charecters 5 )</label>
      <input type="hidden"  name="policies[]" value="{{ $confpoliciess['id']}}" />
                      
    


</div>

<div class="col-sm-6 mb-3">
    

      <textarea  cols="30" rows="4" name="desc_{{$confpoliciess['id']}}" ></textarea>
</div>

 @endforeach             
                                    
</div>


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
    $(document).ready(function() {
        $('#policies_0').on('change', function() {

            var value = $(this).val();
            $('#pol').empty('');
            if (value !== '')
                $("#pol").append(' <label class="col-form-label text-md-right ">POL-' + value + ' </label> <textarea name="description" class="summernote-simple form-control"></textarea>');
        });
    });

    function validateField(event) {
        // console.log(event.target);
        const selectedValue = event.target.value;
        const selectedId = event.target.id;
        const selectedField = selectedId.split('_');
        // console.log(selectedField[1]);
        var selectData = $('select[name= "id[]"]').map(function() {
            return $(this).val();
        }).get();
        selectData.splice(selectData.length - 1, 1);
        // console.log(selectData);
        const selectOptionFound = selectData.some(
            y => y == selectedValue
        );
        // console.log(selectData);
        // console.log(selectOptionFound);
        if (selectOptionFound) {
            swal('Already selected')
            $('#policies_' + selectedField[1]).val('');
        }



    };

    $(document).ready(function() {
        var selectOptionArray = @json($confpolicies);
        var index = $("input[name='id[]']").length;
        $(".add-row").click(function() {
            index++;
            // var name = $("#name").val();
            // var email = $("#email").val();
            //  var mobile = $("#mobile").val();
            var markUp = '<tr class="col-md-12">' +
                '<td class="col-md-12">' +
                '<select class="js-example-basic-single col-sm-12" id=policies_' + index + '  data-index="' + index + '" onchange=validateField(event) name="policy_id[]" class="form-control selectric">' +
                '</select></td><td class="col-md-12">' +
                '<input type="text" name="description[]"></td></tr>'
            $("table tbody").append(markUp);
            selectOptionArray.forEach(item => {
                $('select[name="policy_id[]"]').append(
                    '<option value="' + item.id + '">' + item.name + "</option>"
                );
            });
        });





        // Find and remove selected table rows
        $(".delete-row").click(function() {
            $("table tbody").find('input[name="record"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>

<style>
    .nav-tabs {
        height: 80px;
        margin-top: 20px !important;

        /* border:2px solid #000; */
        border-bottom: 0px !important;
    }

    .nav-tabs .nav-item {
        width: 255px !important;


    }

    .nav-tabs .nav-link {
        padding-top: 10px;

        height: 60px !important;
        /* width:255px!important; */
        margin: 0 !important;
        border: 5px solid #1B476B !important;
        /* background-color:#1BF0B7!important; */
        border-radius: 20px !important;
        color: #000 !important;
        font-size: 16px !important;

    }

    .nav-tabs .nav-link .active {
        padding-top: 10px;
        height: 60px !important;
        border: 5px solid #1B476B;
        background-color: #1BF0B7 !important;
        border-radius: 20px !important;

    }

    .nav-tabs .nav-item .disabled {

        background-color: #cccccc !important;
        border: 5px solid #cccccc !important;
    }



</style>