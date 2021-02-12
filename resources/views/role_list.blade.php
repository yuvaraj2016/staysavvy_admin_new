@extends('layouts.app')
@section('content')


@php 

function wordSplit($longString,$length=20){
    
    $words = array_filter(preg_split('#[\s\n]+#s', $longString));
    
    $maxLineLength = $length;
    
    $currentLength = 0;
    $index = 0;
    foreach ($words as $word) {
        // +1 because the word will receive back the space in the end that it loses in explode()
        $wordLength = strlen($word) + 1;
    
        if (($currentLength + $wordLength) <= $maxLineLength) {
            $output[$index][] = '' .$word . '';
            $currentLength += $wordLength;
            $close=false;
        } else {
            $output[$index]=join(' ',$output[$index]);
            $close=false;
            $index += 1;
            $currentLength = $wordLength;
            $output[$index][] = $word.'';
        }
    }
    if($close==false){
        $output[$index]=join(' ',$output[$index]);
    }
    
    return  $output;
    }

@endphp


     {{-- @if(session('success') !== null)
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
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New</a>
    </div>  --}}

    @if(Session::has('error'))
    <div class="alert errorWrap">
        {{session('error')}}
    </div>
    @endif
<style>
#pagination li
{

    display:inline-flex;
    float:left;
    margin-left:10px;
    /* float:right; */
}

 </style>

<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Roles List</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-1.htm">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles List</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">

    <div class="row">
    <div class="col-sm-12">
        <!-- @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
        @endif
        -->
                                            
                                                <!-- HTML5 Export Buttons table start -->
                                                <div class="card">
                                                    
                                                    <div class="card-header table-card-header">
                                                    <div class="row">
                                                    <div class="section-header-button col-md-4" >
                                                    @if(collect(session('permissions'))->contains('Create roles'))
                    <a href="{{ route('roles.create')}}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
@endif
                </div>
                <div class="section-header-button col-md-3" >
                  
                </div>
                <div class="section-header-button col-md-5" >
                <div class="col" >
                <ul id="pagination" class="float-right m-0 p-0" style="">
                        <li><a href="{{ route('role.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif" style="box-shadow: 0 2px 6px #acb5f6;
                            background-color: #6777ef;
                            border-color: #6777ef;border-radius:30px">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('role.index',$page) }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Previous</a></li>
                        @php
                            }
                        @endphp


                        {{-- @for($i = 1; $i <= $pagination['total_pages']; $i++)
                        <?php
                        // $isCurrentPage =  $pagination['current_page'] == $i;
                        ?>
                        <li class="{{ $isCurrentPage ? 'active' : '' }}" >
                            <a href="{{ !$isCurrentPage ? route('product_cat.index',$i) : '#' }}"  class="btn btn-primary">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor --}}



                        @php
                           if(isset($pagination['links']['next']))
                            {
                                $endurl = explode("?page=",$pagination['links']['next']);
                                $page = $endurl[1];
                                // echo
                        @endphp
                        <li> <a href="{{ route('role.index',$page) }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('role.index',$pagination['total_pages']) }}" class="btn btn-primary float-right" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Last</a> </li>

                        @php
                        }

                        @endphp

                    </ul>

                       {{-- <a href="{{ route('product_categories.create') }}" class="btn btn-primary float-right">Add New</a> --}}

                    </div>
                </div>
                                                    </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="basic-btn" class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                    <th>Actions</th>
                                                                    <th>Role Name</th>
                                                                    <th>Permissions</th>
                                                                    <th>Created At</th>
                                                                   
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                {{-- @dd($prodcategories) --}}
                                @foreach($roles as $role)
                                    @php
                                        $id=$role['id'];
                                    @endphp

                                    <tr>
                                    <td>
            <div class="d-flex">
            <ul class="list-group list-inline ml-1">
  <!-- <li class="list-group-item border1">
      
  @if(collect(session('permissions'))->contains('List roles'))
  <a href="{{  url('roles/'.$id) }}"
                        class=" d-inline font1 view-confirmation" data-toggle="tooltip" data-placement="top" title="View"><i
                            class="fa fa-eye"></i></a>
                        @endif
                        </li> -->
  <li class="list-group-item border1">
  @if(collect(session('permissions'))->contains('Update roles'))    
  <a href="{{ url('roles/'.$id.'/edit') }}"
                        class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i
                            class="fa fa-edit" ></i></a>
                        @endif
                        </li>
  <!-- <li class="list-group-item border1"> <form
                    action="{{ route('roles.destroy',$id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;"
                    class=" job-delete d-inline font1" data-toggle="tooltip" data-placement="top" title="Delete" > <i
                        class="fa fa-trash" style="position: relative;top:-5;"></i></button>
                </form></li> -->



                <li class="list-group-item border1">
                                                    <form id="delete_from_{{$role['id']}}" method="POST" action="{{route('roles.destroy', $role['id']) }}">
                    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <div class="form-group">
    @if(collect(session('permissions'))->contains('Delete roles'))   
        <a href="javascript:void(0);" data-id="{{$role['id']}}" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">
        <i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>
        </a>   
        @endif                 
    </div>
</form></li>
                <!-- <li class="list-group-item border1"><a href="{{  url('roles/'.$id) }}"
                        class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Audit"><i
                            class="fa fa-calculator"></i></a></li> -->

