@extends('layouts.app')
@section('content')



   

<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }
    .dataTables_info
{
    display: none!important;

}
</style>
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Booking  List</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('adminbookings.index') }}">Booking List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <!-- @if(session('success') !== null)
            <div class='alert alert-success'>
                {{ session('success') }}
            </div>
            @endif
        -->
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">
                        <div class="row">
                            <div class="section-header-button col-md-6">
                    @if(collect(session('permissions'))->contains('Create booking'))

                         
                            
                                @if(collect(session('roles'))->contains('Vendor'))  

                                {{-- @if(count($booking)==0) --}}
                                <a href="{{ route('adminbookings.create') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                                {{-- @endif --}}

                                @else 
                                
                    
                                <a href="{{ route('adminbookings.create') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                                background-color: #6777ef;
                                border-color: #6777ef;border-radius:30px">Add New</a>

                               @endif 
                               
                    @endif  
                    <form action="{{ route('adminbookings.index') }}" class="swa-confirm" method="get" id="addstatus" enctype="multipart/form-data" style="margin-top:-29px!important;margin-left: 143px !important;">
                    <!-- {{!! csrf_token()}} -->

                  <input  type="search" name="bookref" id="bookref">
                  <button id="search" type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"></i></button>
                  <a href="{{ url('adminbooking_list') }}">  <button id="refresh" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i></button></a>
                  <!-- <button type="button" id="bookrefsub" class="btn btn-primary" >Submit</button> -->
                           
                    </form> 
                    </div>
                            <div class="section-header-button col-md-3">

                            </div>
                            <div class="section-header-button col-md-3 ">
                                <div class="col">
                                <ul id="pagination" class="float-right m-0 p-0">
                                        <li><a href="{{ route('adminbookings.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                                        @php
                                        if(isset($pagination['links']['previous']))
                                        {
                                        # code...
                                        $endurl = explode("?page=",$pagination['links']['previous']);
                                        $page = $endurl[1];

                                        @endphp
                                        <li><a href="{{ route('adminbookings.index',$page) }}" class="btn btn-primary">Previous</a></li>
                                        @php
                                        }
                                        @endphp




                                        @php
                                        if(isset($pagination['links']['next']))
                                        {
                                        $endurl = explode("?page=",$pagination['links']['next']);
                                        $page = $endurl[1];
                                        // echo
                                        @endphp
                                        <li> <a href="{{ route('adminbookings.index',$page) }}" class="btn btn-primary">Next</a></li>
                                        @php
                                        }

                                        @endphp

                                        @php
                                        if($pagination['total_pages']>1)
                                        {
                                        @endphp
                                        <li> <a href="{{ route('adminbookings.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

                                        @php
                                        }

                                        @endphp

                                    </ul>

                                 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="dt-fixedheader" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                    <th>Actions</th>
                                       <th>Property Name</th>
                                       <th>Booking Ref</th>
                                       <th>Booking Status</th>
                                       <th>Payment Status</th>
                                       <th>Tax Name</th>
                                       <th>Tax Percentage</th>
                                       <th>Tax Amount</th>
                                       <!-- <th>Payment Status</th> -->
                                       <!-- <th>Booking Amount</th> -->
                                       <th>Commission Amount</th>
                                      <th>Total Amount</th>
                                        <th>Status Desc</th>
                                        <th>Created At</th>
                                      
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                           
                                {{-- @dd($prodcategories) --}}
                                    @foreach($booking as $bookings )
                                  
                                    @php
                                    $id=$bookings['id'];
                                    $upid=$bookings['UserInvoice']['data']['uPayment']['data']['id'];
                                    @endphp

                                    <tr>
                                    <td>
                                            <div class="d-flex">
                                                <ul class="list-group list-inline ml-1">
                                                    <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('List booking'))
                                                    <a href="{{ url('adminbookings/'.$id) }}" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                @endif
                                                </li>
                                                    <!-- <li class="list-group-item border1"><a href="{{ url('status/'.$id.'/edit') }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a></li> -->
                                                    <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('Update booking'))
                                                    <a href="{{ url('adminbookings/'.$id.'/edit') }}"  class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                @endif
                                                </li>

                                                <!-- <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('Update booking'))
                                                    <a href="{{ url('user_payment/'.$upid.'/edit') }}"  class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit Payment"><i class="fa fa-edit"></i></a>
                                                @endif
                                                </li> -->
                                           

                                                    <li class="list-group-item border1">
                                                    <form id="delete_from_{{$bookings['id']}}" method="POST" action="{{route('adminbookings.destroy', $bookings['id']) }}">
                    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <div class="form-group">
    @if(collect(session('permissions'))->contains('Delete booking'))
        <a href="javascript:void(0);" data-id="{{$bookings['id']}}" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">
        <i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>
        </a>    
        @endif                
    </div>
