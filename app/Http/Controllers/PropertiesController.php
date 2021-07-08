<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PropertiesController extends Controller
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
        //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $property = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

        
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/PropertyCount');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $prop_count = $response['data'];


        

          return view('properties_list', compact('property', 'pagination','lastpage','prop_count'));
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confTax');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }

        
         $tax = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confAmenity');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $amenity = $response['data'];


         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPropertyMgmtSystem');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $pms = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCentralResSystem');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $crs = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confHostType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $host = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPropertyType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $property_type = $response['data'];

         

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confRoomType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $confRoomType = $response['data'];
         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confAmenity');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $amenity = $response['data'];

         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCoolthing');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $Coolthing = $response['data'];
         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendors_list');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $vendors = $response['data'];

          if (session()->has('success')) {
            session()->forget('success');
         }   
         return view(
            'create_properties', compact(
                'tax','amenity','statuses','host','property_type','pms','crs','confRoomType','amenity','Coolthing','vendors'
            )
    );

        //    return view('create_property');
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
        $fileext = '';
        $filename = '';
        $taxes='';
        $amenities='';
        $coolthings='';

        foreach($request->taxes as $tax)
        {

            $taxes .= $tax.",";
        }

        foreach($request->amenities as $amenity)
        {

            $amenities .= $amenity.",";
        }

        foreach($request->coolthings as $coolthink)
        {

            $coolthings .= $coolthink.",";
        }

        $taxes = rtrim($taxes,",");

        $amenities = rtrim($amenities,",");

        $coolthings = rtrim($coolthings,",");

        // return $amenities;
