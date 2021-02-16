@extends('layouts.app')
@section('content')




<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }

    #basic-btn td{

        word-wrap: break-word;


    }

    .longtext
    {
        word-wrap: break-word;
        white-space: normal !important;
        width:300px!important;

    }

    .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }

/* ----- v CAN BE DELETED v ----- */


.demo {
    /* padding-top: 60px;
    padding-bottom: 60px; */
}
</style>
<div class="page-wrapper">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-12 offset-5">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4 class="">Help Center</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
     
        </div>
    </div>
    <div class="page-body">
        <div class="row">
     
            <div class="col-sm-11 " style="margin-left: 56px;">
                <!-- HTML5 Export Buttons table start -->
                <div class="card" style="padding: 12px 12px 0px 23px;">
<h5 class=""><b>Welcome to the Help Center</b></h5><hr>

<p style="font-weight: 400;">We're available 24 hours a day.</p>

               
                </div>
                <!-- HTML5 Export Buttons end -->



            </div>
        </div>


        <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
  



     </div>
 </div>


 <div class="form-group row col-md-11 " style="margin-left: 56px;background:white;padding: 12px 12px 12px 12px;">

<div class="col-sm-4 offset-3">
                            <label class="col-form-label text-md-right ">Customer care Number</label><br>
                            <span> <i class="fa fa-phone-square" aria-hidden="true"></i> 8765678767</span>
                            </div>
                            <!-- <div class="col-sm-4 ">
                            <i class="fa fa-headphones" aria-hidden="true"></i>

                            </div> -->

                            <div class="col-sm-4 ">
                            <label class="col-form-label text-md-right ">Customer E-Mail Address</label><br>
                            <span> <i class="fa fa-envelope" aria-hidden="true"></i> Customercare@getstasysavvy.com</span>
                          
                            </div>

             
                        </div>
                        


        <div class="container demo">

    
<div class="panel-group col-md-12" id="accordion" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="more-less fa fa-plus" ></i>
                   Cancellation
                  </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body" style="padding: 12px 10px 10px 10px;">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="more-less fa fa-plus"></i>
                   Payment
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body" style="padding: 12px 10px 10px 10px;">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="more-less fa fa-plus"></i>
                 Booking Details
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body" style="padding: 12px 10px 10px 10px;">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

</div><!-- panel-group -->


</div><!-- container -->












    </div>

    </div>




<script>
  function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
</section>
@endsection