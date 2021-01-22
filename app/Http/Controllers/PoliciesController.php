<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
class PoliciesController extends Controller
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/policy?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $policy= $response['data'];
        
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];
        

          return view('policy_list', compact('policy', 'pagination','lastpage'));
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPolicy');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $confpolicies = $response['data'];
     

   

         return view(
            'create_policies', compact(
                'property','confpolicies'
            )
            );

        //    return view('create_room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // old room store code hidden on 17.01.2021
    // public function store(Request $request)
    // {
    //     $session = session()->get('token');
      
    //     $fileext = '';
    //     $filename = '';
      
    //     $amenities='';

 

    //     foreach($request->amenities as $amenity)
    //     {

    //         $amenities .= $amenity.",";
    //     }

     

    //     $amenities = rtrim($amenities,",");

     

    //     if ($request->file('file') !== null) {

    //         $files =$request->file('file');
    //         $response = Http::withToken($session);
       

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

    //         return redirect()->route('rooms.create')->with('success','Rooms Created Successfully!');
    //     }else{

    //         $request->flash();

    //         return redirect()->route('rooms.create')->with('error',$response['errors']);
    //     }
    // }

// new store code written on 17.01.2021

public function store(Request $request)
{
// return $request->policies;
        $property_id = $request->property_id;

        $data = [];

        foreach($request->policies as $policy)
        {

            $desc = "desc_".$policy;
            // echo $desc;
            if(!empty($request->$desc))
            {
                // echo $request->$desc;
                $data[] = [
                    'property_id' => $property_id,
                    'policy_id' => $policy,
                    'description' => $request->$desc,
                    
                ];

            }
        }




     

        
    


    $session = session()->get('token');

 

    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/policy',

    [
        "policy"=> $data,
        

    ]);

    // return $response;
//  return $request->description;
//  return $request->all();
// return $request->description;
    if($response->status()===201){

        $property_id= $request->property_id;

        try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$property_id);

            $response = json_decode($call->getBody()->getContents(), true);
            //   return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $propdata = $response['data'];

        //  return $propdata['name'];

         $pdata = ["name"=>$propdata['name'],"address"=>$propdata['address'],"location"=>$propdata['location']];

// return $response;
        return redirect()->route('rooms.create')->with('psuccess','Property Policies Are Saved Successfully!')->with('pid',$request->property_id)->with('pdata',$pdata);
    }else{
        //  return $response;

        $request->flash();
        if(isset($response['errors']))
        {
            return redirect()->route('policies.create')->with('error',$response['errors']);
        }
        else if(isset($response['message']))
        {

            return redirect()->route('policies.create')->with('errorm',$response['message']);
        }
        // return redirect()->route('policies.create')->with('perror',$response['errors']);
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/policy/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $policy = $response['data'];



            return view(
                'view_policy', compact(
                    'policy'
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

            $propresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $property = $propresponse['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPolicy');

            $conresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $confpolicy = $conresponse['data'];
   
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/' . $id .'?includes=Rooms');

       
     
        

        if($response->ok()){

            $policy =   $response->json()['data']['Policies']['data'];

            // return $policy;

            return view('edit_policies', compact(
               'property','policy','confpolicy'
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


        $property_id = $request->property_id;

        $data = [];

        foreach($request->policies as $policy)
        {

            $desc = "desc_".$policy;
            // echo $desc;
            if(!empty($request->$desc))
            {
                // echo $request->$desc;
                $data[] = [
                    'property_id' => $property_id,
                    'policy_id' => $policy,
                    'description' => $request->$desc,
                    
                ];

            }
        }


        $session = session()->get('token');
      
      

        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'/api/policy/'.$id, 
        [
            "_method"=> 'put',
            "policy"=> $data,
            // "property_id"=> $data,
            // "description"=> $data
            
        ]
        
      );

          //return $response;
        if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
            return redirect()->route('home');
        }
        if($response->status()===200){
            return redirect()->back()->with('success','Policy Updated Successfully!');
        }else{
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

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/policy/'.$id);

        if($response->status()==204){
            // roomtype.index
             return redirect()->route('policies.index')->with('success','Rooms Deleted Sucessfully !..');
        }
        else{


             return redirect()->route('policies.index')->with('error',$response->json()['message']);
        }

    }
}
