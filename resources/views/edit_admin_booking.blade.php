
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Bookings</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p>Edit Bookings</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('adminbookings.index') }}">Bookings</a>
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
                        



                        <form class="dropzone" action="{{route('adminbookings.update',['adminbooking'=>$Booking['id']]) }}" method="post" id="addprocat"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                             
                            @endif

                         

                      
                      
                            @if(session('error') !== null)

{{-- @foreach(session('error') as $v)
   @foreach($v as $e)
   <div class='alert alert-red'>
       {{ $e }}
    </div>
   @endforeach

@endforeach --}}
<div class='alert alert-red'>
    {{ session('error') }}
 </div>
@endif
                        <div class="form-group row ">
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Properties Name</label>
                                                        <input type="text" id="category_short_code" value="{{ $Booking['property_name'] }}" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Check In Date</label>
                                                     
                                                        <input type="text" id="address"  value="{{ $Booking['check_in_date'] }}" class="form-control" readonly>
               
                                                        </div>
                          

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Check Out</label>
                                                        <input type="text" id="location"  value="{{$Booking['check_out_date'] }}" class="form-control" readonly>
               
                                                        </div>
                          
                            </div>



                            <div class="form-group row ">
                            
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Booked On</label>
                                                        <input type="text"   value="{{$Booking['booked_on'] }}" class="form-control" readonly>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Length Of Stay</label>
                                                        <input type="text"   value="{{$Booking['length_of_stay'] }}" class="form-control" readonly>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Booking Reference</label>
                                                        <input type="text"   value="{{$Booking['booking_reference'] }}" class="form-control" readonly>
               
                                                        </div>
                                                                                                                          
                          
                            </div>




                            <div class="form-group row ">
                                     

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Tax Name</label>
                                                        <input   value="{{ $Booking['tax_name']}}" class="form-control" readonly>

                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Tax Percentage</label>
                                                            <input  value="{{ $Booking['tax_percentage'] }}" class="summernote-simple form-control" readonly>
                   
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Tax Amount</label>
                                                            <input  value="{{ $Booking['tax_amount'] }}" class="summernote-simple form-control" readonly>
                   
                                                        </div>
                          

                                                 

                                          

                          
                          
                            </div>

                            
               

                                                    

                                              
                            <div class="form-group row ">

                            <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Total Amount</label>
                                                            <input  value="{{ $Booking['total_amount'] }}" class="summernote-simple form-control" readonly>
                   
                                                        </div>


                                                        <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Booking Amount </label>
@foreach($Booking['BookingDetails']['data'] as $property)
                                        
                                           


                                        @php if(count($Booking['BookingDetails']['data'])==1) 
                                        {
                                            $property_name =  $property['amount'];
                                            
                                            // echo  $propertys;

                                       
                                        }else if(count($Booking['BookingDetails']['data'])>1) 
                                        {
                                            
                                            if(!$loop->last)
                                            {
                                            $property_name = $property['amount'].",";
                                            }
                                            else {
                                             $property_name = $property['amount'];
                                            }
                                            
                                            
                                      
                                                                                         
                                        }
                                      
                                       
                                                                  
                                        @endphp  
                                        <input type="text"  value="    {{ $property_name }}" class="form-control" readonly><br>
                                       
                                    
                                    @endforeach
                                   

</div>


<div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Room Type </label>
@foreach($Booking['BookingDetails']['data'] as $property)
                                        
                                           


                                        @php if(count($Booking['BookingDetails']['data'])==1) 
                                        {
                                            $property_name =  $property['room_type_name'];
                                            
                                            // echo  $propertys;

                                       
                                        }else if(count($Booking['BookingDetails']['data'])>1) 
                                        {
                                            
                                            if(!$loop->last)
                                            {
                                            $property_name = $property['room_type_name'].",";
                                            }
                                            else {
                                             $property_name = $property['room_type_name'];
                                            }
                                            
                                            
                                      
                                                                                         
                                        }
                                      
                                       
                                                                  
                                        @endphp  
                                        <input type="text"  value="    {{ $property_name }}" class="form-control" readonly><br>
                                       
                                    
                                    @endforeach
                                   

</div>



                        </div>



<div class="form-group row">

