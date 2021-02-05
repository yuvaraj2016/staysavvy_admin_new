<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
class AdminbookingController extends Controller
{
    
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Http $client)
    {
        
        $this->client = $client;
    }


    public function index(Request $request,$page = 1)
    {
        //

        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/booking?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $booking = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];
        

          return view('admin_booking_list', compact('booking', 'pagination','lastpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $property = $response['data'];
         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confBookingStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $bookingstauts = $response['data'];
         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confTax');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $tax = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPaymentStatus');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $paymentstatus= $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/room');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $rooms = $response['data'];

         return view(
            'create_admin_booking', compact(
                'statuses','property','bookingstauts','tax','paymentstatus','rooms'
            )
            );

        //    return view('create_room');
    }



    public function getprodrooms($prope_id)
    {
    //    return $prope_id;
        $session = session()->get('token');


        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url').'api/property/'.$prope_id.'?include=Rooms');

        

        if($response->ok()){

            $room= $response->json()['data']['Rooms']['data'];

            return $room;
        }

    }

    public function getrooms($room_id)
    {
    //    return $prope_id;
        $session = session()->get('token');


        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url').'api/room/'.$room_id);

        

        if($response->ok()){

            $rooms= $response->json()['data'];

            return $rooms;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = session()->get('token');
      
        // $fileext = '';
        // $filename = '';
      
        // $amenities='';

        $room_id = [];
        foreach($request->room_id as $room)
        {

            $room_id[] = $room;

        }
// return  $room_id;
        $no_of_rooms = [];
        foreach($request->no_of_rooms as $no_room)
        {

            $no_of_rooms[] = $no_room;

        }
// hidden on 04.02.2020
        // $no_of_adults = [];
        // foreach($request->no_of_adults as $no_adult)
        // {

        //     $no_of_adults[] = $no_adult;

        // }
        // $no_of_childs = [];
        // foreach($request->no_of_childs as $no_child)
        // {

        //     $no_of_childs[] = $no_child;

        // }
        // ens hidden on 04.02.2020
        // hidden on 04.02.2020
        // $total_guests = [];
        // foreach($request->total_guests as $total_gust)
        // {

        //     $total_guests[] = $total_gust;
          
        // }
       
        // $amount = [];
      
        // foreach($request->amount as $amnt)
        // {

        //     $amount[] = $amnt;
            
        // }
        // return $amount;
        //end hidden on 04.02.2020
        // foreach($request->amenities as $amenity)
        // {

        //     $amenities .= $amenity.",";
        // }

     

        // $amenities = rtrim($amenities,",");

        // return $amenities;

        $checkin = null;
        $checkin = $request->check_in_date .' ' . $request->check_in_date_time;

        $checkout = null;
        $checkout = $request->check_out_date .' ' . $request->check_out_date_time;

        $booked_on = null;
        $booked_on = $request->booked_on .' ' . $request->booked_on_time;
    
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/booking',

        [

            "property_id"=>$request->property_id,
            "check_in_date"=>$checkin,

            "check_out_date"=>$checkout,
         "booked_on"=>$booked_on,


        //  "booking_status_id"=>$request->booking_status_id,
         "length_of_stay"=>$request->length_of_stay,

        //  "card_type"=>$request->card_type,
        //  "card_no"=>$request->card_no,

         "tax_id"=>$request->tax_id,
         "tax_percentage"=>$request->tax_percentage,
        //  "payment_status_id"=>$request->payment_status_id,
         "room_id" => $room_id,
         "no_of_rooms"=>$no_of_rooms,

         "total_adults"=>$request->total_adults,
         "total_childs"=>$request->total_childs,
         "total_guests"=>$request->total_guests,
         "total_amount"=>$request->total_amount,

        //  "no_of_adults"=>$no_of_adults,
        //  "no_of_childs"=>$no_of_childs,
        //  "total_guests"=>$total_guests,
        //  "amount"=>$amount,
            "status_id"=>$request->status_id,
           
        ]);
//  return $response;
    //    return $request->all();
    //  return $request->check_in_date;
    //  return $request->check_out_date;

    //  return $request->booked_on;

    //  return $request->booking_status_id;
    //  return $request->length_of_stay;
    //  return $request->card_type;
    //  return $request->tax_id;
    //  return $request->room_id;

    //   return $request->amount;


        if($response->status()===201){

            return redirect()->route('adminbookings.create')->with('success','Booking Created Successfully!');
        }else{

            $request->flash();

            return redirect()->route('adminbookings.create')->with('error',$response['errors']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/booking/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $bookingroom = $response['data'];



            return view(
                'view_admin_booking', compact(
                    'bookingroom'
                )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = session()->get('token');

        try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $property = $response['data'];
         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confBookingStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $bookingstauts = $response['data'];
         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confTax');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $tax = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPaymentStatus');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $paymentstatus= $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/room');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $rooms = $response['data'];
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/booking/' . $id);

       
     
        

        if($response->ok()){

            $Booking =   $response->json()['data'];

        //   return $Booking;

            return view('edit_admin_booking', compact(
                'statuses','property','bookingstauts','tax','paymentstatus','rooms','Booking'
            ));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $session = session()->get('token');
      
        // $amenities='';

     

        // foreach($request->amenities as $amenity)
        // {

        //     $amenities .= $amenity.",";
        // }

      
        // $amenities = rtrim($amenities,",");
        //  return  $amenities;

        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'/api/booking/'.$id, 
        [
            "_method"=> 'PUT',
       

            "booking_status_id"=>$request->booking_status_id
           
        ]
        
      );

        // return $request->all();
        if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
            return redirect()->route('home');
        }
        if($response->status()===200){
            return redirect()->back()->with('success','Booking Details Updated Successfully!');
        }else{
            // return $response;
            return redirect()->back()->with('error',$response->json()['message']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = session()->get('token');

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/booking/'.$id);

        if($response->status()==204){
            // roomtype.index
             return redirect()->route('adminbookings.index')->with('success','Booking Deleted Sucessfully !..');
        }
        else{


             return redirect()->route('adminbookings.index')->with('error',$response->json()['message']);
        }

    }
}