// return $request->all();
        if ($request->file('file') !== null) {

            $files =$request->file('file');
            $response = Http::withToken($session);
       

            // return $request->amenities;
            foreach($files as $k => $ufile)
            {
                $filename = fopen($ufile, 'r');
                $fileext = $ufile->getClientOriginalName();
                $response = $response->attach('file['.$k.']', $filename,$fileext);
            }
            $response = $response->withHeaders(['Accept'=>'application/vnd.api.v1+json'])->post(config('global.url') . '/api/property',
            [
            [
                'name' => 'name',
                'contents' => $request->name
            ],
            [
                'name' => 'address',
                'contents' => $request->address
            ],
            // [
            //     'name' => 'location',
            //     'contents' => $request->location
            // ],
            [
                'name' => 'host_type_id',
                'contents' => $request->host_type_id
            ],
            [
                'name' => 'property_mgmt_system_id',
                'contents' => $request->property_mgmt_system_id
            ],

            [
                'name' => 'central_res_system_id',
                'contents' => $request->central_res_system_id
            ],

            [
                'name' => 'property_type_id',
                'contents' => $request->property_type_id
            ],

            [
                'name' => 'general_description',
                'contents' => $request->general_description
            ],

            [
                'name' => 'what_we_offer',
                'contents' => $request->what_we_offer
            ],

            [
                'name' => 'room_start_price',
                'contents' => $request->room_start_price
            ],
            [
                'name' => 'status_id',
                'contents' => $request->status_id
            ],
            [
                'name' => 'taxes[]',
                'contents' =>$taxes
            ],
            [
                'name' => 'amenities[]',
                'contents' =>$amenities
            ],
            [
                'name' => 'coolthings[]',
                'contents' =>$coolthings
            ],
            [
                'name' => 'vendor_id',
                'contents' => $request->vendor_id
            ],
            [
                'name' => 'latitude',
                'contents' => $request->latitude
            ],
            [
                'name' => 'longitude',
                'contents' => $request->longitude
            ],
            [
                'name' => 'city',
                'contents' => $request->city
            ],
            [
                'name' => 'postalcode',
                'contents' => $request->postalcode
            ],
            ]);


        }


        else{

            // return $amenities;
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/property',

        [

            "name"=>$request->name,
            "address"=>$request->address,
            // "location"=>$request->location,
            "host_type_id"=>$request->host_type_id,
            "property_mgmt_system_id"=>$request->property_mgmt_system_id,
            "central_res_system_id"=>$request->central_res_system_id,
            "property_type_id"=>$request->property_type_id,
            "general_description"=>$request->general_description,
            "what_we_offer"=>$request->what_we_offer,
            "room_start_price"=>$request->room_start_price,
            "status_id"=>$request->status_id,
            "vendor_id"=>$request->vendor_id,
            "latitude"=>$request->latitude,
            "longitude"=>$request->longitude,
            "city"=>$request->city,
            "postalcode"=>$request->postalcode,
            "taxes[]"=>$taxes,
            "amenities[]"=>$amenities,
            "coolthings[]"=>$coolthings
        ]);

        }

        if($response->status()===201){

            $property_id= $response->json()['id'];

            try{

                $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$property_id);
    
                $response = json_decode($call->getBody()->getContents(), true);
                //  return $response;
            }catch (\Exception $e){
                //buy a beer
    
    
            }
             $propdata = $response['data'];

            //  return $propdata['name'];

             $pdata = ["name"=>$propdata['name'],"address"=>$propdata['address'],"location"=>$propdata['location']];
             


            return redirect()->route('policies.create')->with('success','Property is Created Successfully!')->with('pid',$property_id)->with('pdata',$pdata);
        }
        else if($response->status()===403){
            // return $response['message'];

            $request->flash();

            return redirect()->route('properties.create')->with('pcreateerror',$response['message']);
        }
        else{
            // return $response;

            $request->flash();

            return redirect()->route('properties.create')->with('error',$response['errors']);
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $properties = $response['data'];

// return $properties;

            return view(
                'view_properties_list', compact(
                    'properties'
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

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confTax');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $tax = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confAmenity');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $amenity = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPropertyMgmtSystem');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $pms = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCentralResSystem');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $crs = $response['data'];


         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confHostType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $host = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPropertyType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $property_type = $response['data'];


         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCoolthing');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $Coolthing = $response['data'];
         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendors_list');

            $response = json_decode($call->getBody()->getContents(), true);
           
        }catch (\Exception $e){
            


        }
         $vendors = $response['data'];



        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/' . $id);

       
     
        // return $response;

        if($response->ok()){

            $properties =   $response->json()['data'];
            $str_arr = explode (",", $properties['location']);  
            $str_arr1 = explode (",", $properties['location']);  
            // $latitude= $str_arr[0];
            // $longitud= $str_arr[1];
            $properties['latitude'] = $str_arr1[0];
            $properties['longitude'] = $str_arr[1]; 
            //    return $str_arr1;

            return view('edit_properties', compact(
               'properties', 'tax','amenity','statuses','host','property_type','pms','crs','Coolthing','vendors'
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

        $str_arr = $request->latitude ;
        $str_arr1 = $request->longitude ;

        $taxes='';
        $amenities='';
        $coolthings='';

        foreach($request->taxes as $tax)
        {

            $taxes .= $tax.",";
        }

        foreach($request->amenities as $amenity)
        {

            $amenities .= $amenity.",";
        }

        foreach($request->coolthings as $coolthink)
        {

            $coolthings .= $coolthink.",";
        }

        $taxes = rtrim($taxes,",");
        // return  $taxes;
        $amenities = rtrim($amenities,",");
        //  return  $amenities;
        $coolthings = rtrim($coolthings,",");
      
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'/api/property/'.$id, 
        
        [
            "_method"=> 'PUT',
                    
            "name"=>$request->name,
            "address"=>$request->address,
            "location"=>$request->location,
            "host_type_id"=>$request->host_type_id,
            "property_mgmt_system_id"=>$request->property_mgmt_system_id,
            "central_res_system_id"=>$request->central_res_system_id,
            "property_type_id"=>$request->property_type_id,
            "general_description"=>$request->general_description,
            "what_we_offer"=>$request->what_we_offer,
            "room_start_price"=>$request->room_start_price,
            "status_id"=>$request->status_id,


            "city"=>$request->city,
            "postalcode"=>$request->postalcode,

            "latitude"=>$str_arr,
            "longitude"=>$str_arr1,

            "taxes"=>$taxes,
            "vendor_id"=>$request->vendor_id,
            "amenities"=>$amenities,
            "coolthings"=>$coolthings

        ]
        
      );
    //   return $request->all();
        
        // if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
        //     return redirect()->route('home');
        // }
        if($response->status()===200){
            return redirect()->back()->with('success','Properties Updated Successfully!');
        }
        else if($response->status()===403){
            return redirect()->back()->with('error','You have created property already. You can create only one property through vendor account!');
        }
        else{
            // return $response['errors'];
            return redirect()->back()->with('error',$response->json()['errors']);
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

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/property/'.$id);

        if($response->status()==204){

             return redirect()->route('properties.index')->with('success','Properties Deleted Sucessfully !..');
        }
        else{


             return redirect()->route('properties.index')->with('error',$response->json()['message']);
        }

    }


    // public function createpolicies(Request $request)
    // {

    //     $property_id = $request->property_id;
    //     $session = session()->get('token');

     

    //     $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/confPolicy',

    //     [
    //         "property_id"=> $request->property_id,
    //         "cancellation_policies"=>$request->cancellation_policies,
    //         "child_extrabeds"=>$request->child_extrabeds,
    //         "internet"=>$request->internet,
    //         "parking"=>$request->parking,
    //         "pets"=>$request->pets,
    //         "checkin_time"=>$request->checkin_time,
    //         "checkout_time"=>$request->checkout_time,
    //         "age_limit"=>$request->age_limit,
    //         "curfew"=>$request->curfew,
    
    //     ]);

       
    //     if($response->status()===201){

    //         $property_id= $request->property_id;

    //         try{

    //             $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$property_id);
    
    //             $response = json_decode($call->getBody()->getContents(), true);
    //             //  return $response;
    //         }catch (\Exception $e){
    //             //buy a beer
    
    
    //         }
    //          $propdata = $response['data'];

    //         //  return $propdata['name'];
    
    //          $pdata = ["name"=>$propdata['name'],"address"=>$propdata['address'],"location"=>$propdata['location']];


    //         return redirect()->route('properties.create')->with('psuccess','Property Policies Are Saved Successfully!')->with('pid',$request->property_id)->with('pdata',$pdata);
    //     }else{
    //         //  return $response;

    //         $request->flash();

    //         return redirect()->route('properties.create')->with('perror',$response['errors']);
    //     }

    // }


    // public function createrooms(Request $request)
    // {
    //     $session = session()->get('token');
      
    //     $fileext = '';
    //     $filename = '';
      
    //     $amenities='';

    //     // $roomdata =[];
 

    //     foreach($request->amenities as $amenity)
    //     {

    //         $amenities .= $amenity.",";
    //     }

     

    //     $amenities = rtrim($amenities,",");

    //     // return $amenities;

    //     if ($request->file('file') !== null) {

    //         $files =$request->file('file');
    //         $response = Http::withToken($session);
       

    //         // return $request->amenities;
    //         foreach($files as $k => $ufile)
    //         {
    //             $filename = fopen($ufile, 'r');
    //             $fileext = $ufile->getClientOriginalName();
    //             $response = $response->attach('file['.$k.']', $filename,$fileext);
    //         }
    //         $response = $response->withHeaders(['Accept'=>'application/vnd.api.v1+json'])->post(config('global.url') . '/api/room',
    //         [
    //         [
    //             'name' => 'property_id',
    //             'contents' => $request->property_id
    //         ],
    //         [
    //             'name' => 'room_type_id',
    //             'contents' => $request->room_type_id
    //         ],
    //         [
    //             'name' => 'no_of_rooms',
    //             'contents' => $request->no_of_rooms
    //         ],
    //         [
    //             'name' => 'available_rooms',
    //             'contents' => $request->available_rooms
    //         ],
    //         [
    //             'name' => 'max_adults',
    //             'contents' => $request->max_adults
    //         ],

    //         [
    //             'name' => 'max_children',
    //             'contents' => $request->max_children
    //         ],
    //         [
    //             'name' => 'max_occupancy',
    //             'contents' => $request->max_occupancy
    //         ],
    //         [
    //             'name' => 'room_location',
    //             'contents' => $request->room_location
    //         ],
    //         [
    //             'name' => 'amount',
    //             'contents' => $request->amount
    //         ],
    //         [
    //             'name' => 'status_id',
    //             'contents' => $request->status_id
    //         ],
    //         [
    //             'name' => 'amenities[]',
    //             'contents' =>$amenities
    //         ],
      

    //         ]);


    //     }
    //     else{
    //     $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/room',

    //     [

    //         "property_id"=>$request->property_id,
    //         "room_type_id"=>$request->room_type_id,

    //         "no_of_rooms"=>$request->no_of_rooms,
    //      "available_rooms"=>$request->available_rooms,

    //      "max_adults"=>$request->max_adults,
    //      "max_children"=>$request->max_children,

    //      "max_occupancy"=>$request->max_occupancy,
    //      "room_location"=>$request->room_location,

    //      "amount"=>$request->amount,
    //      "amenities[]"=>$amenities,

    //         "status_id"=>$request->status_id,
           
    //     ]);

    //     }
    //     if($response->status()===201){
    //         $property_id= $request->property_id;

    //         try{

    //             $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$property_id);
    
    //             $response = json_decode($call->getBody()->getContents(), true);
    //             // return $response;
    //         }catch (\Exception $e){
    //             //buy a beer
    
    
    //         }
    //          $propdata = $response['data'];
    
    //         //  return $request->property_id;
    
    //          $pdata = ["name"=>$propdata['name'],"address"=>$propdata['address'],"location"=>$propdata['location']];

    //          try{

    //             $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$property_id.'?include=Rooms');
    
    //             $response = json_decode($call->getBody()->getContents(), true);
    //             //  return $response;
    //         }catch (\Exception $e){
    //             //buy a beer
    
    
    //         }
    //          $roomdata = $response['data']['Rooms']['data'];

    //         //  return $roomdata;
    
 

    //         return redirect()->route('properties.create')->with('rsuccess','Rooms Created Successfully!')->with('pid',$request->property_id)->with('pdata',$pdata)->with('roomdata',compact('roomdata'));

    //     }else{

    //         // return $response['errors'];

    //         $request->flash();

    //         return redirect()->route('properties.create')->with('rerror',$response['errors']);
    //     }
    // }


}
