@extends('layouts.app')
@section('content')

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
                                        <input type="text"  value="    {{ $property_name }}" class="form-control" readonly>
                                       
                                    
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