</form></li>
                                                    <!-- <li class="list-group-item border1 btn-delete"><a href="{{ url('status/'.$id) }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Audit"><i class="fa fa-calculator"></i></a></li> -->
                                                </ul>


                                            </div>
                                        </td>
                                    <td>
                                            {{ $bookings['property_name'] }}
                                        </td>
                                        <td>
                                            {{ $bookings['booking_reference'] }}
                                        </td>
                                        
                                        <td>
                                            {{ $bookings['booking_status_desc'] }}
                                        </td>
                                        <td>

                                        <a href="{{ url('user_payment/'.$upid.'/edit') }}"  class=" d-inline edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit Payment" style="color: blue;">    {{ $bookings['UserInvoice']['data']['uPayment']['data']['payment_status'] }}  </a>
                                          
                                        </td>
                                      
                                        <td>
                                            {{ $bookings['tax_name'] }}
                                        </td>
                                        <td>
                                            {{ $bookings['tax_percentage'] }}
                                        </td>
                                        <td>
                                            {{ $bookings['tax_amount'] }}
                                        </td>
                                      
                                    

                                        <!-- <td>
                                      
                                        @foreach($bookings['BookingDetails']['data'] as $property)
                                        
                                           


                                            @php if(count($bookings['BookingDetails']['data'])==1) 
                                            {
                                                $property_name =  $property['amount'];
                                                
                                                // echo  $propertys;
    
                                           
                                            }else if(count($bookings['BookingDetails']['data'])>1) 
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
                                            
                                            {{ $property_name }}
                                        
                                        @endforeach
                                       
                                        </td> -->

                                        <td>
                                      
                                      @foreach($bookings['CommissionDetails']['data'] as $amen)
                                      
                                         


                                          @php if(count($bookings['CommissionDetails']['data'])==1) 
                                          {
                                              $amenity_name =  $amen['commission_amount'];
                                              
                                              // echo  $propertys;
  
                                         
                                          }else if(count($bookings['CommissionDetails']['data'])>1) 
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
                                          
                                          {{ $amenity_name }}
                                      
                                      @endforeach
                                     
                                      </td>
                                   
                                      <td>
                                            {{ $bookings['total_amount'] }}
                                        </td>
                                        <td>
                                            {{ $bookings['status_desc'] }}
                                        </td>


                                        <td>{{ date("Y-m-d H:i:s",$bookings['created_at']) }}</td>
                                  
                                    </tr>


                                    @endforeach

                                </tbody>


                            </table>

                        </div>


                    </div>

                    @php
                                                        
                                                    $first =(($pagination['current_page']-1) * $pagination['per_page']) + 1;

                                                    if($pagination['current_page']==$pagination['total_pages'])
                                                    {

                                                        $last = ((($pagination['current_page']-1) * $pagination['per_page']) + $pagination['count']);     
                                                    }
                                                    else 
                                                    {
                                                        $last = ($pagination['current_page'] * $pagination['per_page']);

                                                    }
                                                  

                                                    $total = $pagination['total'];

                                                 @endphp


                                                    <p style="font-size:15px;margin-top:-17px;" class="ml-4">Showing {{ $first }} to {{ $last }} of {{ $total }}</p>
                </div>
                <!-- HTML5 Export Buttons end -->



            </div>
        </div>



















    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
{{-- <script>
    $(function () {
        $('.job-delete').click(function (event) {
            var token = $("meta[name='csrf-token']").attr("content");
            event.preventDefault();
            event.stopPropagation();


            $.ajax({
                type: 'DELETE',
                url: $(this).attr('href'),
                data: {
                    "_token": token
                },
                success: function (response) {
                    alert('Deleted');
                    location.reload();
                }

            });
        });
    });

</script> --}}
<!-- <script>
   $(document).ready(function(){

       if(refreshBtnPressed){
       window.location.replace("http://127.0.0.1:8000/adminbooking_list");
       refreshBtnPressed = false;
       }
       $('#refresh').on("click", function(){
        refreshBtnPressed = true;


       });
   });

</script> -->



