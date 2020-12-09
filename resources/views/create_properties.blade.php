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
                        @if(session('pcreateerror') !== null)

                                <div class="errorWrap"><strong>ERROR</strong>:  {{ session('pcreateerror') }} </div>

                            
                        @endif
                    
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
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade @if(session('success') !== null) @elseif(session('psuccess') !== null) @elseif(session('rsuccess') !== null) @else show active @endif" id="general-info">
                                <form action="{{ route('properties.store') }}" class="swa-confirm"  method="post" id="addstatus"
                                enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group row ">
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right" >Properties Name ( Min Character:5 )</label>
                                                                <input name="name" value="{{ old('name') }}" minlength="5" maxlength="500" class="summernote-simple form-control" required>
                       
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Address ( Min Character:5 )</label>
                                                                <input name="address" value="{{ old('address') }}"  minlength="5" maxlength="500" class="summernote-simple form-control" required>
                       
                                                                </div>
                                  
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right ">Properties Location ( Min Character:5 )</label>
                                                                <input name="location" id="address" value="{{ old('location') }}"  minlength="5" maxlength="500" class="summernote-simple form-control" required>
                                                                {{-- <div id="map" style="width: 200px; height: 200px;"></div>     --}}
                                                                </div>
                                                                {{-- <input type="text" id="input"/> --}}
        
                                  
                                    </div>
        
                                    <div class="form-group row ">
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
                                  
        
                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please put 'None' in the above boxes if none are used">Central Reservation System</label>
                                                                <select  class="js-example-basic-single col-sm-12" name="central_res_system_id" id="" required class="form-control selectric" required>
                                                                    <option value="" selected disabled>Select</option>
                                                                    @foreach($crs as $scrs)
                                                                        <option value="{{ $scrs['id'] }}" {{ (old("central_res_system_id") == $scrs['id'] ? "selected":"") }}>{{ $scrs['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                       
                                                                </div>
                                  
                                    </div>
        
        
        
        
        
                                    <div class="form-group row ">
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
                                                                <input name="general_description" value="{{ old('general_description') }}"  minlength="5" maxlength="800" class="summernote-simple form-control" required>
                       
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Tell us about your property's offer"> What We Offer ( Min Character:5 )</label>
                                                                    <input name="what_we_offer" value="{{ old('what_we_offer') }}"  minlength="5" maxlength="800" class="summernote-simple form-control" required>
                           
                                                                </div>
                                                                
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Room Start Price </label>
                                                                    <input type="number" name="room_start_price" step="any" value="{{ old('room_start_price') }}" class="summernote-simple form-control" required>
                           
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
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" >Coolthings</label>
                                                                    <select  class="js-example-basic-single col-sm-12" name="coolthings[]" id="" multiple  required class="form-control selectric" >
                                                    <option value="" disabled>Select</option>
                                                    @foreach($Coolthing as $Coolthings)
                                                        <option value="{{ $Coolthings['id'] }}" {{ (old("id") == $Coolthings['id'] ? "selected":"") }}>{{ $Coolthings['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                                    </div>
                        
                                                                        <div class="col-sm-12 text-center">
                                                                            
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
                                <form action="{{ route('policies.create') }}" class="swa-confirm"  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row ">

                                                                <input name="property_id" type="hidden" id="property_id" value="@if(session('success') !== null) {{ session('pid') }} @endif" class="summernote-simple form-control" required>
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
                                                                            </div>
                                                                            {{-- <input type="text" id="input"/> --}}
                                        
                                                                  
                                                               

                                                                <div class="col-sm-4">
                                                                <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please detail you policy here and this will be summarised for the guest">Cancellation Policies ( Min Character:5 )</label>
                                                                <textarea name="cancellation_policies"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('cancellation_policies') }}</textarea>
                       
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right " data-toggle="tooltip" data-html="true" title="Please detail you children & extra bed policies including rates for cribs etc in rooms. StaySavvy will set this up in our system fir your property">Children Extra beds ( Min Character:5 )</label>
                                                                    <textarea name="child_extrabeds"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('child_extrabeds') }}</textarea>
                           
                                                                </div>
        
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Internet ( Min Character:5 )</label>
                                                                    <textarea name="internet"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('internet') }}</textarea>
                           
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Parking ( Min Character:5 )</label>
                                                                    <textarea name="parking"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('parking') }}</textarea>
                           
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Pets ( Min Character:5 )</label>
                                                                    <textarea name="pets"  minlength="5" maxlength="500" class="summernote-simple form-control" required>{{ old('pets') }}</textarea>
                           
                                                                </div>
                                  
        
                                                                <div class="col-sm-4">
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
                                                          
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label text-md-right ">Curfew ( Min Character:5 )</label>
                                                                    <textarea name="curfew" class="summernote-simple form-control"  minlength="5" maxlength="500"  required>{{ old('curfew') }}</textarea>
                           
                                                                </div>
                                                       
                                                             
                                                                   
                                                                    <div class="col-sm-12 col-md-7 offset-5">
                                                                        <button type="submit" id="submit" class="btn btn-primary btn-lg">Submit</button>
                                                                    </div>
                                                              
                                                   
                                                                    
                                  
                                    </div>

                                </form>


                            </div>
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
                                                        border-color: #6777ef;border-radius:30px">Save</a>
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
