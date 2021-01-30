<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
class EcoareaController extends Controller
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
        $ecoarea= $response['data'];
        
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];
        

          return view('echo_area_list', compact('ecoarea', 'pagination','lastpage'));
    }

    // public function propertyList(Request $request,$page = 1)
    // {
    //     $token = session()->get('token');
    //     try{

    //         $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

    //         $response = json_decode($call->getBody()->getContents(), true);
    //         //  return $response;
    //     }catch (\Exception $e){
    //         //buy a beer


    //     }
    //     $properties= $response['data'];
        
    //     $pagination = $response['meta']['pagination'];

    //     $lastpage = $pagination['total_pages'];
        

    //       return view('property_policy_list', compact('properties', 'pagination','lastpage'));

    // }


    // public function policyList(Request $request,$id)
    // {
    //     // return $id;
    //     $token = session()->get('token');

    //     try{

    //         $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPolicy');

    //         $response = json_decode($call->getBody()->getContents(), true);
    //         //  return $response;
    //     }catch (\Exception $e){
    //         //buy a beer


    //     }
    //      $confpolicies = $response['data'];

    //     try{

    //         $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$id);

    //         $response = json_decode($call->getBody()->getContents(), true);
    //         //  return $response;
    //     }catch (\Exception $e){
    //         //buy a beer


    //     }
    //     $policies= $response['data']['Policies']['data'];
        
    //     // $pagination = $response['meta']['pagination'];

    //     // $lastpage = $pagination['total_pages'];
        

    //       return view('policy_list', compact('policies','confpolicies'));

    // }


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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confEcoArea');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $confecoarea = $response['data'];
     

   

         return view(
            'create_eco_area', compact(
                'property','confecoarea'
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
 

public function store(Request $request)
{
      

    $session = session()->get('token');

    $ecoareas=[];
  

    foreach($request->ecoareas as $ecoarea)
    {

        $ecoareas[] = $ecoarea;
    }
    // $ecoareas = rtrim($ecoareas,",");
    // return $ecoareas;
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/addPropertytoEcoareas',

    [
        "property_id"=>$request->property_id,
        "ecoareas"=>$ecoareas
        

    ]);
//  return $response;
    //  return $request->all();

    if($response->status()===201 || $response->status()===200 ){
      

// return $response;
        return redirect()->route('ecoarea.create')->with('success','Property To Ecoareas Successfully Created!');
    }else{
        //  return $response;

        $request->flash();
        if(isset($response['errors']))
        {
            return redirect()->route('ecoarea.create')->with('error',$response['errors']);
        }
        else if(isset($response['message']))
        {

            return redirect()->route('ecoarea.create')->with('errorm',$response['message']);
        }
        // return redirect()->route('policies.create')->with('perror',$response['errors']);
    }

}



public function policystore(Request $request)
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

        // $property_id= $request->property_id;

        // try{

        //     $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/'.$property_id);

        //     $response = json_decode($call->getBody()->getContents(), true);
        //     //   return $response;
        // }catch (\Exception $e){
        //     //buy a beer


        // }
        //  $propdata = $response['data'];

        // //  return $propdata['name'];

        //  $pdata = ["name"=>$propdata['name'],"address"=>$propdata['address'],"location"=>$propdata['location']];

// return $response;
        return redirect()->route('store_policies')->with('psuccess','Property Policies Created Successfully!');
        // ->with('pid',$request->property_id)->with('pdata',$pdata);
    }else{
        //  return $response;

        $request->flash();
        if(isset($response['errors']))
        {
            return redirect()->route('store_policies')->with('error',$response['errors']);
        }
        else if(isset($response['message']))
        {

            return redirect()->route('store_policies')->with('errorm',$response['message']);
        }
        // return redirect()->route('policies.create')->with('perror',$response['errors']);
    }

}



public function newpolicies(Request $request)
{
    // return 1;
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

        
        // return $data;
    $session = session()->get('token');

 

    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->put(config('global.url').'api/policy/1',

    [
        "policy"=> $data,
        "_method"=> "PUT",

    ]);


     if($response->status()===201 || $response->status()===200){

        return redirect()->route('policy_list', [$property_id])->with('success',' Policies Are Saved Successfully!');
        
        }
    else{
        //   return $response;

        $request->flash();
        if(isset($response['errors']))
        {
            return redirect()->back()->with('error',$response['errors']);
        }
        else if(isset($response['message']))
        {

            return redirect()->back()->with('errorm',$response['message']);
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
   
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/policy');
        // $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/' . $id .'?includes=Rooms');

       
     
        

        if($response->ok()){

            $policy =   $response->json()['data'];

            //  return $policy;

            return view('edit_policy', compact(
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