</ul>

            </div>
        </td>

                                        <td>
                                            {{ $role['name'] }}
                                        </td>

                                        <td>
                                        <div style=" white-space: normal !important; 
                                        word-wrap: break-word;  ">
                                        @foreach($role['permissions']['data'] as $permission)
                                        
                                            {{-- {{ $permission['name'] }}<br> --}}


                                            @php if(count($role['permissions']['data'])==1) 
                                            {
                                                $permissions =  $permission['name'];
                                                
                                                // echo  $role_name;
    
                                           
                                            }else if(count($role['permissions']['data'])>1) 
                                            {
                                                
                                                if(!$loop->last)
                                                {
                                                $permissions = $permission['name'].",";
                                                }
                                                else {
                                                 $permissions = $permission['name'];
                                                }
                                                
                                                
                                          
                                                                                             
                                            }
                                          
                                            echo $permissions;
                                                                      
                                            @endphp  
                                            
                                          
                                        
                                        @endforeach

                                        </div>

                                        </td>

                                     
                                        <td>{{ date("Y-m-d H:i:s",$role['created_at']) }}</td>
           
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



























<!-- 
    <div class="row">
        <div class="col-12">
        {{-- @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
 --}}
        <div class="section-header-button">
                    {{-- <a href="{{ route('Roles.create') }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6; --}}
                    background-color: #6777ef;
                    border-color: #6777ef;">Add New</a>
                </div>
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid m-2">
                    <div class="row">
                        <div class="col">
                             <h4>Roles List</h4>
                        </div>

                    <div class="col">
                        <ul id="pagination" class="float-right m-0 p-0">
                        {{-- <li><a href="{{ route('role.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li> --}}
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('role.index',$page) }}" class="btn btn-primary">Previous</a></li>
                        @php
                            }
                        @endphp


                        {{-- @for($i = 1; $i <= $pagination['total_pages']; $i++)
                        <?php
                        // $isCurrentPage =  $pagination['current_page'] == $i;
                        ?>
                        <li class="{{ $isCurrentPage ? 'active' : '' }}" >
                            <a href="{{ !$isCurrentPage ? route('product_cat.index',$i) : '#' }}"  class="btn btn-primary">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor --}}



                        @php
                           if(isset($pagination['links']['next']))
                            {
                                $endurl = explode("?page=",$pagination['links']['next']);
                                $page = $endurl[1];
                                // echo
                        @endphp
                        <li> <a href="{{ route('role.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('role.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

                        @php
                        }

                        @endphp

                    </ul>

                       {{-- <a href="{{ route('product_categories.create') }}" class="btn btn-primary float-right">Add New</a> --}}

                    </div>

                    </div>
                    </div>

                </div>



                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>

                                    <th>Supplier Name</th>
                                    <th>Supplier Logo</th>
                                    <th>Supplier Category</th>
                                    <th>Supplier Desc</th>
                                    <th>Supplier Address</th>
                                    <th>Supplier Contact</th>
                                    <th>Supplier Email</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                {{-- @dd($prodcategories) --}}
                                {{-- @foreach($Roles as $supplier)
                                    @php
                                        $id=$supplier['id'];
                                    @endphp --}}

                                    <tr>


                                        <td>
                                            {{-- {{ $supplier['supplier_name'] }}
                                        </td> --}}

                                        {{-- <td><img src="{{ isset($supplier['Assets']['data'][0]['links']) ? $supplier['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}"/></td> --}}

                                        {{-- <td>{{ $supplier['supplier_category_desc'] }}</td> --}}

                                        {{-- <td>{{ $supplier['supplier_desc'] }}</td>

                                        <td>{{ $supplier['supplier_address'] }}</td>

                                        <td>{{ $supplier['supplier_contact'] }}</td>

                                        <td>{{ $supplier['supplier_email'] }}</td>

                                        <td>{{ $supplier['status_desc'] }}</td>

                                        <td>{{ date("Y-m-d H:i:s",$supplier['created_at']) }}</td>
                                        <td> --}}
                                            <div class="d-flex">

                                                {{-- <a href="{{ url('Roles/'.$id) }}" --}}
                                                    class="btn btn-success d-inline" style="border-radius:30px;box-shadow: 0 2px 6px #acb5f6;
                                                        background-color: #6777ef;
                                                        border-color: #6777ef;"><i
                                                        class="icofont icofont-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                                                {{-- <a href="{{ url('Roles/'.$id.'/edit') }}" --}}
                                                    class="btn btn-info d-inline text-center" style="border-radius:30px;box-shadow: 0 2px 6px #acb5f6;
                                                        background-color: #6777ef;
                                                        border-color: #6777ef;"><i
                                                        class="icofont icofont-ui-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="{{ action('AlbumController@destroy', $id) }}"
                                                    class="job-delete badge badge-danger d-inline"><i
                                                        class="fas fa-trash"></i>Deletes</a> --}}

                                                <form
                                                    {{-- action="{{ route('Roles.destroy',$id) }}" --}}
                                                    method="POST">
                                                    {{-- @method('DELETE')
                                                    @csrf --}}
                                                    <button type="submit"
                                                        class="btn btn-danger job-delete d-inline" style="border-radius:30px;box-shadow: 0 2px 6px #acb5f6;
                                                            background-color: #6777ef;
                                                            border-color: #6777ef;"> <i
                                                            class="icofont icofont-trash"></i>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
</div>


</section>
@endsection
