<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnalyticsController extends Controller
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
        $sdate= date("Y-m-d");
        $edate= date("Y-m-d", strtotime("+1 day"));

        $token = session()->get('token');

        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/analytics/performanceOverviewAll/'.$sdate.'/'.$edate);

            $response = json_decode($call->getBody()->getContents(), true);
            //    return $response;
        }catch (\Exception $e){
       


        }
        $performance = $response['performance_overviews'];

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
        

          return view('analytics_list', compact('property', 'pagination','lastpage','performance'));
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];

         return view(
            'create_tax', compact(
                'statuses'
            )
            );



        //    return view('create_tax');
    }




    public function anapreform(Request $request)
    {
        // dd($request);
// return $request->id;
    $id=$request->id;
 
    $sdate=$request->sdate;
 
    $edate=$request->edate;

    $token = session()->get('token');
    try{

        $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/analytics/performanceOverview/'.$id.'/'.$sdate.'/'.$edate);

        $response = json_decode($call->getBody()->getContents(), true);
        // dd($response);
    //    return $response;
    }catch (\Exception $e){
   


    }
    $anapreform = $response['performance_overviews'];


    return $anapreform;
    
      

    
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


        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/confTax',

        [

            "name"=>$request->name,
            "percentage"=>$request->percentage,
            "amount"=>$request->amount,
            "status_id"=>$request->status_id,
        ]);


        if($response->status()===201){

            return redirect()->route('tax.create')->with('success','Tax Created Successfully!');
        }else{

            $request->flash();

            return redirect()->route('tax.create')->with('error',$response['errors']);
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confTax/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $tax = $response['data'];



            return view(
                'view_config_tax', compact(
                    'tax'
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

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confTax/' . $id);

       
     
        

        if($response->ok()){

            $tax =   $response->json()['data'];

            // return $status;

            return view('edit_tax', compact(
               'tax','statuses'
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
      
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->put(config('global.url').'/api/confTax/'.$id, 
        [
            "_method"=> 'PUT',
            "name"=>$request->name,
            "percentage"=>$request->percentage,
            "amount"=>$request->amount,
            "status_id"=>$request->status_id
        ]
        
      );

        
        if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
            return redirect()->route('home');
        }
        if($response->status()===200){
            return redirect()->back()->with('success','Tax Updated Successfully!');
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

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/confTax/'.$id);

        if($response->status()==204){

             return redirect()->route('tax.index')->with('success','Tax Deleted Sucessfully !..');
        }
        else{


             return redirect()->route('tax.index')->with('error',$response->json()['message']);
        }

    }
}
