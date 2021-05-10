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
        font-size: 1em;
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
                        <h4>Create Property Management</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Property Management</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('property_management.index') }}">Property Management</a>
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
                        <form action="{{ route('property_management.store') }}" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                            @csrf

               
                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                                <!-- <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div> -->
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

                            <!-- @if(session('success') !== null)
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
                            @endif -->
                            <!-- <div class="form-group row">
                                                        <div class="col-sm-4 offset-5">
                                                        <label class="col-form-label text-md-right ">Status Desc</label>
                                                        <textarea name="status_desc" class="summernote-simple form-control" required>{{ old('status_desc') }}</textarea>
                                                        </div>
                            </div> -->




                            <div class="form-group row ">
                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Property management Name</label>
                                                        <input name="name" value="{{ old('name') }}" class="summernote-simple form-control" required>
               
                                                        </div>

                             
                            <div class="col-sm-4">
                                <label class="col-form-label text-md-right c">Description</label>
                                
                                    <input name="description" value="{{ old('description') }}" class="summernote-simple form-control" required>
                               
                            </div>
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                            </div>

                    


                            <!-- <div class="form-group row ">
                        
                                               
                            </div> -->

                     



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create Property Management</button>
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



