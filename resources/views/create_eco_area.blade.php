@extends('layouts.app')
@section('content')
<style>
/* .select2-selection__rendered{
    height: 41px!important;
} */


</style>
{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Property to Eco area</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">

                            <p class="">Create Property to Eco area</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('ecoarea.index') }}">Property to Eco area</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">




        <section class="section">


            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('ecoarea.store') }}" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
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

                                    <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>

                                    <!-- <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div> -->
                                    @endforeach

                                    @endforeach
                                    @endif




                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="form-group row ">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Property</label>
                                                        <select class="js-example-basic-single col-sm-12" name="property_id" id="" placeholder="status" required class="form-control selectric" required>
                                                            <option value="" disabled>Select</option>
                                                            @foreach($property as $propertys)
                                                            <option value="{{ $propertys['id'] }}" {{ (old("property_id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>




                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right "> Eco-Area</label>
                                                        <select class="js-example-basic-single col-sm-12 form-control selectric" name="ecoareas[]" multiple placeholder="status" required>
                                                            <option value="" disabled>Select</option>
                                                            @foreach($confecoarea as $confecoareas)
                                                            <option value="{{ $confecoareas['id'] }}" {{ (old("id") == $confecoareas['id'] ? "selected":"") }}>{{ $confecoareas['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-md-4 ">
                                                        <h5 style="padding:10px 10px 10px 10px;margin-left:-9px">Your Eco-summary</h5>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-12 ">
                                                        <address>After reviewing the credentials & eco-proof docs, we will summarise the sustainability areas. The hotel can review it
                                                            below and this will appear on their StaySavvy profile. We never write anything negative but they can write to us at
                                                            support@staysavvy.net if they believe something else should be mentioned or something should be edited.</address>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-md-6 " style="margin-top: -33px;">


                                                        <label class="col-form-label text-md-right ">Eco Description (200 words)</label>

                                                        <textarea name="description" rows="8" class="summernote-simple form-control "></textarea>

                                                    </div>



                                                </div>



                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-md-4 ">
                                                        <h5 style="padding:10px 10px 10px 10px;margin-left:-9px">Eco-Impact</h5>
                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-4">
                                                        <h6> <label class="col-form-label text-md-right ">Charity1</label></h6>
                                                        <select class="js-example-basic-single col-sm-12 form-control selectric" name="charities[]" placeholder="status" required>
                                                            <option value="" disabled>Select</option>
                                                            @foreach($confCharity as $confCharitys)
                                                            <option value="{{ $confCharitys['id'] }}" {{ (old("id") == $confCharitys['id'] ? "selected":"") }}>{{ $confCharitys['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Charity2</label>
                                                        <select class="js-example-basic-single col-sm-12 form-control selectric" name="charities[]" placeholder="status" >
                                                            <option value="" >Select</option>
                                                            @foreach($confCharity as $confCharitys)
                                                            <option value="{{ $confCharitys['id'] }}" {{ (old("id") == $confCharitys['id'] ? "selected":"") }}>{{ $confCharitys['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Charity3</label>
                                                        <select class="js-example-basic-single col-sm-12 form-control selectric" name="charities[]" placeholder="status" >
                                                            <option value="" >Select</option>
                                                            @foreach($confCharity as $confCharitys)
                                                            <option value="{{ $confCharitys['id'] }}" {{ (old("id") == $confCharitys['id'] ? "selected":"") }}>{{ $confCharitys['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Charity4</label>
                                                        <select class="js-example-basic-single col-sm-12 form-control selectric" name="charities[]" placeholder="status" >
                                                            <option value="" >Select</option>
                                                            @foreach($confCharity as $confCharitys)
                                                            <option value="{{ $confCharitys['id'] }}" {{ (old("id") == $confCharitys['id'] ? "selected":"") }}>{{ $confCharitys['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right "></label>
                                        <div class="col-sm-12 col-md-7 offset-5">
                                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
<style>
    .jFiler-item-container {
        width: 210px !important;

    }

    .jFiler-item {
        width: 240px !important;

    }

    .jFiler-row {
        margin-left: 100px !important;

    }
</style>
@endsection