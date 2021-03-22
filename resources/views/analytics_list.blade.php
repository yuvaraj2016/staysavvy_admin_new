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
</style>
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Analytics List</h4>
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

                        <li class="breadcrumb-item"><a href="{{ route('analytics.index') }}">Analytics List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
    
            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <form action="">
                <div class="card">
                <div class="form-group row">
                         
                                    <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Property</label>
                                                        <select id="prop" class="js-example-basic-single col-sm-12" name="property_id" id="" placeholder="status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($property as $propertys)
                                            <option value="{{ $propertys['id'] }}" {{ (old("property_id") == $propertys['id'] ? "selected":"") }}>{{ $propertys['name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                        <!-- <div class="col-sm-1">
                                                        <button type="submit" id="submit" class="btn btn-primary btn-lg" style="margin-top: 28px;">Submit</button>
                                                        </div>

                                                        <div class="col-sm-3">
                                                        <button type="submit" id="submit" class="btn btn-primary btn-lg" style="margin-top: 28px;">AllPropertys</button>
                                                        </div> -->
                             
                        </div>


                        <div class="form-group row">
                         
                        <div class="col-sm-3 offset-1">
                                <h6 style="margin-top: 11px;">From</h6>
                                <input type="date" id="sdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 148px;">
                            </div>

                            <div class="col-sm-2 " style="margin-left: -111px;">
                                <h6 style="margin-top: 11px;">Until</h6>
                                <input type="date" id="edate" class="form-control" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" style="width: 148px;">

                            </div>

                                             <div class="col-sm-2">
                                             <button type="button" id="performance" class="btn btn-primary btn-lg" style="margin-top: 28px;">Submit</button>
                                             </div>
                  
             </div>
            
                    </div>
                    <div class="card">
                    <div class="card-body">
                    <div class="form-group row">
                         
                    <div class="col-sm-2 offset-1">
                                    <label class="col-form-label text-md-right c">Average Daily Rate</label>

                                    <p id="dr">£140.97</p>


                                </div>


                                <div class="col-sm-2">
                                    <label class="col-form-label text-md-right c">Cancellation Rate</label>

                                    <p id="cr">10%</p>


                                </div>

                                <div class="col-sm-2">
                                    <label class="col-form-label text-md-right c">Revenue</label>

                                    <p id="rev">£10,900</p>


                                </div>


                                <div class="col-sm-2">
                                    <label class="col-form-label text-md-right c">Nights Stayed</label>

                                    <p id="stay">10</p>


                                </div>

                                <div class="col-sm-2">
                                    <label class="col-form-label text-md-right c">Bookings Made</label>

                                    <p id="bm">71</p>


                                </div>
                         
                         
                         </div>
                    </div>

                    </div>




                    <!-- <div class="card">
                    <div class="card-body">
                    <div class="form-group row">
                         
                    <div class="col-sm-3 offset-1">
                          <label class="col-form-label text-md-right c">Search Result Views</label>
                                
                                <p name="name" >49,436</p>
                                <p name="name" >4.92% Converted</p>
                                <p name="name" >7.75% Peer Average</p>


                          </div>


                          <div class="col-sm-3">
                          <label class="col-form-label text-md-right c">Property Page Views</label>
                                
                          <p name="name" >2,430</p>
                                <p name="name" >2.92% Converted</p>
                                <p name="name" >1.23% Peer Average</p>


                          </div>

                          <div class="col-sm-2">
                          <label class="col-form-label text-md-right c">Bookings Made</label>
                                
                                <p name="name" >71</p>


                          </div>


                    
                         
                         
                         </div>
                    </div>

                    </div> -->
                </form>
                </div>
                <!-- HTML5 Export Buttons end -->



            </div>
        </div>



















    </div>
</div>



<script>
    $('#performance').on("click", function() {
        // console.log('Btn Ppppressedssss')
        var sdate = $("#sdate").val();
        // alert(sdate);
        var edate = $("#edate").val();
        // alert(edate);
        var propid = $("#prop").val();
        // alert(propid)

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/vnd.api.v1+json'
            },
            url: "{{ url('anapreformajax')}}"+"/"+propid+"/"+sdate +"/"+edate,
            type: "GET",
            crossDomain: true,
            beforeSend: function() {
                // console.log('Aaaajax sss')
                $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
            },
            success: function(responsedata) {
                console.log(responsedata);
                console.log(responsedata);
                $('#dr').html(responsedata.daily_rate);
                $('#cr').html(responsedata.cancel_rate);
                $('#rev').html(responsedata.revenue);
                $('#ssc').html(responsedata.ss_score);
                $('#bm').html(responsedata.booking_made);
                $('#stay').html(responsedata.nights_stayed);
            }
        })
    });
</script>
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