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
                        <h4>Edit Profile</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">

                            <p class="">Edit Profile</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{url('view_profile')}}">Profile</a>
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




                                <form class="dropzone" action="{{route('editprofile',['editprofile'=>$profile['id']]) }}" method="post" id="editstatus" enctype="multipart/form-data">
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
                                    <label class="col-form-label text-md-right"> User E-mail</label>

                                    <input value="{{ old('user_email',$profile['user_email']) }}" name="user_email" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">First Name</label>

                                    <input value="{{ old('first_name',$profile['first_name']) }}" name="first_name" class="summernote-simple form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Last Name</label>

                                    <input value="{{ old('last_name',$profile['last_name']) }}" name="last_name" class="summernote-simple form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Middle Name</label>

                                    <input value="{{ old('middle_name',$profile['middle_name']) }}" name="middle_name" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">User Name</label>

                                    <input value="{{ old('username',$profile['username']) }}" name="username" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Mobile Number</label>

                                    <input type="number" value="{{ old('phone_no',$profile['phone_no']) }}" name="phone_no" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Address Line 1</label>

                                    <input  value="{{ old('address_line1',$profile['address_line1']) }}" name="address_line1" class="summernote-simple form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Address Line 2</label>

                                    <input  value="{{ old('address_line2',$profile['address_line2']) }}" name="address_line2" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Language</label>

                                    <input  value="{{ old('preferred_language',$profile['preferred_language']) }}" name="preferred_language" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Country</label>

                                    <input  value="{{ old('country',$profile['country']) }}" name="country" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">City</label>

                                    <input  value="{{ old('city',$profile['city']) }}" name="city" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">State</label>

                                    <input  value="{{ old('state',$profile['state']) }}" name="state" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Zip</label>

                                    <input  value="{{ old('zip',$profile['zip']) }}" name="zip" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Gender</label>

                                    <input  value="{{ old('gender',$profile['gender']) }}" name="gender" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Birth Date</label>

                                    <input type="date" value="{{ old('birth_date',$profile['birth_date']) }}" name="birth_date" class="summernote-simple form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Profession</label>

                                    <input  value="{{ old('profession',$profile['profession']) }}" name="profession" class="summernote-simple form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Nationality</label>

                                    <input value="{{ old('nationality',$profile['nationality']) }}" name="nationality" class="summernote-simple form-control" required>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right">Additional Info</label>

                                    <input value="{{ old('additional_info',$profile['additional_info']) }}" name="additional_info" class="summernote-simple form-control" required>
                                </div>


                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('view_profile') }}" class=" d-inline text-center btn btn-blue back"><i class="icofont icofont-arrow-left"></i>Back&nbsp;&nbsp;</a>
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