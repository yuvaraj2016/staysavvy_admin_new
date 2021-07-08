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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/getPropertyRelations?page='.$page);

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
     
         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCharity');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $confCharity = $response['data'];
   

         return view(
            'create_eco_area', compact(
                'property','confecoarea','confCharity'
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
    //   dd($request);

    $session = session()->get('token');

    $ecoareas=[];
    $newCharities=[];
  

    foreach($request->ecoareas as $ecoarea)
    {

        $ecoareas[] = $ecoarea;
    }
    foreach($request->charities as $charitie)
    {
        if($charitie !== null)
        array_push($newCharities, $charitie);
    }

    // dd($newCharities);
    // $ecoareas = rtrim($ecoareas,",");
    // return $ecoareas;

    // $data =[
    //     "property_id"=>$request->property_id,
    //     "ecoareas"=>$ecoareas,
    //     "charities"=>$charities,
    //     "description"=>$request->description
    // ];
    // dd($data);
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/saveSummaryWithSync',

    [
        "property_id"=>$request->property_id,
        "ecoareas"=>$ecoareas,
        "charities"=>$newCharities,
        "description"=>$request->description
        

    ]);
//  return $response;
    //  return $request->all();

    if($response->status()===201 || $response->status()===200 ){
    //   dd($response);

// return $response;
        return redirect()->route('ecoarea.create')->with('success','Property To Ecoareas Successfully Created!');
    }else{
        //  return $response;

        // dd($response);
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







public function neweco(Request $request)
{
    //   dd($request);

    $session = session()->get('token');

    $ecoareas=[];
    $charities=[];
  

    foreach($request->ecoareas as $ecoarea)
    {

        $ecoareas[] = $ecoarea;
    }
    foreach($request->charities as $charitie)
    {

        $charities[] = $charitie;
    }
    // $ecoareas = rtrim($ecoareas,",");
    // return $ecoareas;

    // $data =[
    //     "property_id"=>$request->property_id,
    //     "ecoareas"=>$ecoareas,
    //     "charities"=>$charities,
    //     "description"=>$request->description
    // ];
    // dd($data);
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/saveSummaryWithSync',

    [
        "property_id"=>$request->property_id,
        "ecoareas"=>$ecoareas,
        "charities"=>$charities,
        "description"=>$request->description
        

    ]);
//  return $response;
    //  return $request->all();

    if($response->status()===201 || $response->status()===200 ){
    //   dd($response);

// return $response;
        return redirect()->back()->with('success',' Ecoareas updated Successfully Created!');
    }else{
        //  return $response;

        // dd($response);
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/getPropertyRelations/'.$id.'?include=ProEcoareas,EcoSummary,Impacts');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $ecoarea = $response['data'];



            return view(
                'view_eco_area', compact(
                    'ecoarea'
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

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confEcoArea');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $confecoarea = $response['data'];

         try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCharity');

            $conresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $charity = $conresponse['data'];
   
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/getPropertyRelations/'.$id.'?include=ProEcoareas,EcoSummary,Impacts');
        // $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property/' . $id .'?includes=Rooms');

       
     
        

        if($response->ok()){

            $property =   $response->json()['data'];

            //  return $property;

            return view('edit_ecoarea', compact(
               'property','confecoarea','charity'
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
    public function update(Request $request,$id)
    {

        $session = session()->get('token');
      
    $ecoareas=[];
    $charities=[];

    foreach($request->ecoareas as $ecoarea)
    {

        $ecoareas[] = $ecoarea;
    }
    foreach($request->charities as $charitie)
    {

        $charities[] = $charitie;
    }
    // $ecoareas = rtrim($ecoareas,",");
    // return $ecoareas;
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/saveSummaryWithSync',

    [
        "property_id"=>$request->property_id,
        "description"=>$request->description,
        "ecoareas"=>$ecoareas,
        "charities"=>$charities
        

    ]);
      



          //return $response;
        // if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
        //     return redirect()->route('home');
        // }
        if($response->status()===201){
            return redirect()->back()->with('success','Eco Area Saved Updated Successfully!');
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
