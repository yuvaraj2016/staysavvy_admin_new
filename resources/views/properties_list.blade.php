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

    #basic-btn td{

        word-wrap: break-word;

/* white-space: normal !important; */
/* width:300px!important; */
    }

    .longtext
    {
        word-wrap: break-word;
        white-space: normal !important;
        width:300px!important;

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
                        <h4>Property  List</h4>
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

                        <li class="breadcrumb-item"><a href="{{ route('properties.index') }}">Properties List</a>
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
        @if(session()->has('success'))
    <div class="errorWrap">
        {{ session()->get('success') }}
    </div>
@endif
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">
                        <div class="row">
                            <div class="section-header-button col-md-4">
                    @if(collect(session('permissions'))->contains('Create property'))

                            {{-- {{ $prop_count['property_count'] }} --}}
                                @if(collect(session('roles'))->contains('Vendor'))  
<!-- below code is old count checked code -->
                                {{-- @if($prop_count['property_count']==0) --}}
                                @if(count($property)==0)
                                <a href="{{ route('properties.create') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                                @endif

                                @else
                    
                                <a href="{{ route('properties.create') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                                background-color: #6777ef;
                                border-color: #6777ef;border-radius:30px">Add New</a>

                                 
<a href="{{ route('gustproperty.create') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                                background-color: #6777ef;
                                border-color: #6777ef;border-radius:30px">Guest Line Property</a>

                                @endif
                    @endif
                            </div>
                            <div class="section-header-button col-md-5">

                            </div>
                            <div class="section-header-button col-md-3 ">
                                <div class="col">
                                <ul id="pagination" class="float-right m-0 p-0">
                                        <li><a href="{{ route('properties.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                                        @php
                                        if(isset($pagination['links']['previous']))
                                        {
                                        # code...
                                        $endurl = explode("?page=",$pagination['links']['previous']);
                                        $page = $endurl[1];

                                        @endphp
                                        <li><a href="{{ route('properties.index',$page) }}" class="btn btn-primary">Previous</a></li>
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
                                        <li> <a href="{{ route('properties.index',$page) }}" class="btn btn-primary">Next</a></li>
                                        @php
                                        }

                                        @endphp

                                        @php
                                        if($pagination['total_pages']>1)
                                        {
                                        @endphp
                                        <li> <a href="{{ route('properties.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                            <table id="dt-fixedheader" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Actions</th>
                                       <th>Name</th>
                                       <th>Address</th>
                                       <th>Location</th>
                                       <th>Host Name</th>
                                       <th>Property Images</th>
                                       <th>Property<br> Management System</th>
                                       <th>Central<br> Reservation System</th>
                                       <th>Property<br> Type Name</th>
                                       <!-- <th width="20%">Property Desc</th> -->
                                       <th>Room <br>Start Price</th>
                                       <th>Taxes</th>
                                       <th>Amenity</th>
                                        <th>Status Desc</th>
                                        <th>Created At</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                               
                                {{-- @dd($prodcategories) --}}
                                    @foreach($property as $propertys )
                                  
                                    @php
                                    $id=$propertys['id'];
                                    @endphp

                                    <tr>
                                    <td>
                                            <div class="d-flex">
                                                <ul class="list-group list-inline ml-1">
                                                    <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('List property'))
                                                    <a href="{{ url('properties/'.$id) }}" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                @endif
                                                </li>
                                                    <!-- <li class="list-group-item border1"><a href="{{ url('status/'.$id.'/edit') }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a></li> -->
                                                    <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('Update property'))
                                                    <a href="{{ url('properties/'.$id.'/edit') }}"  class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                @endif
                                                </li>
                                           

                                                    <li class="list-group-item border1">
                                                    <form id="delete_from_{{$propertys['id']}}" method="POST" action="{{route('properties.destroy', $propertys['id']) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <div class="form-group">
                                                    @if(collect(session('permissions'))->contains('Delete property'))
                                                        <a href="javascript:void(0);" data-id="{{$propertys['id']}}" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">
                                                        <i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>
                                                        </a>    
                                                        @endif                
                                                    </div>
                                                </form></li>
                                                    <!-- <li class="list-group-item border1 btn-delete"><a href="{{ url('status/'.$id) }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Audit"><i class="fa fa-calculator"></i></a></li> -->
                                                </ul>


                                            </div>
                                        </td>
                                         <td class="longtext">
                                            {{ $propertys['name'] }}
                                        </td>
                                        <td class="longtext">
                                            {{ $propertys['address'] }}
                                        </td>
                                        
                                        <td>
                                            {{ $propertys['location'] }}
                                        </td>
                                        <td>
                                            {{ $propertys['host_type_name'] }}
                                        </td>
                                        <td><img style="display: block;margin-left: auto;margin-right: auto;" src="{{ isset($propertys['Assets']['data'][0]['links']) ? $propertys['Assets']['data'][0]['links']['full'].'?width=100&height=75' : asset('img/no-image.gif')  }}"/></td>
                                        <td class="longtext">
                                            {{ $propertys['property_mgmt_system_name'] }}
                                        </td>
                                        <td  class="longtext">
                                            {{ $propertys['central_res_system_name'] }}
                                        </td>
                                        <td  class="longtext">
                                            {{ $propertys['property_type_name'] }}
                                        </td>
                                        <!-- <td class="longtext">
                                            @if(strlen($propertys['general_description']) > 200)
                                           
                                             {{ Str::limit($propertys['general_description'], 200)."..." }}
                                             @else
                                             {{ $propertys['general_description'] }}
                                             @endif
                                        </td> -->
                                        <td>
                                            {{ $propertys['room_start_price'] }}
                                        </td>

                                        <td>
                                      
                                        @foreach($propertys['Taxes']['data'] as $property)
                                        
                                           


                                            @php if(count($propertys['Taxes']['data'])==1) 
                                            {
                                                $property_name =  $property['name'];
                                                
                                                // echo  $propertys;
    
                                           
                                            }else if(count($propertys['Taxes']['data'])>1) 
                                            {
                                                
                                                if(!$loop->last)
                                                {
                                                $property_name = $property['name'].",";
                                                }
                                                else {
                                                 $property_name = $property['name'];
                                                }
                                                
                                                
                                          
                                                                                             
                                            }
                                          
                                           
                                                                      
                                            @endphp  
                                            
                                            {{ $property_name }}
                                        
                                        @endforeach
                                       
                                        </td>

                                        <td class="longtext">
                                      
                                      @foreach($propertys['Amenities']['data'] as $amen)
                                      
                                         


                                          @php if(count($propertys['Amenities']['data'])==1) 
                                          {
                                              $amenity_name =  $amen['name'];
                                              
                                              // echo  $propertys;
  
                                         
                                          }else if(count($propertys['Amenities']['data'])>1) 
                                          {
                                              
                                              if(!$loop->last)
                                              {
                                              $amenity_name = $amen['name'].",";
                                              }
                                              else {
                                               $amenity_name = $amen['name'];
                                              }
                                              
                                              
                                        
                                                                                           
                                          }
                                        
                                         
                                                                    
                                          @endphp  
                                          
                                          {{ $amenity_name }}
                                      
                                      @endforeach
                                     
                                      </td>
                                   

                                        <td>
                                            {{ $propertys['status_desc'] }}
                                        </td>


                                        <td>{{ date("Y-m-d H:i:s",$propertys['created_at']) }}</td>
                                  
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