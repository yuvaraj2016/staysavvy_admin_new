<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HighlightController extends Controller
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confEcoArea?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $Highlight = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];
        

          return view('config_highlight_list', compact('Highlight', 'pagination','lastpage'));
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
            'create_highlight', compact(
                'statuses'
            )
            );



        //    return view('create_highlight');
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
            $response = $response->withHeaders(['Accept'=>'application/vnd.api.v1+json'])->post(config('global.url') . '/api/confEcoArea',
            [
            [
                'name' => 'name',
                'contents' => $request->name
            ],
            [
                'name' => 'status_id',
                'contents' => $request->status_id
            ],

       
            ]);


        }

        else{
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/confEcoArea',

        [


            "desc"=>$request->desc,
            "status_id"=>$request->status_id
            // "total_credits"=>$request->total_credits,
           
            // "status_id"=>$request->status_id,
        ]);
        }

        if($response->status()===201){

            return redirect()->route('highlight.create')->with('success','Eco Area Created Successfully!');
        }else{

            $request->flash();

            return redirect()->route('highlight.create')->with('error',$response['errors']);
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/configEcoHighlight/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $highlight = $response['data'];



            return view(
                'view_config_highlight', compact(
                    'highlight'
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
       
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confEcoArea/' . $id);

       
     
        

        if($response->ok()){

            $highlight =   $response->json()['data'];

            // return $status;

            return view('edit_highlight', compact(
               'highlight','statuses'
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
      
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->put(config('global.url').'/api/confEcoArea/'.$id, 
        [
            "_method"=> 'PUT',
            "name"=>$request->name,
            "status_id"=>$request->status_id
          
        ]
        
      );

        // return $response;
        // if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
        //     return redirect()->route('home');
        // }
        if($response->status()===200){
            return redirect()->back()->with('success','Eco Area Updated Successfully!');
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

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/confEcoArea/'.$id);

        if($response->status()==204){

             return redirect()->route('highlight.index')->with('success','Eco Area Deleted Sucessfully !..');
        }
        else{


             return redirect()->route('highlight.index')->with('error',$response->json()['message']);
        }

    }
}
