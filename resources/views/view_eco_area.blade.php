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
                        <h4> Eco Area</h4>
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




                                <form action="{{ route('host.store') }}" method="post" id="addstatus" enctype="multipart/form-data">
                                    @csrf
                                    @if(session('success') !== null)
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
                                    @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                    
                                    @if(count($ecoarea['ProEcoareas']['data'])>0)

                                                <div class="card-body">

                                                    <h5 style="padding:10px 10px 10px 10px;margin-left:-9px"> {{ old('name',$ecoarea['name']) }} Credentials</h5>

                                                    <div class="form-group row" style="margin-right: 86px;">

                                                        


                                                            @foreach($ecoarea['ProEcoareas']['data'] as $prop)
                                                            @foreach($prop['Assets']['data'] as $props)
                                                            <!-- <label class="col-form-label text-md-right ">Property Image</label> -->
                                                            <div class="col-sm-2 offset-1 card">
                                                            <figure class="figure" style="text-align: center!important;">
                                                                <img style="padding: 20px;" src="{{ isset($props['links']['full']) ? $props['links']['full'].'?width=100&height=100' : asset('img/no-image.gif')  }}" />

                                                                <figcaption class="mb-12 " style="text-align: center;"><b>{{$prop['name']}}</b></figcaption>
                                                            </figure>

                                                            </div>

                                                            @endforeach
                                                            @endforeach
                                                        


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

                                                        <div class="col-md-4 " style="margin-top: -33px;">


                                                            <label class="col-form-label text-md-right ">Eco Description (200 words)</label>
                                                            @if(isset($ecoarea['EcoSummary']['data']['description']))
                                                            <textarea name="description" rows="7" class="summernote-simple form-control" readonly>{{ old('description',$ecoarea['EcoSummary']['data']['description']) }}</textarea>
                                            @else
                                            <textarea name="description" rows="4" class="summernote-simple form-control" readonly></textarea>
                                           
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
                                                    <!-- <div class="form-group row"> -->


                                                        @foreach($ecoarea['Impacts']['data'] as $ecoid)
                                                        <div class="form-group row">

<div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Impact</label>
                            <input type="text" value="{{$ecoid['name']}}" class="form-control" readonly>
                            </div>
                                                        
                                                            </div>
                                                       
                                                        @endforeach
                                                        </div>


                                                       



                                                    </div>



                                                </div>

                                                @else
                                        <p class="text-center text-bold"> No Record Found Please Contact Admin</p>

                                    @endif
                                            </div>
                                        </div>
                                    </div>






                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right "></label>
                                        <div class="col-sm-12 col-md-7 offset-5">
                                            <!-- <button type="submit" class="btn btn-blue">Update </button> -->
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