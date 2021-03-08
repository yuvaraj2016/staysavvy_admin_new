@extends('layouts.app')
@section('content')




<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }
</style>
<div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Dashboard</h4>
                                                    <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <!-- <li class="breadcrumb-item"><a href="#!">Charts</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#">Echart</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                            <div class="card" >
                                            <form action="" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                                            <div class="form-group row ">
                          

                             
                          <div class="col-sm-3">
                                                    <div class="card-header">
                                                        <h5 style="font-size: 12px;"> <i class="fa fa-newspaper-o"></i>  Booking Overview</h5>
                                                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                                    </div>
                          </div>

                        

                          <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">From</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                            </div>

                                                            <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">To</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                               
                                                            </div>

                                                            <div class="form-group  ">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-2 col-md-7 ">
                                    <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 11px;">Submit</button>
                                </div>
                            </div>

                                                </div>
                                                </form>
                                            </div>
                                                <div class="card" style="margin-top: -16px;">
                                                    <!-- <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                                    <div class="card-block">
                                                        <div id="main" style="height:300px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                   

                                            <div class="col-xl-6">
                                            <div class="card" >
                                            <form action="" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                                            <div class="form-group row ">
                          

                             
                          <div class="col-sm-3">
                                                    <div class="card-header">
                                                        <h5> <i class="fa fa-line-chart"></i>  Performance</h5>
                                                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                                    </div>
                          </div>

                        

                          <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">From</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                            </div>

                                                            <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">To</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                               
                                                            </div>

                                                            <div class="form-group  ">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-2 col-md-7 ">
                                    <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 11px;">Submit</button>
                                </div>
                            </div>

                                                </div>
                                                </form>
                                                </div>
                                                <div class="card" style="margin-top: -16px;">
                                                    <!-- <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                                    <div class="card-block">
                                                        <div id="main" style="height:296px">
                                                        
                                                        
                                                        <div class="form-group row ">                                                      
                          <div class="col-sm-4 ">
                          <label class="col-form-label text-md-right c">Average Daily Rate</label>
                                
                                <p name="name" >£140.97</p>


                          </div>
                          
                          <div class="col-sm-4 ">
                          <label class="col-form-label text-md-right c">Cancellation Rate</label>
                                
                                <p name="name" >10%</p>


                          </div>


                          <div class="col-sm-2 ">
                          <label class="col-form-label text-md-right c">Revenue</label>
                                
                                <p name="name" >£10,900</p>


                          </div>
                          <div class="col-sm-2 ">
                          <label class="col-form-label text-md-right c">Stayed</label>
                                
                                <p name="name" >10</p>


                          </div>
                          
                          </div>
                                                        
                                                        
                          <!-- <div id="chart" style="height: 300px;"></div>             -->
                                                        
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-xl-6">
                                        <div class="card" >
                                            <form action="" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                                            <div class="form-group row ">
                          

                             
                          <div class="col-sm-3">
                                                    <div class="card-header">
                                                        <h5> <i class="fa fa-heart text-green"></i>  Eco Summary</h5>
                                                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                                    </div>
                          </div>

                        

                          <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">From</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                            </div>

                                                            <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">To</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                               
                                                            </div>

                                                            <div class="form-group  ">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-2 col-md-7 ">
                                    <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 11px;">Submit</button>
                                </div>
                            </div>

                                                </div>
                                                </form>
                                                </div>

                                                <div class="card" style="margin-top: -16px;">
                                                    <!-- <div class="card-header">
                                                        <h5>Pie chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                                    <div class="card-block">
                                                        <div id="pie-chart" style="height:300px"></div>
                                                    </div>
                                                </div>
                                            </div>

















                                            <div class="col-xl-6">
                                        <div class="card" >
                                            <form action="" class="swa-confirm"  method="post" id="addstatus"
                            enctype="multipart/form-data">
                                            <div class="form-group row ">
                          

                             
                          <div class="col-sm-3">
                                                    <div class="card-header">
                                                        <h5> <i class="fa fa-pencil-square"></i>  Eco Review</h5>
                                                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->

                                                    </div>
                          </div>

                        

                          <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">From</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                            </div>

                                                            <div class="col-sm-3 ">
                                                                <h6 style="margin-top: 11px;">To</h6>
                                                                <input type="date" name="" class="form-control" value="" style="width: 148px;">
                                                               
                                                            </div>

                                                            <div class="form-group  ">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-2 col-md-7 ">
                                    <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 11px;">Submit</button>
                                </div>
                            </div>

                                                </div>
                                                </form>
                                                </div>

                                                <div class="card" style="margin-top: -16px;">
                                                    <!-- <div class="card-header">
                                                        <h5>Pie chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                    </div> -->
                                                    <div class="card-block">
                                                        <div id="pie-chart" style="height:300px">
                                                        
                             <div class="form-group row ">
                                                       
                             <div class="col-sm-4 ">
                                                                <h6 style="margin-top: 11px;">Dave Thomas</h6>
                                                               
                                                            </div>
                                                            <div class="col-sm-4 ">
                                                                <h6 style="margin-top: 11px;">A beautiful hotel - staff were fantastic. I
would definitely stay again and recommend
to friends...</h6>
                                                               
                                                            </div>
                                                            <div class="col-sm-4 ">
                                                                <h6 style="margin-top: 11px;"><i class="fa fa-star"></i></h6>
                                                               
                                                            </div>

                                                        </div>
                                                        


                                                        <div class="form-group row ">
                                                       
                                                       <div class="col-sm-4 ">
                                                                                          <h6 style="margin-top: 11px;">Linda Davies</h6>
                                                                                         
                                                                                      </div>
                                                                                      <div class="col-sm-4 ">
                                                                                          <h6 style="margin-top: 11px;">Came for a wedding and WOW - love this
place. The location and the staff are all great
- we will be back</h6>
                                                                                         
                                                                                      </div>
                                                                                      <div class="col-sm-4 ">
                                                                                          <h6 style="margin-top: 11px;"><i class="fa fa-star"></i></h6>
                                                                                         
                                                                                      </div>
                          
                                                                                  </div>
                                                        
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector">

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