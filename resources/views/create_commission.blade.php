@extends('layouts.app')
@section('content')
<style>


 

  /* h2 {
    text-align: center;
    color: #2079df;
    font-size: 28px;
    float: left;
    width: 100%;
    margin: 30px 0;
    position: relative;
    line-height: 58px;
    font-weight: 400;
  }

  h2:before {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    width: 100px;
    height: 2px;
    background-color: #2079df;
    margin-left: -50px;
  }

  /*= Reset CSS End
================= */

  /*= input focus effects css
=========================== */
  /* .col-sm-4 .input-effect {
    padding: 0px!important;
    width: 100%!important;
    position: relative!important;
  } */

  /* necessary to give position: relative to parent. */
  /* input[type="text"] {
    font: 15px/24px "Lato", Arial, sans-serif;
    color: #333;
    width: 100%;
    box-sizing: border-box;
    letter-spacing: 1px;
  }

  .effect-19 {
    border: 1px solid #aaa !important;
    padding: 7px 14px;
    transition: 0.4s;
    background: transparent;
    height:42px;
  
    border-radius: 4px 4px 4px 4px!important;

  }

  .effect-19~.focus-border:before,
  .effect-19~.focus-border:after {
    content: "";
    position: absolute;
    top: 0px;
    left: 50%;
    width: 0;
    height: 1px;
    background-color: #01a9ac !important;
    transition: 0.4s;
  }

  .effect-19~.focus-border:after {
    top: auto;
    bottom: 0;
  }

  .effect-19~.focus-border i:before,
  .effect-19~.focus-border i:after {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 1px;
    height: 0;
    background-color: #01a9ac !important;
    transition: 0.6s;
  }

  .effect-19~.focus-border i:after {
    left: auto;
    right: 0;
  }

  .effect-19:focus~.focus-border:before,
  .effect-19:focus~.focus-border:after,
  .has-content.effect-19~.focus-border:before,
  .has-content.effect-19~.focus-border:after {
    left: 0;
    width: 100%;
    transition: 0.4s;
  }

  .effect-19:focus~.focus-border i:before,
  .effect-19:focus~.focus-border i:after,
  .has-content.effect-19~.focus-border i:before,
  .has-content.effect-19~.focus-border i:after {
    top: -1px;
    height: 100%;
    transition: 0.6s;
  }

  .effect-19~label {
    position: absolute;
    left: 14px;
    width: 100%;
    top: 10px;
    color: #aaa;
    transition: 0.3s;
    z-index: -1;
    letter-spacing: 0.5px;
  }

  .effect-19:focus~label,
  .has-content.effect-19~label {
    top: -18px;
    left: 0;
    font-size: 12px;
    color: #3399FF;
    transition: 0.3s;
  }  */

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
  /*= input focus effects css End
=============================== */
</style>
{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Booking Commission</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Booking Commission</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('commission.index') }}">Booking Commission</a>
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
                        <form action="{{ route('commission.store') }}" class="swa-confirm"  method="post" id="addstatus"
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
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Property</label>
                                                        <select  class="js-example-basic-single col-sm-12 " name="property_id" id="" multiple required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($property as $propertys)
                                            <option value="{{ $propertys['id'] }}" {{ (old("id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                            <div class="col-sm-4">
                                <label class="col-form-label text-md-right c">From</label>
                                <div class="input-effect">
                                    <input type="number" step="any" name="from" value="{{ old('from') }}" class="effect-19 summernote-simple form-control" required>
                                    <span class="focus-border">
            <i></i>
          </span>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label text-md-right c">To</label>
                                <div class="input-effect">
                                    <input type="number" step="any" name="to"  value="{{ old('to') }}" class="effect-19 summernote-simple form-control" required>
                                    <span class="focus-border">
            <i></i>
          </span>
                                </div>
                            </div>
                            </div>

                            <div class="form-group row ">

                            <div class="col-sm-4">
                                <label class="col-form-label text-md-right c">Percentage</label>
                                <div class="input-effect">
                                    <input type="number" step="any" name="percentage" value="{{ old('percentage') }}" class="effect-19 summernote-simple form-control " required>
                                    <span class="focus-border">
            <i></i>
          </span>
                            </div>
                            </div>

                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" multiple  class="form-control selectric " required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $statusess)
                                            <option value="{{ $statusess['id'] }}" {{ (old("id") == $statusess['id'] ? "selected":"") }}>{{ $statusess['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>



                            </div>





                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create Booking Commission</button>
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