<!-- <script>
   $(document).ready(function(){
       $('#search').on("click", function(){
   
   // alert("hii");
   var bookref = $("#bookref").val();
           // alert(bookref);
         
           $.ajax({
   
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                   'Content-Type': 'application/json',
                   'Accept': 'application/vnd.api.v1+json'
               },
               url: "{{ url('allbookingajax')}}"+"/"+bookref,
               type: "GET",
               crossDomain: true,
               beforeSend: function() {
                   // console.log('Aaaajax sss')
                   $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
               },
               success: function(responsedata) {
                //    console.log(responsedata);
                   $('#tableBody').empty();
                   responsedata.forEach( item => {
                       let bookingAmt = '';
                       let commissionAmt = '';
                       item.BookingDetails.data.forEach(bookingItem => {
                           if (bookingAmt) {
                               bookingAmt += `,${bookingItem.amount}`;
                           } else {
                               bookingAmt = bookingItem.amount;
                           }
                       });
        
                       item.CommissionDetails.data.forEach(commissionItem => {
                           if (commissionAmt) {
                               commissionAmt += `,${commissionItem.commission_amount}`;
                           } else {
                               commissionAmt = commissionItem.commission_amount;
                           }
                       });
                       const view = `adminbookings/${item.id}`;
                       const edit = `adminbookings/${item.id}/edit`;
                       const createdDate =new Date(item.created_at);
                       console.log(createdDate);
                       const date = moment(createdDate).format('Y-m-d H:i:s');
                       console.log(date);
                       $('#tableBody').append(
                       '<tr><td>'+
                       '<div class="d-flex">'+
                                    '<ul class="list-group list-inline ml-1">'+
                                       '+<li class="list-group-item border1">'+
                                          '<a href="'+view+'" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>'+
                                       '</li>'+
                                       '<li class="list-group-item border1">'+
                                        '<a href="'+edit+'"  class="d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>'+
                                       '</li>'+
                                       '<li class="list-group-item border1">'+
                                          '<form id="" method="POST" action="">'+
                                             '<div class="form-group">'+
                                                '<a href="" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">'+
                                                '<i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>'+
                                                '</a>'+  
                                             '</div>'+
                                          '</form>'+
                                       '</li>'+
                                    '</ul>'+
                                 '</div>'
                       +'</td><td>'+item.property_name+'</td><td>'+item.booking_reference+'</td><td>'+item.booking_status_desc+'</td><td>'+item.UserInvoice.data.uPayment.data.payment_status+'</td><td>'+item.tax_name+'</td><td>'+item.tax_percentage+'</td><td>'+item.tax_amount+'</td><td>'+bookingAmt+'</td><td>'+commissionAmt+'</td><td>'+item.total_amount+'</td><td>'+item.status_desc+'</td><td>'+item.created_at+'</td></tr>'
                       );
                   });
                   // console.log(responsedata);
                  
               }
           })
   
       });
   
   
   
   });
   

</script>

<script>
   $(document).ready(function(){
       $('#refresh').on("click", function(){
   
   // alert("hii");
//    var bookref = $("#bookref").val();
           // alert(bookref);
         
           $.ajax({
   
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                   'Content-Type': 'application/json',
                   'Accept': 'application/vnd.api.v1+json'
               },
               url: "{{ url('alladminbooking')}}",
               type: "GET",
               crossDomain: true,
               beforeSend: function() {
                   // console.log('Aaaajax sss')
                   $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
               },
               success: function(responsedata) {
                   console.log(responsedata);
                   $('#tableBody').empty();
                   responsedata.forEach( item => {
                       let bookingAmt = '';
                       let commissionAmt = '';
                       item.BookingDetails.data.forEach(bookingItem => {
                           if (bookingAmt) {
                               bookingAmt += `,${bookingItem.amount}`;
                           } else {
                               bookingAmt = bookingItem.amount;
                           }
                       });
        
                       item.CommissionDetails.data.forEach(commissionItem => {
                           if (commissionAmt) {
                               commissionAmt += `,${commissionItem.commission_amount}`;
                           } else {
                               commissionAmt = commissionItem.commission_amount;
                           }
                       });
                       const view = `adminbookings/${item.id}`;
                       const edit = `adminbookings/${item.id}/edit`; 
                       $('#tableBody').append(
                       '<tr><td>'+
                       '<div class="d-flex">'+
                                    '<ul class="list-group list-inline ml-1">'+
                                       '+<li class="list-group-item border1">'+
                                          '<a href="'+view+'" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>'+
                                       '</li>'+
                                       '<li class="list-group-item border1">'+
                                          '<a href="'+edit+'"  class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>'+
                                       '</li>'+
                                       '<li class="list-group-item border1">'+
                                          '<form id="" method="POST" action="">'+
                                             '<div class="form-group">'+
                                                '<a href="" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">'+
                                                '<i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>'+
                                                '</a>'+  
                                             '</div>'+
                                          '</form>'+
                                       '</li>'+
                                    '</ul>'+
                                 '</div>'
                       +'</td><td>'+item.property_name+'</td><td>'+item.booking_reference+'</td><td>'+item.booking_status_desc+'</td><td>'+item.UserInvoice.data.uPayment.data.payment_status+'</td><td>'+item.tax_name+'</td><td>'+item.tax_percentage+'</td><td>'+item.tax_amount+'</td><td>'+bookingAmt+'</td><td>'+commissionAmt+'</td><td>'+item.total_amount+'</td><td>'+item.status_desc+'</td><td>'+item.created_at+'</td></tr>'
                       );
                   });
                   // console.log(responsedata);
                  
               }
           })
   
       });
   
   
   
   });
   

</script> -->
</section>
@endsection