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
        border: 1px solid #1B476B !important
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #1B476B !important
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
</style>
{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Charity Group</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Charity Group</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('charity_group.index') }}">Charity Group</a>
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
                        <form action="{{ route('charity_group.store') }}" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                            @csrf

               
                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                               
                            @endif

                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)

                                   <div class="errorWrap"><strong>ERROR</strong>:  {{ $e }} </div>

                                
                                   @endforeach

                                @endforeach
                            @endif

                       
                            <div class="form-group row ">
                            <div class="col-sm-4 offset-2">
                                                        <label class="col-form-label text-md-right "> Name</label>
                                                        <input name="name" value="{{ old('name') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                         

                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status </label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($status as $statuss)
                                            <option value="{{ $statuss['id'] }}" {{ (old("status_id") == $statuss['id'] ? "selected":"") }}>{{ $statuss['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create Charity Group</button>
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



