@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Charity</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Charity</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('charity.index') }}">Charity</a>
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
                        <form action="{{ route('charity.store') }}" class="swa-confirm"  method="post" id="addstatus"
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
                            <!-- <div class="col-sm-4">
                                <label class="col-form-label text-md-right c">Referance</label>
                                
                                    <input name="ref" class="summernote-simple form-control" required>
                               
                            </div> -->

                            <!-- <div class="col-sm-4">
                                <label class="col-form-label text-md-right c">Imapact Area</label>
                                
                                    <input name="impact_area" class="summernote-simple form-control" required>
                               
                            </div> -->

                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Eco Area </label>
                                                        <select  class="js-example-basic-single col-sm-12" name="conf_eco_area_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($highlight as $highlights)
                                            <option value="{{ $highlights['id'] }}" {{ (old("conf_eco_area_id") == $highlights['id'] ? "selected":"") }}>{{ $highlights['name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create Charity</button>
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



