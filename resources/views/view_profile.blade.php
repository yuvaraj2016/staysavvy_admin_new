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
    .dataTables_info
{
    display: none!important;

}
</style>
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Profile</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <!-- <li class="breadcrumb-item">
                            
                               <p>Central System List</p>
                           
                        </li> -->
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>

                        <li class="breadcrumb-item"><a href="{{url('show_profile')}}">Profile List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <!-- @if(session('success') !== null)
            <div class='alert alert-success'>
                {{ session('success') }}
            </div>
            @endif
        -->
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">
                       
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                    <th>Actions</th>
                                        <th>User Name</th>
                                    <th>Phone Number</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Profession</th>
                                        <th>Created At</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                              
                          
                            
                                    <tr>
                                    @php
                                        $id=$viewprofile['id'];
                                    @endphp
                                    <td>
                                            <div class="d-flex">
                                                <ul class="list-group list-inline ml-1">
                                                    <li class="list-group-item border1">
                                                  
                                                    <a href="{{ url('editprofile/'.$id.'/edit') }}" class=" d-inline font1 " id="alert1" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-edit"></i></a>
                           
                                                </li>
                                                                                     
              
                                              
                                                </ul>


                                            </div>
                                        </td>
                                    <td>
                                            {{ $viewprofile['username'] }}
                                        </td>

                                        <td>
                                            {{ $viewprofile['phone_no'] }}
                                        </td>

                                        <td>
                                            {{ $viewprofile['country'] }}
                                        </td>

                                        <td>
                                            {{ $viewprofile['city'] }}
                                        </td>

                                        <td>
                                            {{ $viewprofile['state'] }}
                                        </td>
                                        <td>
                                            {{ $viewprofile['profession'] }}
                                        </td>
                                        <td>{{ date("Y-m-d H:i:s",$viewprofile['created_at']) }}</td>
                                     
                                    </tr>


                            

                                </tbody>


                            </table>

                        </div>


                    </div>

              


                </div>
                <!-- HTML5 Export Buttons end -->



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