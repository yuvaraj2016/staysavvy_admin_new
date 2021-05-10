@extends('layouts.app')
@section('content')



    <!-- @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    @if(Session::has('error'))
    <div class="alert errorWrap">
        {{session('error')}}
    </div>
    @endif
    <div class="section-header-button">
        <a href="{{ route('status.create') }}" class="btn btn-primary">Add New</a>
    </div>  -->

<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }

.select2-container .select2-selection--single .select2-selection__rendered {
  display: initial!important;

}
.select2-container--default .select2-selection--single {
    border: 1px solid #01a9ac!important;
  
}
button, input, optgroup, select, textarea {
    border: 1px solid #01a9ac!important;
}
</style>
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Policy List</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>

                        <li class="breadcrumb-item"><a href="{{ route('property_policies_list') }}">Policy List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            @if(session('success') !== null)
            <div class="succWrap">
                {{ session('success') }}
            </div>

            @endif

            @if(session('psuccess') !== null)
            <div class="succWrap">
                {{ session('psuccess') }}
            </div>

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

            @if(session('perror') !== null)

            @foreach(session('perror') as $v)
            @foreach($v as $e)

            <div class="errorWrap"><strong>ERROR</strong>: {{ $e }} </div>

            <!-- <div class='alert alert-danger'>
           {{ $e }}
        </div> -->
            @endforeach

            @endforeach
            @endif

            @if(session('errorm') !== null)
                <div class='errorWrap'>
                    {{ session('errorm') }}
                </div>
                @endif
          
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">

                        <div class="row">
                            {{-- <div class="section-header-button col-md-4">
                            @if(collect(session('permissions'))->contains('Create policy'))
                                <a href="{{ route('store_policies') }}" id="alert" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                    @endif
                            </div> --}}
                            <div class="section-header-button col-md-5">

                            </div>
                            <div class="section-header-button col-md-3 ">
                                <div class="col">
                               

                                 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        {{-- {{ Request::segment(2) }} --}}
                        <form class="dropzone" action="{{route('store_policies') }}" method="post" id="editstatus"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden"  name="property_id" value=" {{ Request::segment(2) }}" />
                        <div class="form-group row mt-4">
                            @foreach($confpolicies as $confpoliciess)
                            <div class="col-sm-4">
                                  <label class="col-form-label" ><span style="margin-left:100px;">{{ ucwords(str_replace("_"," ",$confpoliciess['name']))}} : </span></label>
                                  <input type="hidden"  name="policies[]" value="{{ $confpoliciess['id']}}" />
                                                  
                                
                            
                            
                            </div>
                            
                            <div class="col-sm-7 mb-3">
                                
                            
                                  <textarea cols="60" rows="4" name="desc_{{$confpoliciess['id']}}" style="overflow:hidden;resize:none;white-space: normal">@foreach($policies as $policy)@if($confpoliciess['id']==$policy['policy_id'])  {{ trim($policy['description']) }} @endif   @endforeach  </textarea>
                            </div>
                            
                             @endforeach             
                                                                
                            </div>
                            
                            
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" id="submit" class="btn btn-primary btn-lg">Update</button>
                                </div>

                        </div>


                    </div>
                </div>
            </form>



            </div>
        </div>



















    </div>
</div>
{{-- <script>
    $(function () {
        $('.job-delete').click(function (event) {
            var token = $("meta[name='csrf-token']").attr("content");
            event.preventDefault();
            event.stopPropagation();


            $.ajax({
                type: 'DELETE',
                url: $(this).attr('href'),
                data: {
                    "_token": token
                },
                success: function (response) {
                    alert('Deleted');
                    location.reload();
                }

            });
        });
    });

</script> --}}
<script>
// $(document).ready(function(){
//     $('.sa-remove').click(function () {
//             var postId = $(this).data('id'); 
//             swal({
//                 title: "are u sure?",
//                 text: "lorem lorem lorem",
//                 type: "error",
//                 showCancelButton: true,
//                 confirmButtonClass: 'btn-danger waves-effect waves-light',
//                 confirmButtonText: "Delete",
//                 cancelButtonText: "Cancel",
//                 closeOnConfirm: true,
//                 closeOnCancel: true
//             },
//             function(){
//                 window.location.href = "status.destroy/" + postId;
//             }); here

// });
// });





// $(document).on('click', '.sa-remove', function (e) {
//     e.preventDefault();
//     var id = $(this).data('id');
//    alert(id);
//     swal({
//             title: "Are you sure!",
//             type: "error",
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Yes!",
//             showCancelButton: true,
//         },
//         function() {
//             $.ajax({
//                 type: "POST",
//                 url: "{{ url('status.destroy') }}",
             
//                 data: {id:id},
//                 success: function (data) {
                    
//                               if (data.success){
//                                     swalWithBootstrapButtons.fire(
//                                         'Deleted!',
//                                         'Your file has been deleted.',
//                                         "success"
//                                     );
//                                     $("#"+id+"").remove(); // you can add name div to remove
//                                 }
//                     }         
//             });
//     });
// });
</script>


</section>
@endsection