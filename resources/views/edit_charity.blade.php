@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Charity</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">

                            <p class="">Edit Charity</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('charity.index') }}">Charity</a>
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




                                <form class="dropzone" action="{{route('charity.update',['charity'=>$charity['id']]) }}" method="post" id="editstatus" enctype="multipart/form-data">
                                    @method('PUT')
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


                            <div class="form-group row ">
                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right"> Name</label>

                                    <input value="{{ old('name',$charity['name']) }}" name="name" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Payment Status Desc</label>

                                    <input value="{{ old('ref',$charity['ref']) }}" name="ref" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right ">Highlight Desc</label>
                                    <select class="js-example-basic-single col-sm-12" name="con_eco_hig_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($highlight as $highlights)
                                        <!-- <option value="{{ $highlights['id'] }}" {{ (old("con_eco_hig_id") == $highlights['id'] ? "selected":"") }}>{{ $highlights['desc'] }}</option> -->
                                        <option value="{{ $highlights['id'] }}" {{ ($charity['con_eco_hig_id'] == $highlights['id']) ? "selected":(old("con_eco_hig_id") == $highlights['id'] ? "selected":"") }}>{{ $highlights['desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('charity_list') }}" class=" d-inline text-center btn btn-blue back"><i class="icofont icofont-arrow-left"></i>Back&nbsp;&nbsp;</a>
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
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function (e) {
        $('#formsubmit').on('click', function () {

        });
		$('#upload').on('click', function () {
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
                headers:'Authorization: Bearer ' // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				cache: false,
				contentType: false,
				processData: false,
				data: {file:form_data},
				type: 'patch',
				success: function (response) {
                   
					$('#msg').html(response); // display success response from the PHP script
				},
				error: function (response) {
                    // alert(response.message);
               
                    console.log(response);
					$('#msg').html(response); // display error response from the PHP script
				}
			});
		});
    });
    

    $(document).ready(function(){
    $("#formsubmit").click(function(){        
        $("#myForm").submit(); // Submit the form
    });
});


</script>
 --}}