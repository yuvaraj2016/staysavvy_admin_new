<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InvoiceController extends Controller
{
    
    public function __construct(Http $client)
    {
        
        $this->client = $client;
    }

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function getAdminInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        $properties = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

           

        return view('admin_invoice_list', compact('properties', 'pagination','lastpage'));


    }

    public function getAdminMonthlyInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');

        $property_id = $request->property_id;
        
        $year = $request->year;

        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendorInvoice?page='.$page.'&property_id='.$property_id.'&year='.$year);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        $veninvoices = $response['data'];

        // return $veninvoices;
        
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

           

        return view('admin_monthly_invoice_list', compact('veninvoices', 'pagination','lastpage'));


    }


    public function createAdminMonthlyInvoice(Request $request)
    {
       
        $token = session()->get('token');

        $range = explode("-",$request->invmonth);

        $property_id = $request->property_id;

        $month =  ltrim($range[1], '0');

        
        
        $year = $range[0];

       

        $response = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/vendorInvoice',

        [
            "property_id"=>$property_id,
            "month"=>$month,
            "year"=>$year,
                

        ]);
        
       
    if($response->status()===201 || $response->status()===200 ){
   
        return redirect('admin_monthly_invoice_list/1/'.$property_id."/".$year)->with('success', 'Monthly Vendor Invoice Is Created Successfully');

    }

    else
    {

        if(isset($response['errors']))
        {
            return redirect()->back()->with('error',$response['errors']);
        }
        else if(isset($response['error']))
        {
            return redirect()->back()->with('error',$response['error']);
        }
        else if(isset($response['message']))
        {
            return redirect()->back()->with('error',$response['message']);
        }
    }
   
        

       


    }




    public function getCharityInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
        //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $properties = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

        
           

          return view('charity_invoice_list', compact('properties', 'pagination','lastpage'));
    }



    public function getVendorInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
        //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $properties = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

        
           

          return view('vendor_invoice_list', compact('properties', 'pagination','lastpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
