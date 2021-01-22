
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit  Policy</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">Edit  Policy</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('policies.index') }}"> Policy</a>
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
                        



                        <form class="dropzone" action="{{route('policies.update',['policy'=>$policy['id']]) }}" method="post" id="editstatus"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                                <!-- <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div> -->
                            @endif

                       
                            <!-- @if(session('success') !== null)
                                <div class='alert alert-green'>
                                    {{ session('success') }}
                                </div>
                            @endif -->
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
       
                                                    <!-- <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right">Policy Name</label>
                                                      
                                                            <input  value="{{ old('from',$policy['policy_name']) }}" class="summernote-simple form-control" readonly>
                                                        </div> -->


                                                        <div class="col-sm-4">
<label class="col-form-label text-md-right ">Policy</label>
<select  class="js-example-basic-single col-sm-12 form-control selectric" name="policy_id"  required>
<option value="">Select</option>
@foreach($confpolicy as $confpolicys)

<option value="{{ $confpolicys['id'] }}" {{ ($policy['policy_id'] == $confpolicys['id']) ? "selected":(old("policy_id") == $confpolicys['id'] ? "selected":"") }}>{{ $confpolicys['name'] }}</option>
@endforeach

</select>

</div>

                                                        <div class="col-sm-4">
<label class="col-form-label text-md-right ">Property</label>
<select  class="js-example-basic-single col-sm-12 form-control selectric" name="property_id"  required>
<option value="">Select</option>
@foreach($property as $propertys)

<option value="{{ $propertys['id'] }}" {{ ($policy['property_id'] == $propertys['id']) ? "selected":(old("property_id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
@endforeach

</select>

</div>

<div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right">Description</label>
                                                      
                                                            <textarea  class="summernote-simple form-control" >{{ old('description',$policy['description']) }}</textarea>
                                                        </div>
                                                    </div>
                                                                                              
                                                                                  
                                                                        

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('policies_list') }}"
                        class=" d-inline text-center btn btn-blue back" ><i
                            class="icofont icofont-arrow-left" ></i>Back&nbsp;&nbsp;</a>
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
