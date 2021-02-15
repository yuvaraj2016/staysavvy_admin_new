@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Reviews</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <p class="">View Reviews</p>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('overallreview.index') }}">Reviews</a>
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
                  
                  
                            <div class="form-group row ">

                            <div class="col-sm-2 card" style="margin-left: 50px;">
                            @if(isset($overall['OaReview']['data']['oass_rating']))
                            <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_rating'] }}</b>   <i class="fa fa-star"></i></p>
                                     @else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
                                        <p style="text-align: center;">Over All Rating</p>               
                                                        </div>

                                                        <div class="col-sm-2 offset-1 card">
                                                        @if(isset($overall['OaReview']['data']['oass_location']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_location'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
            <p style="text-align: center;">Location</p>               
                            </div>


                            <div class="col-sm-2 offset-1 card">
                            @if(isset($overall['OaReview']['data']['oass_staff']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_staff'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
            <p style="text-align: center;">Staff</p>               
                            </div>

                            <div class="col-sm-2 offset-1 card">
                            @if(isset($overall['OaReview']['data']['oass_facilities']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_facilities'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
            <p style="text-align: center;">Facilities</p>               
                            </div>
                                                       
                                                    </div>




                                                    <div class="form-group row ">

<div class="col-sm-2 card" style="margin-left: 50px;">
@if(isset($overall['OaReview']['data']['oass_food']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_food'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
            <p style="text-align: center;">Food</p>               
                            </div>

                            <div class="col-sm-2 offset-1 card">
                            @if(isset($overall['OaReview']['data']['oass_sustainability']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_sustainability'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
<p style="text-align: center;">Sustainability</p>               
</div>


<div class="col-sm-2 offset-1 card">
@if(isset($overall['OaReview']['data']['oass_value_for_money']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_value_for_money'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
<p style="text-align: center;">Value For Money</p>               
</div>

<div class="col-sm-2 offset-1 card">
@if(isset($overall['OaReview']['data']['oass_comfort']))
<p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> {{ $overall['OaReview']['data']['oass_comfort'] }}</b>   <i class="fa fa-star"></i></p>
@else
                                     <p style="text-align: center;padding: 17px 1px 10px 10px;"> <b> 0</b>   <i class="fa fa-star"></i></p>
@endif
<p style="text-align: center;">Comfort</p>               
</div>
                           
                        </div>

                                                           

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
                            <th>User Name</th>
                            <th>Booking Reference</th>
                            <th>Rating</th>
                            <th>Location</th>
                            <th>Staff</th>
                            <th>Facilities</th>

                            <th>Food</th>

                            <th>Sustainability</th>

                            <th>Value For Money</th>


                            <th>Comfort</th>
                            <th>Review</th>
                            <th>Review Date</th>
                        </tr>
                    </thead>
                    <tbody>

                    
                    @if(isset($overall['Reviews']['data']))
                        @foreach($overall['Reviews']['data'] as $reviews )
                     
                        @php
                        $id=$reviews['id'];
                    

                        @endphp

                        <tr>
                            <td>
                                {{ $reviews['user_email'] }}
                            </td>

                            <td>
                                {{ $reviews['booking_reference'] }}
                            </td>
                            <td>
                                {{ $reviews['rating'] }}
                            </td>
                            <td>
                                {{ $reviews['location'] }}
                            </td>
                            <td>
                                {{ $reviews['staff'] }}
                            </td>

                            <td>
                                {{ $reviews['facilities'] }}
                            </td>
                            <td>
                                {{ $reviews['food'] }}
                            </td>
                            <td>
                                {{ $reviews['sustainability'] }}
                            </td>

                            <td>
                                {{ $reviews['value_for_money'] }}
                            </td>

                            <td>
                                {{ $reviews['comfort'] }}
                            </td>
                            <td>
                                {{ $reviews['review'] }}
                            </td>
                            <td>
                                {{ $reviews['review_date'] }}
                            </td>

                           
                         {{--   <td>
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
                            </td>--}}
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
    </div>
</div>
@endsection



