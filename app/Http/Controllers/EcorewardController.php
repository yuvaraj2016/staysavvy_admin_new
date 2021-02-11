<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EcorewardController extends Controller
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/getPropertyRelations?include=ActiveRewards &&?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
        //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $ecoreward = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];
        

          return view('eco_reward_list', compact('ecoreward', 'pagination','lastpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $token = session()->get('token');
        // try{

        //     $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

        //     $response = json_decode($call->getBody()->getContents(), true);
        //     //  return $response;
        // }catch (\Exception $e){
        //     //buy a beer


        // }
        //  $statuses = $response['data'];

        //  return view(
        //     'create_review', compact(
        //         'statuses'
        //     )
        //     );



           return view('create_reward');
    }



    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confRewardStatus/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $reward = $response['data'];



            return view(
                'view_config_reward', compact(
                    'reward'
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

        // try{

        //     $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

        //     $response = json_decode($call->getBody()->getContents(), true);
        //     //  return $response;
        // }catch (\Exception $e){
        //     //buy a beer


        // }
        //  $statuses = $response['data'];
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/getPropertyRelations/' . $id.'?include=ActiveRewards,UserRewards');

       
     
        

        if($response->ok()){

            $reward =   $response->json()['data'];

            // return $status;

            return view('edit_eco_reward', compact(
               'reward'
            ));
        }
    }

    public function userreward($id)
    {
      
        $session = session()->get('token');

        try{

            $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confRewardStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $user = $response['data'];

             
        $response1 = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/getPropertyRelations/' . $id.'?include=ActiveRewards,UserRewards');
                

        if($response1->ok()){

            $rewards =   $response1->json()['data']['UserRewards']['data'][0];

            //  return $rewards;

            return view('user_reward', compact(
               'rewards','user'
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
    public function newreward(Request $request, $id)
    {
        $session = session()->get('token');

       
      
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->put(config('global.url').'/api/confRewardStatus/'.$id, 
        [
            "_method"=> 'PUT',
            "name"=>$request->name
          
        ]
        
      );

      
        if($response->status()===200){
            return redirect()->route('user_reward')->with('success','Eco Area Updated Successfully!');
        }else{
            return redirect()->route('user_reward')->with('error',$response->json()['message']);
        }

    }




    public function update(Request $request, $id)
    {
        $session = session()->get('token');
      
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'/api/vendorReward', 
        [
            
            "reward_name"=>$request->reward_name,
            "property_id"=>$id
           
          
        ]
        
      );

        
        // if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
        //     return redirect()->route('home');
        // }
        if($response->status()===200 || $response->status()===201 ){
            // return $response;
            return redirect()->back()->with('success','Reward Updated Successfully!');
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

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/confRewardStatus/'.$id);

        if($response->status()==204){

             return redirect()->route('reward.index')->with('success','Reward Deleted Sucessfully !..');
        }
        else{


             return redirect()->route('reward.index')->with('error',$response->json()['message']);
        }

    }
}
