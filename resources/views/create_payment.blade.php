@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Payment</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Create Payment</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('payment.index') }}">Status</a>
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
                        <form action="{{ route('payment.store') }}" class="swa-confirm"  method="post" id="addstatus"
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
                            <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right "> Title</label>
                                                        <input name="title" value="{{ old('title') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                            <div class="col-sm-4 offset-1">
                                <label class="col-form-label text-md-right c">Payment Status Desc</label>
                                
                                    <textarea name="payment_status_desc" class="summernote-simple form-control" required>{{ old('payment_status_desc') }}</textarea>
                               
                            </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary">Create payment</button>
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