<div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Name</label>
                            @php
                                                           if($Booking['gu_name'] !==''){@endphp
                            <input type="text"  value="   {{ $Booking['gu_name'] }}" class="form-control" readonly>
                            @php  }
                                                           else{@endphp
                                                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  

                           
                            </div>

                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Email</label>
                        
                            @php
                                                           if($Booking['gu_email'] !==''){@endphp
                        
                                <input type="text"  value="   {{ $Booking['gu_email'] }}" class="form-control" readonly>
                                @php  }
                                                           else{@endphp
                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  
                           
                           
                            </div>


                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Mobile Number</label>
                            @php
                                                           if($Booking['gu_phone'] !==''){@endphp
                          
                            <input type="text"  value="   {{ $Booking['gu_phone'] }}" class="form-control" readonly>
                         
                            @php  }
                                                           else{@endphp
                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  
                         
                            </div>


                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Address</label>
                         
                            @php
                                                           if($Booking['gu_address'] !==''){@endphp
                         
                            <input type="text"  value="   {{ $Booking['gu_address'] }}" class="form-control" readonly>
                            @php  }
                                                           else{@endphp
                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  
                          
                          
                            </div>




                        <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Commission Amount </label>
@foreach($Booking['CommissionDetails']['data'] as $amen)
                                      
                                         


                                      @php if(count($Booking['CommissionDetails']['data'])==1) 
                                      {
                                          $amenity_name =  $amen['commission_amount'];
                                          
                                          // echo  $propertys;

                                     
                                      }else if(count($Booking['CommissionDetails']['data'])>1) 
                                      {
                                          
                                          if(!$loop->last)
                                          {
                                          $amenity_name = $amen['commission_amount'].",";
                                          }
                                          else {
                                           $amenity_name = $amen['commission_amount'];
                                          }
                                          
                                          
                                    
                                                                                       
                                      }
                                    
                                     
                                                                
                                      @endphp  
                                      
                                      
                                      <input type="text"  value=" {{ $amenity_name }}" class="form-control" readonly>
                                  
                                  @endforeach
                                     
                                       
                                    
                                
                                   

</div>

                        <div class="col-sm-4 ">
<label class="col-form-label text-md-right "> Total Amount </label>
@foreach($Booking['CommissionDetails']['data'] as $amen)
                                      
                                         


                                      @php if(count($Booking['CommissionDetails']['data'])==1) 
                                      {
                                          $amenity_name =  $amen['total_amount'];
                                          
                                          // echo  $propertys;

                                     
                                      }else if(count($Booking['CommissionDetails']['data'])>1) 
                                      {
                                          
                                          if(!$loop->last)
                                          {
                                          $amenity_name = $amen['total_amount'].",";
                                          }
                                          else {
                                           $amenity_name = $amen['total_amount'];
                                          }
                                          
                                          
                                    
                                                                                       
                                      }
                                    
                                     
                                                                
                                      @endphp  
                                      
                                      
                                      <input type="text"  value=" {{ $amenity_name }}" class="form-control" readonly>
                                  
                                  @endforeach
                                     
                                       
                                    
                                
                                   

</div>

<div class="col-sm-4">
                                                <label class="col-form-label text-md-right " > Comments</label>
                                                <textarea  minlength="5" maxlength="800" class="summernote-simple form-control" readonly>{{ $Booking['comments'] }}</textarea>

                                            </div>
                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Booking Status</label>
                                                        <select  class="js-example-basic-single col-sm-12 form-control selectric" name="booking_status_id"  required>
                                        <option value="">Select</option>
                                        @foreach($bookingstauts as $status)
                                        <option value="{{ $status['id'] }}" {{ ($Booking['booking_status_id'] == $status['id']) ? "selected":(old("booking_status_id") == $status['id'] ? "selected":"") }}>{{ $status['description'] }}</option>

                                        @endforeach
                                    </select>
                                                        </div>



                        </div>
                                                  

                            

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('adminbooking_list') }}"
                                    class=" d-inline text-center btn btn-blue back" ><i
                                        class="icofont icofont-arrow-left" ></i>Back&nbsp;&nbsp;</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function (e) {
        $('#formsubmit').on('click', function () {

        });
		$('#upload').on('click', function () {
			var form_data = new FormData();
			var ins = document.getElementById('filer_input').files.length;
			for (var x = 0; x < ins; x++) {
				form_data.append("file[]", document.getElementById('filer_input').files[x]);
            }
            // alert(form_data);
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
			$.ajax({
                url: "http://ecommerce-api.hridham.com/api/ProdCat/1",
                headers:'Authorization: Bearer ' // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				cache: false,
				contentType: false,
				processData: false,
				data: {file:form_data},
				type: 'patch',
				success: function (response) {
                   
					$('#msg').html(response); // display success response from the PHP script
				},
				error: function (response) {
                    // alert(response.message);
               
                    console.log(response);
					$('#msg').html(response); // display error response from the PHP script
				}
			});
		});
    });
    

    $(document).ready(function(){
    $("#formsubmit").click(function(){        
        $("#myForm").submit(); // Submit the form
    });
});


</script>

