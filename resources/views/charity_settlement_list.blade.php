@extends('layouts.app')
@section('content')



    <!-- @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    @if(Session::has('error'))
    <div class="alert errorWrap">
        {{session('error')}}
    </div>
    @endif
    <div class="section-header-button">
        <a href="{{ route('status.create') }}" class="btn btn-primary">Add New</a>
    </div>  -->

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
                        <h4>Admin Charity Settlement List</h4>
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

                        <li class="breadcrumb-item"><a href="{{route('admin.settlement')}}">Chartiy Settlement List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
          
            @if(session('success') !== null)
            <div class="succWrap">
                {{ session('success') }}
            </div>
            <!-- <div class='alert alert-success'>
            {{ session('success') }}
        </div> -->
            @endif

            @if(session('errors') !== null)

            @foreach(session('errors') as $v)
              @foreach($v as $e)

            <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>

           
             @endforeach

            @endforeach
            @endif

     
            @if(session('error') !== null)
            @foreach(session('error') as $v)
                @foreach($v as $e)

                <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>

            
                @endforeach
            @endforeach
            @endif

            
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">
                        <div class="row">
                            <div class="section-header-button col-md-4">
                                <div class="form-group">
                                    <form action="{{ route('admin.charitysettlement.create') }}" class="swa-confirm"  method="post" id="addstatus">                      
                                        @csrf
                                       <input type="hidden" name="conf_charity_id" value="{{ Request::segment(3) }}"/>
                                      
                                    <div class="row">
                                         <div class="col-md-7"><input type="month" class="form-control" id="invmonth" name="invmonth" value="{{ date('Y') }}-{{ date('m') }}"></div>
                                         <div class="col-md-5"><input type="submit" class="btn btn-primary form-control mt-1" id="invgen" name="invgen" value="Generate"></div>
                                         
                                      
                                     </div>
                                    </form> 
                                 </div>
                            </div>
                            <div class="section-header-button col-md-5">

                            </div>
                            <div class="section-header-button col-md-3 ">
                                <div class="col">
                               
                                  
                                <ul id="pagination" class="float-right m-0 p-0">
                                        <li><a href="{{ route('admin.settlement',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                                        @php
                                        if(isset($pagination['links']['previous']))
                                        {
                                        # code...
                                        $endurl = explode("?page=",$pagination['links']['previous']);
                                        $page = $endurl[1];

                                        @endphp
                                        <li><a href="{{ route('admin.settlement',$page) }}" class="btn btn-primary">Previous</a></li>
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
                                        <li> <a href="{{ route('admin.settlement',$page) }}" class="btn btn-primary">Next</a></li>
                                        @php
                                        }

                                        @endphp

                                        @php
                                        if($pagination['total_pages']>1)
                                        {
                                        @endphp
                                        <li> <a href="{{ route('admin.settlement',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                       <th>Actions</th>
                                    
                                       <th>Invoice No</th>

                                       <th>Month</th>
                                       <th>Year</th>
                                        
                                       <th>Charity Name</th> 

                                       <th>Due By</th> 
                                        
                                       <th>Charity Amount</th> 

                                       <!-- <th>Total Amount</th>  -->

                                       <th>Payment Status</th> 
                                     
                                    </tr>
                                </thead>
                                <tbody>

                                {{-- @dd($prodcategories) --}}
                                    @foreach($charitysettlement as $veninvoice )
                                    @php
                                    $id=$veninvoice['id'];
                                    @endphp

                                    <tr>
                                    <td>
                                            <div class="d-flex">
                                                <ul class="list-group list-inline ml-1">
                                                    <li class="list-group-item border1">
                                                    {{-- @if(collect(session('permissions'))->contains('List invoices')) --}}
                                              {{---      {{ route('admin.monthlyinvoicedetail',['page'=>1,'vendor_invoice_id'=>$id]) }}---}}
                                                    <a href="#" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="View Invoices" style="font-size:14px!important;"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;View User Invoices</a>
                                                {{-- @endif --}}
                                                </li>
                                              
                                           

                                  
                                                </form></li>
                                                  
                                                </ul>


                                            </div>
                                        </td>
                                       <td>
                                            {{ $veninvoice['invoice_no'] }}
                                        </td>

                                        <td>
                                            {{ $veninvoice['month_name'] }}
                                        </td>
                                     
                                        <td>
                                            {{ $veninvoice['year'] }}
                                        </td>
                                     
                                        <td>
                                            {{ $veninvoice['charity_name'] }}
                                        </td>
                                     
                                     
                                        <td>
                                            {{ $veninvoice['due_by'] }}
                                        </td>
                                        <td>
                                            {{ $veninvoice['commission_amount'] }}
                                        </td>

                                        <!-- <td>
                                            {{ $veninvoice['total_amount'] }}
                                        </td> -->

                                     

                                        <td>
                                        <a href="{{ url('charityset_payment/'.$id.'/edit') }}"  class=" d-inline edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit Payment" style="color: blue;">     {{ $veninvoice['payment_status'] }}  </a>
                                      
                                        </td>
                                     
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
                



            </div>
        </div>



















    </div>
</div>
 <script>
    $(document).ready(function() {

               

// $('#invgen').on('click', function(e) {

//     var invrange = $('#invmonth').val().split("-");
    
//     var invmonth = invrange[1];

//     var invyear = invrange[0];

//     var property_id =  {{ Request::segment(3) }};

    
   
//     if (invmonth && invyear) {
//         $.ajax({

//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/vnd.api.v1+json'
//             },
//             url: "{{ url('admin_monthly_invoice_create')}}" + "/" + property_id + "/" + invmonth +  "/" + invyear,

//             type: "GET",

//             // data: {
//             //   id : cat_id
//             // },

//             crossDomain: true,
//             beforeSend: function() {
//                 $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
//             },

//             success: function(responsedata) {

//                 alert(responsedata);

//                 $('#response').html('');

//                 // var data = JSON.parse(responsedata);
//                 //  console.log(responsedata);

//                 var rooms = responsedata;

//                 //   console.log(rooms);

//                 //  $('#rooms').empty();
//                 //  $('#rooms').append('');
//                 var aaaa = "";
              
               
//             }
//         })


//     }






// });


//     $('#rooms').on('change',function(e) {

//      var room_id = e.target.value;


//  if (room_id) {
//               $.ajax({

//                  headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//      'Content-Type':'application/json',
//      'Accept' : 'application/vnd.api.v1+json' },
//      url:"{{ url('getrooms')}}" + "/" + room_id,

//                     type:"GET",



//                     crossDomain:true,
//                     beforeSend: function() {
//                          $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
//                      },

//                     success:function (responsedata) {
//                      $('#response').html('');


//                    console.log(responsedata);

//                       var room = responsedata;

//                       console.log(room);



//                     }
//                 })


//  }






//              });
















});
</script>
<script>
// $(document).ready(function(){
//     $('.sa-remove').click(function () {
//             var postId = $(this).data('id'); 
//             swal({
//                 title: "are u sure?",
//                 text: "lorem lorem lorem",
//                 type: "error",
//                 showCancelButton: true,
//                 confirmButtonClass: 'btn-danger waves-effect waves-light',
//                 confirmButtonText: "Delete",
//                 cancelButtonText: "Cancel",
//                 closeOnConfirm: true,
//                 closeOnCancel: true
//             },
//             function(){
//                 window.location.href = "status.destroy/" + postId;
//             }); here

// });
// });





// $(document).on('click', '.sa-remove', function (e) {
//     e.preventDefault();
//     var id = $(this).data('id');
//    alert(id);
//     swal({
//             title: "Are you sure!",
//             type: "error",
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Yes!",
//             showCancelButton: true,
//         },
//         function() {
//             $.ajax({
//                 type: "POST",
//                 url: "{{ url('status.destroy') }}",
             
//                 data: {id:id},
//                 success: function (data) {
                    
//                               if (data.success){
//                                     swalWithBootstrapButtons.fire(
//                                         'Deleted!',
//                                         'Your file has been deleted.',
//                                         "success"
//                                     );
//                                     $("#"+id+"").remove(); // you can add name div to remove
//                                 }
//                     }         
//             });
//     });
// });
</script>


</section>
@endsection