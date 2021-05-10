@extends('layouts.app')
@section('content')
<style>
    .ss {
        display: block;
        position: relative;
    }

    .let {
        border: 2px solid #c9c9c9;
        box-shadow: none;
        /* font-family: "Roboto Regular", sans-serif; */
        font-size: 20px;
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


.select2-container .select2-selection--single .select2-selection__rendered {
        display: initial !important;
    }

    .select2-container--default .select2-selection--single {
        height: 36px !important;
        border: 1px solid #01a9ac !important
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #01a9ac !important
    }
    .select2-container .select2-selection--multiple{
        height: 42px !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        margin-top:-1px!important;

    }
    .select2-container .select2-selection--multiple {
        height: 37px !important;
    }
    .form-control {
    border: 1px solid #01a9ac !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 33px!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    line-height: 14px!important;
}

</style>
{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Booking</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">View Booking</p>
                          
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
                        <form action="{{ route('adminbookings.store') }}" method="post" id="addstatus"
                            enctype="multipart/form-data">
                            @csrf
                            @if(session('success') !== null)
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
                            @endif

                            <div class="form-group row">
                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Booking Reference</label>
                                                        <input type="text"  value="   {{ $bookingroom['booking_reference'] }}" class="form-control" readonly>
                                                        </div>

                
                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Guest Name</label>
                                                        <input type="text"  value="   {{ $bookingroom['user_email'] }}" class="form-control" readonly>
                                                        </div>

                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Property Name</label>
                                                        <input type="text"  value="   {{ $bookingroom['property_name'] }}" class="form-control" readonly>
                                                        </div>
                                                      

                        
                                                  

                                         
                                                    </div>
                                                    <div class="form-group row">

                                                    <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Check In Date</label>
                            <input type="text"  value="   {{ $bookingroom['check_in_date'] }}" class="form-control" readonly>
                            </div>

                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Check Out Date</label>
                            <input type="text"  value="   {{ $bookingroom['check_out_date'] }}" class="form-control" readonly>
                            </div>



                                                    <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Booking On</label>
                            <input type="text"  value="   {{ $bookingroom['booked_on'] }}" class="form-control" readonly>
                            </div>



            

             
                        </div>
                        <div class="form-group row">

                        <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Booking Status Desc</label>
                            <input type="text"  value="   {{ $bookingroom['booking_status_desc'] }}" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Length Of Stay</label>
<input type="text"  value="   {{ $bookingroom['length_of_stay'] }}" class="form-control" readonly>
</div>

                        <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Tax</label>
<input type="text"  value="   {{ $bookingroom['tax_name'] }}" class="form-control" readonly>
</div>  




                      

             
                        </div>

                        <div class="form-group row">
                        <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Name</label>
                            @php
                                                           if($bookingroom['gu_name'] !==''){@endphp
                            <input type="text"  value="   {{ $bookingroom['gu_name'] }}" class="form-control" readonly>
                            @php  }
                                                           else{@endphp
                                                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  

                           
                            </div>

                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Email</label>
                        
                            @php
                                                           if($bookingroom['gu_email'] !==''){@endphp
                        
                                <input type="text"  value="   {{ $bookingroom['gu_email'] }}" class="form-control" readonly>
                                @php  }
                                                           else{@endphp
                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  
                           
                           
                            </div>


                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Mobile Number</label>
                            @php
                                                           if($bookingroom['gu_phone'] !==''){@endphp
                          
                            <input type="text"  value="   {{ $bookingroom['gu_phone'] }}" class="form-control" readonly>
                         
                            @php  }
                                                           else{@endphp
                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  
                         
                            </div>


                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Guest Address</label>
                         
                            @php
                                                           if($bookingroom['gu_address'] !==''){@endphp
                         
                            <input type="text"  value="   {{ $bookingroom['gu_address'] }}" class="form-control" readonly>
                            @php  }
                                                           else{@endphp
                            <input type="text"  value="NULL" class="form-control" readonly>
                            @php   }@endphp  
                          
                          
                            </div>


                        <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Tax Percentage</label>
                            <input type="text"  value="   {{ $bookingroom['tax_percentage'] }}" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Tax Amount</label>
<input type="text"  value="   {{ $bookingroom['tax_amount'] }}" class="form-control" readonly>
</div>


                        <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Booking Amount </label>
@foreach($bookingroom['BookingDetails']['data'] as $property)
                                        
                                           


                                        @php if(count($bookingroom['BookingDetails']['data'])==1) 
                                        {
                                            $property_name =  $property['amount'];
                                            
                                            // echo  $propertys;

                                       
                                        }else if(count($bookingroom['BookingDetails']['data'])>1) 
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
<label class="col-form-label text-md-right ">Booking Room Type </label>
@foreach($bookingroom['BookingDetails']['data'] as $property)
                                        
                                           


                                        @php if(count($bookingroom['BookingDetails']['data'])==1) 
                                        {
                                            $room_type =  $property['room_type_name'];
                                            
                                            // echo  $propertys;

                                       
                                        }else if(count($bookingroom['BookingDetails']['data'])>1) 
                                        {
                                            
                                            if(!$loop->last)
                                            {
                                            $room_type = $property['room_type_name'].",";
                                            }
                                            else {
                                             $room_type = $property['room_type_name'];
                                            }
                                            
                                            
                                      
                                                                                         
                                        }
                                      
                                       
                                                                  
                                        @endphp  
                                        <input type="text"  value="    {{ $room_type }}" class="form-control" readonly><br>
                                       
                                    
                                    @endforeach
                                   

</div>


<div class="col-sm-4 ">
<label class="col-form-label text-md-right ">No Of Rooms </label>
@foreach($bookingroom['BookingDetails']['data'] as $property)
                                        
                                           


                                        @php if(count($bookingroom['BookingDetails']['data'])==1) 
                                        {
                                            $no_rooms =  $property['no_of_rooms'];
                                            
                                            // echo  $propertys;

                                       
                                        }else if(count($bookingroom['BookingDetails']['data'])>1) 
                                        {
                                            
                                            if(!$loop->last)
                                            {
                                            $no_rooms = $property['no_of_rooms'].",";
                                            }
                                            else {
                                             $no_rooms = $property['no_of_rooms'];
                                            }
                                            
                                            
                                      
                                                                                         
                                        }
                                      
                                       
                                                                  
                                        @endphp  
                                        <input type="text"  value="    {{ $no_rooms }}" class="form-control" readonly><br>
                                       
                                    
                                    @endforeach
                                   

</div>











                        <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Commission Amount </label>
@foreach($bookingroom['CommissionDetails']['data'] as $amen)
                                      
                                         


                                      @php if(count($bookingroom['CommissionDetails']['data'])==1) 
                                      {
                                          $amenity_name =  $amen['commission_amount'];
                                          
                                          // echo  $propertys;

                                     
                                      }else if(count($bookingroom['CommissionDetails']['data'])>1) 
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
<label class="col-form-label text-md-right ">Total Amount</label>
<input type="text"  value="   {{ $bookingroom['total_amount'] }}" class="form-control" readonly>
</div>


                            <div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Status</label>
<input type="text"  value="   {{ $bookingroom['status_desc'] }}" class="form-control" readonly>
</div>
<div class="col-sm-4 ">
<label class="col-form-label text-md-right ">Created At </label>
<input type="text"  value="    {{ date("Y-m-d H:i:s",$bookingroom['created_at']) }}" class="form-control" readonly>

</div>
                      
<div class="col-sm-4">
                                                <label class="col-form-label text-md-right " > Comments</label>
                                                <textarea   minlength="5" maxlength="800" class="summernote-simple form-control" readonly>{{ $bookingroom['comments'] }}</textarea>

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



