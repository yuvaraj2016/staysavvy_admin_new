@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Eco Area</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">

                            <p>Eco-Attributes</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('ecoarea.index') }}">Eco Area</a>
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




                            <form action="{{ route('edit_ecoarea') }}" class="swa-confirm" method="post" id="addstatus" enctype="multipart/form-data">
                                    @csrf

                                    @if(session('success') !== null)
                                    <div class="succWrap">
                                        {{ session('success') }}
                                    </div>

                                    @endif





                                    @if(session('error') !== null)

                                    {{-- @foreach(session('error') as $v)
   @foreach($v as $e)
   <div class='alert alert-red'>
       {{ $e }}
                            </div>
                            @endforeach

                            @endforeach --}}
                            <div class='alert alert-red'>
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h5 style="padding:10px 10px 10px 10px;margin-left:-9px"> {{ old('name',$property['name']) }} Credentials</h5>
                                            <input type="hidden" name="property_id" value="{{$property['id']}}">
                                            <div class="form-group row">



                                                <div class="col-sm-4">
                                                    <label class="col-form-label text-md-right ">Update Ecoarea</label>
                                                    <select class="js-example-basic-single col-sm-12 form-control selectric" name="ecoareas[]" multiple placeholder="status" required>
                                                        <option value="" disabled>Select</option>
                                                        @foreach($confecoarea as $confecoareas)
                                                        @foreach($property['ProEcoareas']['data'] as $prop)
                                                        <option value="{{ $confecoareas['id'] }}" {{ ($prop['id'] == $confecoareas['id']) ? "selected":(old("id") == $confecoareas['id'] ? "selected":"") }}>{{ $confecoareas['name'] }}</option>
                                                        @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <div class="col">


                                                    @foreach($property['ProEcoareas']['data'] as $prop)
                                                    @foreach($prop['Assets']['data'] as $props)
                                                    <!-- <label class="col-form-label text-md-right ">Property Image</label> -->
                                                    <figure class="figure">
                                                        <img style="padding: 30px;border:1px solid #1B476B" src="{{ isset($props['links']['full']) ? $props['links']['full'].'?width=100&height=100' : asset('img/no-image.gif')  }}" />

                                                        <figcaption class="mb-12 " style="text-align: center;"><b>{{$prop['name']}}</b></figcaption>
                                                    </figure>



                                                    @endforeach
                                                    @endforeach
                                                </div>


                                            </div>



                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h5 style="padding:10px 10px 10px 10px;margin-left:-9px">Your Eco-summary</h5>
                                            <div class="form-group row">
                                                    <div class="col-md-12 ">
                                                        <address>After reviewing the credentials & eco-proof docs, we will summarise the sustainability areas. The hotel can review it
                                                            below and this will appear on their StaySavvy profile. We never write anything negative but they can write to us at
                                                            support@staysavvy.net if they believe something else should be mentioned or something should be edited.</address>
                                                    </div>
                                                </div>
                                           <div class="form-group row">

                                                <div class="col-md-4 ">


                                                    <label class="col-form-label text-md-right">Eco Description (200 words)</label>

                                                    @if(isset($property['EcoSummary']['data']['description']))
                                                    <textarea name="description" rows="8" class="summernote-simple form-control">{{ old('description',$property['EcoSummary']['data']['description']) }}</textarea>
                                                    @else
                                                    <textarea name="description" rows="8" class="summernote-simple form-control"></textarea>
                                                    @endif

                                                </div>
                                             


                                            </div>



                                        </div>
                                    </div>
                                </div>




                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h5 style="padding:10px 10px 10px 10px;margin-left:-9px">Eco-Impact</h5>
                                            <div class="form-group row">


                                                <div class="col-sm-4">
                                                    <label class="col-form-label text-md-right ">Edit Charity</label>
                                                    <select class="js-example-basic-single col-sm-12 form-control selectric" name="charities[]" multiple placeholder="status" required>
                                                        <option value="" disabled>Select</option>
                                                        @foreach($charity as $charitys)
                                                        @foreach($property['Impacts']['data'] as $prop)
                                                        <option value="{{ $charitys['id'] }}" {{ ($prop['id'] == $charitys['id']) ? "selected":(old("id") == $charitys['id'] ? "selected":"") }}>{{ $charitys['name'] }}</option>
                                                        @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>


                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('ecoarea_list') }}" class=" d-inline text-center btn btn-blue back"><i class="icofont icofont-arrow-left"></i>Back&nbsp;&nbsp;</a>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    @endsection
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#formsubmit').on('click', function() {

            });
            $('#upload').on('click', function() {
                var form_data = new FormData();
                var ins = document.getElementById('filer_input').files.length;
                for (var x = 0; x < ins; x++) {
                    form_data.append("file[]", document.getElementById('filer_input').files[x]);
                }
                // alert(form_data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "http://ecommerce-api.hridham.com/api/ProdCat/1",
                    headers: 'Authorization: Bearer ' // point to server-side PHP script 
                    dataType: 'json', // what to expect back from the PHP script
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: {
                        file: form_data
                    },
                    type: 'patch',
                    success: function(response) {

                        $('#msg').html(response); // display success response from the PHP script
                    },
                    error: function(response) {
                        // alert(response.message);

                        console.log(response);
                        $('#msg').html(response); // display error response from the PHP script
                    }
                });
            });
        });


        $(document).ready(function() {
            $("#formsubmit").click(function() {
                $("#myForm").submit(); // Submit the form
            });
        });
    </script>