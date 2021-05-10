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
                        <h4>Edit Eco Reward</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">

                            <p class="">Edit Eco Reward</p>

                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('ecoreward.index') }}">Reward</a>
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
                            <div class="card-body" style="height: 148px;">




                                <form class="dropzone" action="{{route('ecoreward.update',['ecoreward'=>$reward['id']]) }}" method="post" id="editstatus" enctype="multipart/form-data">
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

                          
                                <div class="col-sm-4 offset-4">
                                    <label class="col-form-label text-md-right"> Reward Name</label>
                                    <input name="property_id" type="hidden">

                                    @if(count($reward['ActiveRewards']['data'])>0)
                                    <textarea name="reward_name" class="summernote-simple form-control" required>{{ old('reward_name',$reward['ActiveRewards']['data'][0]['reward_name']) }}</textarea>
                                    @else
                                    <textarea name="reward_name" class="summernote-simple form-control" required></textarea>


                                    @endif


                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right" style="margin-bottom: 51px;"> </label>

                                    <button type="submit" class="btn btn-blue">Save </button>


                                </div>
                            </div>









                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">

                                    <!-- <a href="{{ url('eco_reward_list') }}"
                        class=" d-inline text-center btn btn-blue back" ><i
                            class="icofont icofont-arrow-left" ></i>Back&nbsp;&nbsp;</a> -->
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>






    <div class="row">

        <div class="col-sm-12">

            <div class="card">

                <div class="card-header table-card-header">
                    <div class="row">
                        <div class="section-header-button col-md-4">

                        </div>
                        <div class="section-header-button col-md-5">

                        </div>
                        <div class="section-header-button col-md-3 ">
                            <div class="col">



                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="basic-btn" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Vendor Reward</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(isset($reward['UserRewards']['data']))

                                @foreach($reward['UserRewards']['data'] as $userrewards )
                             
                                @php
                                $id=$userrewards['id'];
                              $pid=$userrewards['property_id'];

                                @endphp

                                <tr>
                                    <td>
                                        {{ $userrewards['user_name'] }}
                                    </td>

                                    <td>
                                        {{ $userrewards['check_in_date'] }}
                                    </td>
                                    <td>
                                        {{ $userrewards['vendor_reward'] }}
                                    </td>
                                    <td>
                                        {{ $userrewards['conf_reward_status_name'] }}
                                    </td>


                                    <td>{{ date("Y-m-d H:i:s",$userrewards['created_at']) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <ul class="list-group list-inline ml-1">
                                                <!-- <li class="list-group-item border1">
                                                    @if(collect(session('permissions'))->contains('List config payment status'))
                                                    <a href="{{ url('payment/'.$id) }}" class=" d-inline font1 view-confirmation" id="alert1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                @endif
                                                </li> -->
                                                <!-- <li class="list-group-item border1"><a href="{{ url('status/'.$id.'/edit') }}" class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a></li> -->
                                                <li class="list-group-item border1">

                                                    <a href="{{ url('user_reward/'.$pid.'/'.$id.'/edit') }}" class=" d-inline font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                                                </li>




                                            </ul>


                                        </div>
                                    </td>
                                </tr>


                                @endforeach
                                @endif
                            </tbody>


                        </table>

                    </div>


                </div>
            </div>
            <!-- HTML5 Export Buttons end -->



        </div>
    </div>
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