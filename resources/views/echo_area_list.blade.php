@extends('layouts.app')
@section('content')




<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }

    #basic-btn td{

        word-wrap: break-word;


    }

    .longtext
    {
        word-wrap: break-word;
        white-space: normal !important;
        width:300px!important;

    }

   
</style>
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Eco Area  List</h4>
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

                        <li class="breadcrumb-item"><a href="{{ route('ecoarea.index') }}">Eco Area List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
     
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">
                        <div class="row">
                            <div class="section-header-button col-md-4">
                            
                            @if(collect(session('permissions'))->contains('Create eco summary'))
                                <a href="{{ route('ecoarea.create') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                      @endif
                            </div>
                            <div class="section-header-button col-md-5">

                            </div>
                            <div class="section-header-button col-md-3 ">
                                <div class="col">
                                <ul id="pagination" class="float-right m-0 p-0">
                                        <li><a href="{{ route('ecoarea.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                                        @php
                                        if(isset($pagination['links']['previous']))
                                        {
                                        # code...
                                        $endurl = explode("?page=",$pagination['links']['previous']);
                                        $page = $endurl[1];

                                        @endphp
                                        <li><a href="{{ route('ecoarea.index',$page) }}" class="btn btn-primary">Previous</a></li>
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
                                        <li> <a href="{{ route('ecoarea.index',$page) }}" class="btn btn-primary">Next</a></li>
                                        @php
                                        }

                                        @endphp

                                        @php
                                        if($pagination['total_pages']>1)
                                        {
                                        @endphp
                                        <li> <a href="{{ route('ecoarea.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                                       <th>Name</th>
                                       <th>Address</th>
                                       
                                        <!-- <th>Created At</th> -->
                                      
                                    </tr>
                                </thead>
                                <tbody>
                               
                                {{-- @dd($prodcategories) --}}
                                    @foreach($ecoarea as $ecoareas )
                                  
                                    @php
                                    $id=$ecoareas['id'];
                                    @endphp

                                    <tr>
                                    <td>
                                            <div class="d-flex">
                                                <ul class="list-group list-inline ml-1">
                                                    <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('List eco summary'))
                                                    <a href="{{ url('ecoarea/'.$id) }}" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                @endif
                                                </li>
                                                    <!-- <li class="list-group-item border1"><a href="{{ url('status/'.$id.'/edit') }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a></li> -->
                                                    <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('Update eco summary'))
                                                    <a href="{{ url('ecoarea/'.$id.'/edit') }}"  class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                @endif
                                                </li>
                                           

                    
                                                    <!-- <li class="list-group-item border1 btn-delete"><a href="{{ url('status/'.$id) }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Audit"><i class="fa fa-calculator"></i></a></li> -->
                                                </ul>


                                            </div>
                                        </td>
                                         <td class="longtext">
                                            {{ $ecoareas['name'] }}
                                        </td>
                                        <td class="">
                                            {{ $ecoareas['address'] }}
                                        </td>
                                       
                                     
                                      


                                      
                                  
                                    </tr>


                                    @endforeach

                                </tbody>


                            </table>

                        </div>


                    </div>
                </div>
                <!-- HTML5 Export Buttons end -->



            </div>
        </div>



















    </div>
</div>




</section>
@endsection